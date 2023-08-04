<?php

namespace App\Http\Controllers;
use App\Models\InscriptionClassroom;
use App\Models\User;
use App\Models\Level;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ChartController extends Controller
{
    public function showAllCurves()
    {
        // Retrieve data from the "inscriptionclassroom" table
        $inscriptions = DB::table('inscriptionclassroom')->get();

        // Group the data by the inscription date
        $groupedData = $inscriptions->groupBy('created_at')->map->count();

        // Prepare the data for the chart
        $chartData = [
            'labels' => $groupedData->keys(),
            'datasets' => [
                [
                    'label' => 'Number of Inscriptions',
                    'data' => $groupedData->values(),
                    'backgroundColor' => 'rgba(0, 123, 255, 0.5)', // Set a background color for the chart
                ],
            ],
        ];

        // Return the view with the chart data
        return view('admin.curves.chartJs', compact('chartData'));
    }


    
    public function getUserByLevel(Request $request)
    {
        $levels = Level::pluck('name'); // Get the level names
    
        $usersByLevel = User::select('level_id')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('level_id')
            ->pluck('total', 'level_id'); // Count users by level
    
        $chartData = [
            'labels' => $levels,
            'datasets' => [],
        ];
    
        foreach ($usersByLevel as $levelId => $total) {
            $chartData['datasets'][] = [
                'label' => 'Level ' . $levelId,
                'data' => [$total],
                'backgroundColor' => '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT),
            ];
        }
    
        return view('admin.curves.usersBylevel', compact('chartData'));
    }

    public function showChart(Request $request)
{
    $teachers = Teacher::select('created_at')
        ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
        ->get()
        ->groupBy(function ($teacher) {
            return $teacher->created_at->format('Y-m-d');
        })
        ->map(function ($group) {
            return $group->count();
        });

    $chartData = [
        'labels' => $teachers->keys(),
        'datasets' => [
            [
                'label' => 'Teacher Registrations',
                'data' => $teachers->values(),
                'backgroundColor' => '#FF6384', // Customize the background color as needed
            ],
        ],
    ];

    return view('admin.curves.visitorData', compact('chartData'));
}
    





}
