<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Province;

class HomeController extends Controller
{
    public function index()
    {
        $plans = Plan::OrderBy('created_at', 'asc')->paginate(3);
        $provinces = Province::all('name');

        return view('index', compact('plans', 'provinces'));
    }

    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $provinces = Province::Where('name', 'like', '%' . $keyword . '%')->get();
            $plans = Plan::Where('title', 'like', '%' . $keyword . '%')->get();
            $html = view('sites._component.search_result', compact('provinces', 'plans'))->render();

            return response($html);
        }
    }
}
