<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Rate;

class RateController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $rate = new Rate();
            $rate->plan_id = $id;
            $rate->user_id = Auth::user()->id;
            $rate->rate_point = $request->rate_point;
            $rate->save();
            $rates = Rate::whereRate($id);
            $rates->average =$rates->avg('rate_point');
            $rateAvg = number_format($rates->average, 1, ',', ' ');
            $rateCount = count($rates);

            return response(view('sites._component.rate_result', compact('rateAvg', 'rateCount'))->render());
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
