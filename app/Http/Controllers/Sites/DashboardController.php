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
use App\Models\Gallery;

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

    public function getGallery()
    {
        $galleries = Gallery::all();
        $plans = Plan::whereUser(Auth::user()->id)->get();
        
        return response(view('sites._component.gallery.show_gallery', compact('plans', 'galleries'))->render());
    }

    public function getDetail($id)
    {
        $plan = Plan::find($id);
        $gallery = Gallery::find($id);

        return response(view('sites._component.gallery.gallery_detail', compact('gallery', 'plan'))->render());
    }

    public function postGallery(Request $request, $id)
    {
        try {
            $gallery = new Gallery();
            $gallery->plan_id = $id;
            $gallery->image_name = $request->image_name;
            $filename = helper::upload($request->file('image'), config('setting.defaultPath'));
            $gallery->image = $filename;
            $gallery->save();

            return back();
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
