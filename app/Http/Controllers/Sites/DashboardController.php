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
}
