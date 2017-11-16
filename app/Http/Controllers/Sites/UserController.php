<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\helper;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('sites._component.profile');
    }

    public function setting()
    {
        return view('sites._component.account_setting');
    }

    public function changeAvatar(Request $request, $id)
    {
        $data = User::findOrFail($id);
        try {
            if ($request->hasFile('avatar')) {
                $file_name = helper::importFile($request->file('avatar'), config('setting.defaultPath'));
                $data->avatar = $file_name;
            }
            $data->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'min:6|required',
            'password_register' => 'min:6|required',
            'password_confirm' => 'same:password_register|min:6|required',
        ]);

        $data = User::find($id);
        try {
            $data->password = $request->password_register;
            $data->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function changeEmail(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'new_email' => 'email|required',
            'email_confirm' => 'same:new_email|email|required',
        ]);

        $data = User::find($id);
        try {
            $data->email = $request->new_email;
            $data->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'max:255|min:2',
            'avatar' => 'mimes:jpeg,bmp,png,jpg',
        ]);
        
        $data = User::find($id);
        try {
            if ($request->hasFile('avatar')) {
                $file_name = helper::importFile($request->file('avatar'), config('setting.defaultPath'));
                $data->avatar = $file_name;
            }
            $data->full_name = $request->full_name;
            $data->address = $request->address;
            $data->gender = $request->gender;
            $data->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }
        
        return redirect('profile');
    }
}
