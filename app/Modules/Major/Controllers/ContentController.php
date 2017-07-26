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
        $subjects = DB::select('select co.*,c.class from content as co left join subject as s on s.id = co.subjectid left join on color '
                . 'as c on c.type = s.majorid where co.subjectid = ?',[$id]);
        var_dump($subjects);exit;
        return view('Major::subject/index', ['subjects' => $subjects]);
        
    }
}


