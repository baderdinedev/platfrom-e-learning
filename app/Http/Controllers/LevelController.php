<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
class LevelController extends Controller
{
    //
            // Affiche le formulaire pour créer un nouveau niveau
            public function create()
            {
                $levels = Level::all();
                return view('teacher.levels.create_level', compact('levels'));
            }
        
            // Enregistre un nouveau niveau dans la base de données
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:levels,name',
                    'description' => 'required',
                ],[
                    'name.required' => 'Le nom du niveau est obligatoire.',
                    'name.max' => 'Le nom du niveau ne doit pas dépasser 255 caractères.',
                    'description.required' => 'La description du niveau est obligatoire.',
                ]);
        
                $level = new Level([
                    'name' => $request->get('name'),
                    'description' => $request->get('description')
                ]);
                $level->save();
                return redirect('/teacher/dashboard')->with('success', 'Niveau enregistré avec succès');
            }
    
    
            public function index()
            {
                $levels = Level::all();
        
                return view('teacher.levels.index', compact('levels'));
            }
    
            public function show($id)
            {
                $level = Level::find($id);
                return view('teacher.levels.show', ['level' => $level]);
            }
    
                // Affiche le formulaire pour éditer un niveau spécifique
        public function edit($id)
        {
            $level = Level::find($id);
            return view('teacher.levels.edit', compact('level'));
        }
    
        // Met à jour un niveau spécifique dans la base de données
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|unique:levels,name,'.$id,
                'description' => 'required',
            ]);
    
            $level = Level::find($id);
            $level->name = $request->get('name');
            $level->description = $request->get('description');
            $level->save();
    
            return redirect('teacher/levels')->with('success', 'Niveau mis à jour avec succès');
        }

        public function destroy($id)
        {
            $level = Level::findOrFail($id);
            $level->delete();

            return redirect()->route('level_list')->with('success', 'Level deleted successfully!');
        }

    
}
