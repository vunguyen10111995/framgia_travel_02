<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\sites\ServicesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;
use App\Models\RequestService;
use App\Models\Province;
use App\Models\Category;

class RequestServicesController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $categories = Category::all();

        return view('sites._component.request_services', compact('provinces', 'categories'));
    }

    public function store(ServicesRequest $request)
    {
        try {
            $servicesRequest = new RequestService();
            if ($request->hasFile('image')) {
                $file_name = helper::importFile($request->file('image'), config('setting.requestPath'));
                $servicesRequest->image = $file_name;
            }

            $servicesRequest->fill($request->all());
            $servicesRequest->user_id = Auth::user()->id;
            $servicesRequest->status = config('setting.status.inprogress');
            $servicesRequest->save();

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
