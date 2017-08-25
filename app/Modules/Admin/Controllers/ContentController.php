<?php
namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ContentController extends BaseController
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
    public function __construct() {
        $this->middleware("auth")->except("logout");
    }
    
    public function index(Request $request) {
        $data = $this->getDBInfo();
        $data["major"]["data"] = DB::table("major")->paginate(10);
        return view("Admin::content/index",["dbstatus"=>$data]);
    }
    public function getByMajorId($id){
        $data = DB::table("subject")->where("majorid",$id)->paginate(10);
        return view("Admin::content/get",["subject"=>$data]);
    }
}


