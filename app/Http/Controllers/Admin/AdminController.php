<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\helper;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);
        if ($request->ajax()) {
            return view('admin._component.user.paginate_user', compact('users'))->render();
        }

        return view('admin._component.user.manage_user', compact('users'));
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
            'picture' => 'mimes:jpeg,jpg,png',
            'full_name' => 'required',
            'password' => 'min:6|required',
            'repassword' => 'same:password|min:6|required',
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'gender' => $request->gender,
            'level' => $request->level,
            'status' => $request->status,
        ];
        if ($request->hasFile('image')) {
            $file_name = Helper::importFile($request->file('image'), config('setting.defaultPath'));
            $data['avatar'] = $file_name;
        }
        
        $user = User::create($data);

        return response()->json($user);
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

            $user = User::find($request->id);

            return response()->json($user);
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

    public function updateLevel(Request $request)
    {   
        try {
            $user = User::find($request->id);
            $user->level = $request->level;
            $user->save();

            return response()->json($user);
        } catch (Exception $e) {
            echo $e->get_message();
        }
    }

    public function updateStatus(Request $request)
    {   
        try {
            $user = User::find($request->id);
            $user->status = $request->status;
            $user->save();
            
            return response()->json($user);
        } catch (Exception $e) {
            echo $e->get_message();
        }
        
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

    public function search(Request $request)
    {   
        $key = $request->key;
        $users = User::where('full_name', 'like', '%'. $key .'%')
            ->orWhere('email', 'like', '%'. $key .'%')->get();
        $html = view('admin._component.user.search', compact('users'))->render();

        return response($html);
    }

    public function filter(Request $request) {
        $level = $request->level;
        $users = User::where('level', '=', $level)->get();
        $view = view('admin._component.user.search', compact('users'))->render();

        return response($view);
    }
}
