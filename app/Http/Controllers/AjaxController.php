<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;

class AjaxController extends Controller
{
    public function getResult(Request $request)
    {
        $categories = Category::all();
        $services = Service::all();

        return view('sites._component.data', compact(
            'categories',
            'services'
        ));
    }

    public function getService(Request $request)
    {
        if ($request->ajax()) {
            $province_id = $request->province_id;
            $category_id = $request->category_id;
            $services = Service::provinceCategory($province_id, $category_id);
            $html = view('sites._component.service_result', compact('services'))->render();

            return response($html);
        }
    }
}
