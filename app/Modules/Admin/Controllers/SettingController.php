<?php
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */   
   
    
    public function index(Request $request) {
        return view("User::setting",["info"=>Auth::user()]);
    }
    public function save(Request $request) {
        $id = Auth::user()->id;
        if (Auth::attempt(["id"=>$id,"password"=>$request['old-pass']])) {
            DB::table("users")->where("id",$id)->update(["email"=>$request->email,"password"=>bcrypt($request->password)]);
            echo json_encode(["code"=>200,"msg"=>"Profile Changed Successfully"]);
        } else{
        echo json_encode(["code"=>400,"msg"=>"Password mismatch"]);
        }
    }
}

