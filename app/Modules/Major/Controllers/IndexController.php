<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
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
        $majors = DB::select('select * from major left join color on color.type = major.colortype');
        return view('/welcome', ['majors' => $majors]);
    }
}
