<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Province;
use App\Models\PlanProvince;
use Auth;
use App\Models\User;

class PlanController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $provinces = Province::all();
        $plans = Plan::with('user')->orderBy('rate_average', 'desc')->paginate(10);
        if($request->ajax()) {
            return view('admin._component.plan.paginate_plan', compact('plans', 'provinces'))->render();
        }

        return view('admin._component.plan.manage_plan', compact('plans', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'rate_average' => 0,
            'rate_count' => 0,
            'price' => 500,
            'status' => 0,
        ];
        
        $plan = Plan::create($data);
        
        $provinces = is_array($request->province) ? $request->province : [];

        foreach ($provinces as $province) {
                $plan_province = new PlanProvince();
                $plan_province->province_id = $province;
                $plan_province->plan_id = $plan['id'];
                $plan_province->save();
            }

        return response()->json($plan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $plan = Plan::with(['schedules', 'user', 'schedules.service'])->findOrFail($id);

        return view('admin._component.schedule.manage_schedule', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        
        return view('admin._component.schedule.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $plan = Plan::find($request->id)->update($request->all());

        return response()->json($plan);
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

    public function filter(Request $request)
    {
        $status = $request->key;
        $plans = Plan::where('status', '=', $status)->get();
        $view = view('admin._component.plan.search', compact('plans'))->render();

        return response($view);
    }

    public function search(Request $request)
    {

        $key = $request->key;

        $plans = Plan::search($key)->get();
        
        $result = view('admin._component.plan.search', compact('plans'));

        return response($result);
    }

    public function profile($id)
    {
        $admin = User::with('plans')->findOrFail($id);

        return view('admin._component.user.profile', compact('admin'));
    }
}
