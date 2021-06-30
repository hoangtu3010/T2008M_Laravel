<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->method() == "GET")
            return view("auth.login");
        // Nếu chỉ là login user thông thường thì không cần làm việc này
//        $credentias = $request->only(["email", "password"]);
//        if (Auth::attempt($credentias)){ // login của bảng user
//            return redirect()->to("admin");
//        }

        // Đăng nhập cho admin
        $credentias = $request->only(["email", "password"]);
        if (Auth::guard("admin")->attempt($credentias)){
            return redirect()->to("admin");
        }
        return redirect()->back()->withInput();

        // Auth::user()-> Trả về user object đang login
        // Auth::id()-> Trả về id của user đang login
        // Auth::check()->
    }
}
