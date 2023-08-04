<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Level;
use App\Models\Lesson;
use Illuminate\Support\Facades\Validator;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Formation::where('is_hidden', false)->get();
        $hidden = Formation::where('is_hidden', true)->get();
        return view('teacher.formation.index',compact('lessons','hidden'));
    }

    public function create()
        {
            $levels = Level::all();
            return view('teacher.formation.create',compact('levels'));
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'attachment' => 'required|mimes:pdf,doc,docx',
            'meeting_url' => 'required|url',
            'niveau' => 'required|exists:levels,id',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $formation = new Formation();
        $formation->title = $request->title;
        $formation->description = $request->description;
        $formation->meeting_url = $request->meeting_url;
        $formation->niveau = $request->niveau;
        
        // Handle file upload
        $file = $request->file('attachment');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('attachments/' . $filename, file_get_contents($file));
        $formation->attachment = $filename;
    
        $formation->save();
    
        return redirect()->route('managment-formation')->with('success', 'Formation created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        return view('teacher.formation.show', compact('formation'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        return view('teacher.formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'meeting_url' => 'nullable|url',
        ]);
    
        try {
            $formation = Formation::findOrFail($id);
            $formation->title = $validatedData['title'];
            $formation->description = $validatedData['description'];
    
            // Handle file upload
            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('public/attachments');
                $formation->attachment = str_replace('public/', 'storage/', $attachmentPath);
            }
    
            $formation->meeting_url = $validatedData['meeting_url'];
    
            $formation->save();
    
            return redirect()->route('formations.index')->with('success', 'Formation updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong.');
        }
    }
    
    public function hide(Formation $formation)
    {
        $formation->update(['is_hidden' => true]);
        
        return redirect()->back()->with('success', 'Formation hidden successfully!');
    }
    public function unhide(Formation $formation)
    {
        $formation->update(['is_hidden' => false]);
    
        return redirect()->back()->with('success', 'Formation hidden successfully!');
    }    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request)
     {
         $searchTerm = $request->input('search');
         $formations = Formation::where('title', 'LIKE', '%' . $searchTerm . '%')->get();
         return view('teacher.formation.search', compact('formations', 'searchTerm'));
     }
     

    //  use Maatwebsite\Excel\Facades\Excel;

    //  public function export()
    //  {
    //      $formations = Formation::all();
    //      $data = [];
     
    //      foreach ($formations as $formation) {
    //          $data[] = [
    //              'title' => $formation->title,
    //              'description' => $formation->description,
    //              'start_date' => $formation->start_date,
    //              'end_date' => $formation->end_date,
    //              'created_at' => $formation->created_at,
    //              'updated_at' => $formation->updated_at,
    //          ];
    //      }
     
    //      return Excel::download(new FormationsExport($data), 'formations.xlsx');
    //  }

    public function countFormationsByLevel()
    {
        $formationsByLevel = Formation::select('level', DB::raw('count(*) as total'))
                                        ->groupBy('level')
                                        ->get()
                                        ->toArray();
        
        return $formationsByLevel;
    }
               
    public function averageParticipantsPerFormation()
    {
        $averageParticipants = Formation::select(DB::raw('avg(participants_number) as average'))
                                            ->get()
                                            ->toArray();
    
        return $averageParticipants;
    }
    public function destroy($id)
    {
        //
    }

    public function download($id)
{
    $lesson = Formation::findOrFail($id);

    $filePath = storage_path('app/public/attachments/' . $lesson->attachment);

    if (!Storage::exists($filePath)) {
        abort(404);
    }

    return response()->download($filePath, $lesson->attachment);
}
}
