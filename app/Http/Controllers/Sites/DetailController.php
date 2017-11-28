<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Schedule;
use App\Models\PlanProvince;
use App\Models\Province;
use App\Models\Comment;

class DetailController extends Controller
{
    public function showDetail($id)
    {
        $plan = Plan::find($id);
        $planProvinces = PlanProvince::whereProvince($id)->keyBy('province_id');
        $provinceFirst = PlanProvince::whereProvince($id)->first();
        $schedules = Schedule::whereSchedule($id);
        $getUser = Plan::getUser($id);
        $comments = Comment::getComment($id);

        return view('sites._component.plan_detail', compact(
            'plan',
            'planProvinces',
            'provinceFirst',
            'schedules',
            'getUser',
            'comments'
        ));
    }
}
