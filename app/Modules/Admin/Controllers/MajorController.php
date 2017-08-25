<?php
namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class MajorController extends BaseController
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
        return view("Admin::major/index",["dbstatus"=>$data]);
    }
    public function insert() {
        return view("Admin::modal",['colors'=>$this->colors()]);
    }
    public function save(Request $request,$id) {
        if($id == "new") {
            DB::table("major")->insert(
                    ['name'=>$request->name,'description'=>$request->desc,'color'=>$request->cname]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Created Successfully"));
        } else {
            
        }
    }
}



