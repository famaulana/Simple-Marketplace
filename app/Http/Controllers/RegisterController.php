<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\UsersModel;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->userModel = new UsersModel;
    }

    public function index()
    {
        return view('pages/register');
    }

    public function post(Request $request)
    {
        $request->merge([
            'password' => Hash::make($request->password)
        ]);
        $data = $request->except('_token');
        if($this->userModel->store($data)){
            return redirect('/login')->withErrors([
                'succ' => 'Success register your data.'
            ]);
        }else{
            return back()->withErrors([
                'err' => 'Error while register your data.'
            ]);
        };
    }
}
