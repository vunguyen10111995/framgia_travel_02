<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\sites\PlansRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;
use App\Models\Plan;
use App\Models\Province;
use App\Models\PlanProvince;
use App\Models\Schedule;
use App\Models\Comment;

class RequestPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();

        return view('sites._component.request_plan', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlansRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
