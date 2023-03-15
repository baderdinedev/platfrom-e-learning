<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StatsController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                    ->groupBy('date')
                    ->get();
    
        $data = [];
        foreach ($users as $user) {
            $data[$user->date] = $user->count;
        }
        $json_data = json_encode($data);
        return view('teacher.stats.index', ['json_data' => $json_data]);
    }
    

}
