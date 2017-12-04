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
        $data["major"]["data"] = DB::table("major")->where("deleted_flag",0)->paginate(10);
        return view("Admin::content/index",["dbstatus"=>$data]);
    }
    public function getByMajorId(Request $request,$id){
        if($request->link == "major") {
            $data = DB::table("subject")->where("majorid",$id)->where("deleted_flag",0)->paginate(10);
        } else {
            $data = DB::table("content")->where("subjectid",$id)->where("deleted_flag",0)->paginate(10);
        }

        return view("Admin::content/get",["subject"=>$data,"link"=>$request->link,"subjectid"=>$id]);
    }
    public function insert($id) {
        $data = array(
            "title" => "Create Content",
            "id"=>"content_create",
            "child"=>"content",
            "subjectId" => $id,
            "name" => DB::table("subject")->where("id",$id)->select("name")->get()
        );
        return view("Admin::modal",['data'=>$data]);
    }
     public function delete($id) {
        DB::table("content")->where("id",$id)->update(
                    ['deleted_flag'=>1]
                    );
        echo json_encode(array("code"=>200,"msg"=>"Deleted Successfully"));
    }
    public function save(Request $request,$id) {
        if($id == "new") {
            DB::table("content")->insert(
                    ['subjectid'=>$request->subjectId,'content_main'=>$request->name,'content_mm'=>$request->mm,'q1'=>$request->q1,'q2'=>$request->q2,'q3'=>$request->q3,'ans'=>$request->ans,'hint'=>$request->hint,'isFill'=>$request->isRead,'audio'=>$request->audio,'img'=>$request->img,
                     'created_time'=> date('Y-m-d h:i:s'),
                     'deleted_flag'=>0]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Created Successfully"));
        } else {
            DB::table("content")->where("id",$id)->update(
                    ['subjectid'=>$request->subjectId,'content_main'=>$request->name,'content_mm'=>$request->mm,'q1'=>$request->q1,'q2'=>$request->q2,'q3'=>$request->q3,'ans'=>$request->ans,'hint'=>$request->hint,'isFill'=>$request->isRead,'audio'=>$request->audio,'img'=>$request->img,'created_time'=>date("Y-m-d h:i:s")]
                    );
            echo json_encode(array("code"=>200,"msg"=>"Updated Successfully"));
        }
    }
}
