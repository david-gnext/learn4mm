<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class ContentController extends Controller
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
    
    public function index(Request $request,$id) {
        $subjects = DB::table("content")->join("subject","subject.id","=","content.subjectid")
                ->join("major","major.id","=","subject.majorid")->where('content.subjectid','=',$id)->select("content.*","major.color as class")->paginate(1);
        if($subjects->items()[0]->isFill) {
            return view('Major::content/index', ['subjects' => $subjects,'ajax'=>$request->ajax()]);
        } else {
            return view('Major::content/tutorial', ['subjects' => $subjects,'ajax'=>$request->ajax()]);
        }
    }
}


