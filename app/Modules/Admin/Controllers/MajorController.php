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
        $data["major"]["data"] = DB::table("major")->where("deleted_flag",0)->paginate(10);
        return view("Admin::major/index",["dbstatus"=>$data]);
    }
    public function insert() {
        $data = array(
            "title" => "Create Major",
            "id"=>"major_create",
            "child"=>"major"
        );
        return view("Admin::modal",['colors'=>$this->colors(),'data'=>$data]);
    }
    public function delete($id) {
        DB::table("major")->where("id",$id)->update(
                    ['deleted_flag'=>1]
                    );
        echo json_encode(array("code"=>200,"msg"=>"Deleted Successfully"));
    }
    public function save(Request $request,$id) {
        if($id == "new") {
            DB::table("major")->insert(
                    ['name'=>$request->name,'description'=>$request->desc,'color'=>$request->cname,'created_time',now()]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Created Successfully"));
        } else {
            DB::table("major")->where("id",$id)->update(
                    ['name'=>$request->name,'description'=>$request->desc]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Updated Successfully"));
        }
    }
}
