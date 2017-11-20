<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Helpers\helper;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::paginate(5);
        if ($request->ajax()) {
            return view('admin._component.province.paginate_province', compact('provinces'))->render();
        }

        return view('admin._component.province.manage_province', compact('provinces'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file_name = Helper::importFile($request->file('image'), config('setting.defaultPath'));
            $image = $file_name;
        }
        $province = new Province();
        $province->image = $image;
        $province->name = $request->name;
        $province->description = $request->description;
        $province->save();

        return response()->json($province);
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

    public function showData(Request $request)
    {   
        try {
            $province = Province::find($request->id);

            return response()->json($province);
        } catch (Exception $e) {
            echo $e->get_message();
        }
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
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,bmp,png,jpg',
        ]);
        $data = Province::find($request->id);
        try {
            if ($request->hasFile('avatar')) {
                $file_name = Helper::importFile($request->file('avatar'), config('setting.defaultPath'));
                $data->image = $file_name;
            }
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();
            
            return response()->json($data);
        } catch (Exception $e) {
            echo $e->get_message();
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

    public function search(Request $request)
    {
        $key = $request->key;
        $provinces = Province::search($key)->get();
        $result = view('admin._component.province.search', compact('provinces'));

        return response($result);
    }
}
