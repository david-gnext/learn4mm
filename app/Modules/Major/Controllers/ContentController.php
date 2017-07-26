<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    
    public function index($id) {
        $subjects = DB::table("content")->join("subject","subject.id","=","content.subjectid")
                ->join("color","color.type","=","subject.majorid")->select("content.*","color.class")->paginate(1);
        return view('Major::content/index', ['subjects' => $subjects]);
        
    }
}


