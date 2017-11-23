<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\Province;
use App\Helpers\helper;
use App\Http\Requests\admin\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $categories = Category::all();
        $provinces = Province::all();
        $services = Service::with(['category', 'province'])->orderBy('rate', 'desc')->paginate(5);
        if ($request->ajax()) {
            return view('admin._component.service.paginate_service', compact('services'))->render();
        }

        return view('admin._component.service.manage_service', compact('services', 'provinces', 'categories'));
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
    public function store(ServiceRequest $request)
    {   
        $response = Helper::messageException();
        try {
            $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'province_id' => $request->province,
            'price' => $request->price,
            'rate' => $request->rate,
            'description' => $request->description,
        ];
        if ($request->hasFile('image')) {
            $file_name = Helper::importFile($request->file('image'), config('setting.defaultPath'));
            $data['image'] = $file_name;
        }
        $service = Service::create($data);
        $response['data'] = $service;

        return response()->json($response);
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
        //
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
    public function update(ServiceRequest $request, $id)
    {
        $data = Service::find($request->id);
        $response = Helper::messageException();
        try {
            if ($request->hasFile('avatar')) {
                $file_name = Helper::importFile($request->file('avatar'), config('setting.defaultPath'));
                $data->image = $file_name;
            }
            $data->name = $request->name;
            $data->category_id = $request->category;
            $data->province_id = $request->province;
            $data->price = $request->price;
            $data->rate = $request->rate;
            $data->description = $request->description;
            $data->save();
            
            $response['data'] = $data;
            $response['status'] = 200;

            return response()->json($response);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response); 
        }
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

    public function showData(Request $request)
    {   
        $response = Helper::messageException();
        try {
            $data = [];
            $service = Service::with(['category', 'province'])->find($request->id);
            $data['category'] = Category::all();
            $data['province'] = Province::all();
            $data['service'] = $service;
            $response['data'] = $data;

            return response()->json($response);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response); 
        }
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $services = Service::search('name', $key)->get();
        $result = view('admin._component.service.search', compact('services'));

        return response($result);
    }

    public function filter(Request $request)
    {
        $province_id = $request->province_id;
        $services = Service::where('province_id', '=', $province_id)->get();
        $result = view('admin._component.service.search', compact('services'))->render();

        return response($result);
    }
}
