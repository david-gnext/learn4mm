<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
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
        $subjects = DB::select('select s.id as sid,s.name as sname,s.description,s.isRead as rd,c.class from subject as s left join color as c on c.type = s.majorid where s.majorid = ?',[$id]);
        return view('Major::subject/index', ['subjects' => $subjects]);
        
    }
}

