<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;
use App\Models\Province;
use App\Models\Follow;
use App\Models\Category;
use App\Models\Service;
use App\Models\Plan;
use App\Models\RequestService;
use App\Models\PlanProvince;
use App\Models\Schedule;
use App\Models\User;

class DashboardController extends Controller
{
    public function show($id)
    {
        try {
            $userFollowings = User::whereFollowing($id)->followingUsers;
            $userFollowers = User::whereFollower($id)->followerUsers;
            $following = count($userFollowers);
            $follower = count($userFollowings);
            $user = User::find($id);
            $numberPlans = Plan::whereUser($user->id)->get();
            $plans = Plan::whereUser($user->id)->paginate(4);
            $numberPlan = count($numberPlans);

            return view('sites._component.dashboard', compact(
                'plans',
                'numberPlans',
                'numberPlan',
                'following',
                'follower',
                'user',
                'userFollowings',
                'userFollowers'
            ));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
    public function getRequest()
    {
        $provinces = Province::all();
        $categories = Category::all();

        return view('sites._component.request_services', compact('provinces', 'categories'));
    }

    public function postRequest(ServicesRequest $request)
    {
        try {
            $request_service = new RequestService();
            if ($request->hasFile('image')) {
                $file_name = helper::importFile($request->file('image'), config('setting.requestPath'));
                $request_service->image = $file_name;
            }
            $request_service->fill($request->all());
            $request_service->user_id = Auth::user()->id;
            $request_service->status = config('setting.status.inprogress');
            $request_service->save();

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function getPlan()
    {
        $provinces = Province::all();

        return view('sites._component.request_plan', compact('provinces'));
    }

    public function postPlan(PlansRequest $request)
    {
        try {
            $choices = $request->proChoice;
            $plan = new Plan();
            $plan->fill($request->all());
            $plan->user_id = Auth::user()->id;
            $plan->status = config('setting.status.inprogress');
            $plan->save();
            foreach ($choices as $choice) {
                $planProvince = new PlanProvince();
                $planProvince->province_id = $choice;
                $planProvince->plan_id = $plan->id;
                $planProvince->save();
            }

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function getSchedule(Request $request)
    {
        $plan = Plan::with('planProvinces')->find($request->id);
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

    public function postSchedule(Request $request, $id)
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
