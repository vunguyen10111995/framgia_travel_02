<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fork;
use App\Models\Category;
use App\Models\Service;
use App\Models\Province;
use App\Models\Plan;
use App\Models\User;
use App\Models\ForkSchedule;
use Auth;

class ForkController extends Controller
{
    public function showFork(Request $request)
    {
        $plan = Plan::with('planProvinces')->find($request->id);
        $choices = $plan->planProvinces;
        $types = Category::all();
        $services = Service::all();
        $provinces = Province::all();

        return view('sites._component.fork', compact(
            'plan',
            'choices',
            'schedules',
            'types',
            'services',
            'provinces'
        ));
    }

    public function postFork(Request $request, $id)
    {
        $fork = new Fork();
        $fork->user_id = Auth::user()->id;
        $fork->plan_id = $id;
        $fork->price = 1000;
        $fork->status = config('setting.status.inprogress');
        $fork->save();

        $num = $request->number_services;
        for ($i = 0; $i < $num; $i++) {
            $fork_schedule = new ForkSchedule();
            $fork_schedule->fork_id = $fork['id'];
            $fork_schedule->date = $request->date[$i];
            $fork_schedule->service_id = $request->service[$i];
            $fork_schedule->start_at = $request->sta[$i];
            $fork_schedule->end_at = $request->end[$i];
            $fork_schedule->title = $request->title_schedule[$i];
            $fork_schedule->price = $request->price[$i];
            $fork_schedule->description = $request->des[$i];
            $fork_schedule->save();
        }

        return redirect('/');
    }

    public function showForkPlan($id)
    {
        $user = User::find($id);
        $number_forks = Fork::where('user_id', '=' , $user->id )->get();
        $html = view('sites._component.fork_list', compact('number_forks'))->render();
        
        return response($html);
    }

    public function showForkSchedule(Request $request, $id)
    {
        $fork = Fork::with(['plan.planProvinces', 'forkSchedules', 'forkSchedules.service.province'])->find($id);
        $choices = $fork->plan->planProvinces;
        $services = Service::all();
        $provinces = Province::all();
        
        return view('sites._component.view_fork_schedule', compact(['fork', 'choices', 'services', 'provinces']));
    }
}
