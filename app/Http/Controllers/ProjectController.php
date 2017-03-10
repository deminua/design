<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\People;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update_people(Request $request)
    {	
        if(isset($request->id)) {
    	   $people = People::find($request->id);
        } else {
            $people = new People();
        }
    	$people->fill($request->all());
    	$people->save();
    	return back();
    }



    public function update_project(Request $request)
    {   
        if(isset($request->id)) {
           $project = Project::find($request->id);
        } else {
            $project = new Project();
        }

        $data = $request->all();
        foreach ($data as $key => $value) {
            if(empty($value)) {
                $data[$key] = NULL;
            } else {
                $data[$key] = $value;
            }
        }

        $project->fill($data);
        $project->save();
        return redirect()->route('home');
    }


    public function project(Request $request)
    {   
        $peoples = ['0'=>'Нет'];
        foreach (People::get() as $people) {
            $peoples[$people->id] = trim($people->name .' '. $people->surname .' '. $people->patronymic);
        }

        if($request->id) {
            return view('projects.create')->with('project', Project::find($request->id))->with('peoples', $peoples);
        }
            return view('projects.create')->with('project', new Project())->with('peoples', $peoples);
    }


    public function index_people(Request $request)
    {	
    	if($request->id) {
        	return view('people.index')->with('people', People::find($request->id))->with('peoples', People::get());
    	}
        	return view('people.index')->with('people', new People())->with('peoples', People::get());
    }

    public function index()
    {
        return view('projects.index')->with('projects', Project::with('customer', 'director', 'curator', 'designer')->paginate(15));
    }
}
