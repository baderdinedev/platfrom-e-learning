<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\News;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class exportDataController extends Controller
{

    public function exportCsv()
    {
        $users = \App\Models\User::select('name', 'email', 'phone', 'is_active', 'created_at', 'updated_at')->get();
    
        $fileName = "users_" . date('Ymd_His') . ".csv";
    
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
    
        $columns = ['Name', 'Email', 'Phone', 'Is Active', 'Created At', 'Updated At'];
    
        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
    
            foreach($users as $user) {
                fputcsv($file, [$user->name, $user->email, $user->phone, $user->is_active ? 'Yes' : 'No',$user->level_id , $user->created_at, $user->updated_at]);
            }
    
            fclose($file);
        };
    
        return response()->stream($callback, 200, $headers);
    }

    public function exportTeachers(Request $request)
    {
        $filename = "teachers.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Name', 'Email', 'Status', 'Created At', 'Updated At']);

        $teachers = DB::table('teachers')->get();

        foreach ($teachers as $teacher) {
            fputcsv($handle, [$teacher->name, $teacher->email, $teacher->status, $teacher->created_at, $teacher->updated_at]);
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($filename, 'teachers.csv', $headers);
    }


    public function exportNews()
{
    // Get the news data from the database
    $news = DB::table('news')->select('title', 'content', 'published', 'created_at', 'updated_at')->get();
    
    // Define the file name and headers
    $fileName = 'news.csv';
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    
    // Create a file pointer
    $file = fopen('php://output', 'w');
    
    // Add the headers to the file
    fputcsv($file, ['Title', 'Content', 'Published', 'Created At', 'Updated At']);
    
    // Add the news data to the file
    foreach ($news as $new) {
        fputcsv($file, [$new->title, $new->content, $new->published, $new->created_at, $new->updated_at]);
    }
    
    // Close the file pointer
    fclose($file);
    
    // Return the response with the file and headers
    return response()->streamDownload(function() use ($file) {
        fpassthru($file);
    }, $fileName, $headers);
}
}
