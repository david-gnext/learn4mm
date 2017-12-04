<?php
namespace App\Modules\Admin\Controllers;

use  App\Modules\Admin\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SubjectController extends BaseController
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

    public function index() {
        $data = $this->getDBInfo();
        $data["major"]["data"] = DB::table("major")->where("deleted_flag",0)->paginate(10);
        return view("Admin::subject/index",["dbstatus"=>$data]);
    }
    public function getByMajorId($id){
        $data = DB::table("subject")->where("majorid",$id)->where("deleted_flag",0)->paginate(10);
        return view("Admin::subject/get",["subject"=>$data,"majorid"=>$id]);
    }
    public function insert($id) {
        $data = array(
            "title" => "Create Subject",
            "id"=>"subject_create",
            "child"=>"subject",
            "mid" => $id,
            "name" => DB::table("major")->where("id",$id)->select("name")->get()
        );
        return view("Admin::modal",['colors'=>$this->colors(),'data'=>$data]);
    }
     public function delete($id) {
        DB::table("subject")->where("id",$id)->update(
                    ['deleted_flag'=>1]
                    );
        echo json_encode(array("code"=>200,"msg"=>"Deleted Successfully"));
    }
    public function save(Request $request,$id) {
        if($id == "new") {
            DB::table("subject")->insert(
                    ['name'=>$request->name,'description'=>$request->desc,'isRead'=>$request->isRead,'majorid'=>$request->majorId,'created_time'=>date("Y-m-d H:i:s")
                    ,'deleted_flag'=>0]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Created Successfully"));
        } else {
            DB::table("subject")->where("id",$id)->update(
                    ['name'=>$request->name,'description'=>$request->desc]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Updated Successfully"));
        }
    }
}
