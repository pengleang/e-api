<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**     * Create a new controller instance.
     *     * @return void     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**     * Show the application dashboard.
     *     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('home');
      /**  $users =  DB::select('select * from users where id = ?', [1]);
      * $results = DB::select('select * from users where id = :id', ['id' => 1]);// Named Bindings
       * return view('user.index', ['users' => $users]);
       *compact($users); ['users' => $users]
        *users is the key and $users is the value for bringing to front-end
         *foreach ($users as $user) {
           * echo $user->name;
       * }
        */
    }
    public function adminHome(){
        return view('adminHome');
    }

}
