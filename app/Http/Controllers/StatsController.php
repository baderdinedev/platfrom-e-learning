<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatsController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw('DATE(email_verified_at) as date'), DB::raw('count(*) as count'))
                    ->groupBy('date')
                    ->get();
    
        $data = [];
        foreach ($users as $user) {
            $data[$user->date] = $user->count;
        }
        $json_data = json_encode($data);
        return view('teacher.stats.index', ['json_data' => $json_data]);
    }

    public function showPolarAreaChart()
    {
        $users = User::pluck('name');
        $levels = DB::table('users')
                     ->select(DB::raw('COUNT(*) as level_count'))
                     ->groupBy('level_id')
                     ->pluck('level_count');

        return view('teacher.stats.polar')->with([
            'users' => $users,
            'levels' => $levels,
        ]);
    }

    

}
