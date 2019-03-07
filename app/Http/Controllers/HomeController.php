<?php

namespace App\Http\Controllers;

use App\CaseDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases_count = CaseDetail::count();
        $users_count = User::count();

        $todays_cases = CaseDetail::whereDate('created_at', Carbon::today())->get()->count();
        $todays_users = User::whereDate('created_at', Carbon::today())->get()->count();

        $opened_cases = CaseDetail::where('case_status', 0)->count();
        $investigated_cases = CaseDetail::where('case_status', 1)->count();
        $closed_cases = CaseDetail::where('case_status', 2)->count();

//        dd($opened_cases);

        return view('home', compact('cases_count', 'users_count', 'todays_cases', 'todays_users',
                                    'opened_cases', 'investigated_cases', 'closed_cases'));

    }

    public function getCity($id)
    {
        $cities = DB::table("city_masters")
            ->where("region_id",$id)
            ->pluck("city_desc","id");
        return json_encode($cities);
    }

}
