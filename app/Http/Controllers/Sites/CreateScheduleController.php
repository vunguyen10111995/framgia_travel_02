<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Category;
use App\Models\Service;
use App\Models\Province;
use App\Models\PlanProvince;
use App\Models\Schedule;

class CreateScheduleController extends Controller
{
    public function show($id)
    {
        $plan = Plan::with('planProvinces')->find($id);
        $choices = $plan->planProvinces;
        $types = Category::all();
        $services = Service::all();
        $provinces = Province::all();

        return view('sites._component.create_schedule', compact(
            'plan',
            'choices',
            'schedules',
            'types',
            'services',
            'provinces'
        ));
    }

    public function store(Request $request, $id)
    {
        try {
            $plan = Plan::find($id);
            $plan->title = $request->title;
            $plan->start_at = $request->start_at;
            $plan->end_at = $request->end_at;
            $plan->description = $request->description;
            $plan->save();
            $choices = is_array($request->proChoice) ? $request->proChoice : [];
            
            foreach ($choices as $choice) {
                $planProvince = new PlanProvince();
                $planProvince->province_id = $choice;
                $planProvince->plan_id = $request->id;
                $planProvince->save();
            }

            $num = $request->number_services;
            for ($i = 0; $i < $num; $i++) {
                $schedule = new Schedule();
                $schedule->plan_id = $id;
                $schedule->date = $request->date[$i];
                $schedule->service_id = $request->service[$i];
                $schedule->start_at = $request->sta[$i];
                $schedule->end_at = $request->end[$i];
                $schedule->title = $request->title_schedule[$i];
                $schedule->price = $request->price[$i];
                $schedule->description = $request->des[$i];
                $schedule->save();
            }

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
