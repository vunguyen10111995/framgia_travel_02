<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\sites\PlansRequest;
use App\Http\Requests\sites\ServicesRequest;
use App\Helpers\helper;
use App\Models\Province;
use App\Models\Follow;
use App\Models\Category;
use App\Models\Service;
use App\Models\Plan;
use App\Models\RequestService;
use App\Models\PlanProvince;
use App\Models\User;

class DashboardController extends Controller
{
    public function showDashboard($id)
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
                'numberPlan',
                'following',
                'follower',
                'user',
                'userFollowings',
                'userFollowers'
            ));
        } catch (Exception $e) {
            echo $e->get_message();
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
            $rq = new RequestService();
            if ($request->hasFile('image')) {
                $file_name = helper::importFile($request->file('image'), config('setting.requestPath'));
                $rq->image = $file_name;
            }
            $rq->fill($request->all());
            $rq->user_id = Auth::user()->id;
            $rq->status = config('setting.status.inprogress');
            $rq->save();

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            echo $e->get_message();
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
                $pl = new PlanProvince();
                $pl->province_id = $choice;
                $pl->plan_id = $plan->id;
                $pl->save();
            }

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            echo $e->get_message();
        }
    }
}
