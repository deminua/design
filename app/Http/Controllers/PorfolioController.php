<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Porfolio;
use App\File;
use Storage;
#use Intervention\Image\ImageManager;

class PorfolioController extends Controller
{

	
    public function multiple_file_upload($id, Request $request)
    {
    	if($request->images) {
	    	foreach ($request->images as $file) {
	    		 $filename = md5(time().rand(5, 15)).'.'.$file->getClientOriginalExtension();
	    		 $destinationPath = 'uploads';
	    		 $filesize = $file->getSize();

	    		  #$upload_success = Storage::disk('uploads')->move($destinationPath, $filename);
	    		 $upload_success = $file->move($destinationPath, $filename);
	    		 if($upload_success) {
	    		 	$file = new File;
	    		 	$file->filename = $filename;
	    		 	$file->filesize = $filesize;
	    		 	$file->filetable_id = $id;
	    		 	$file->filetable_type = 'App\Porfolio';
	    		 	$file->save();
	    		 }
	    	}
    	}
    }

    public function index()
    {   
        $porfolios = Porfolio::with('avatar')->orderBy('created_at', 'desc')->paginate(16);
        return view('porfolio.index')->with('porfolios', $porfolios);
    }

   public function back_next($porfolio)
    {   
            $back_next['next'] = Porfolio::where('created_at', '>', $porfolio->created_at)->where('id', '<>', $porfolio->id)->orderBy('created_at', 'asc')->first();
            $back_next['back'] = Porfolio::where('created_at', '<', $porfolio->created_at)->where('id', '<>', $porfolio->id)->orderBy('created_at', 'desc')->first();
            return $back_next;
    }

   public function show($id)
    {
        $porfolio = Porfolio::find($id);
        $back_next = $this->back_next($porfolio);
        return view('porfolio.show')->with('porfolio', $porfolio)->with('back_next', $back_next);
    }


    public function create()
    {
        return view('porfolio.create');
    }

    public function edit($id)
    {	
    	$porfolio = Porfolio::with('files')->find($id);
        return view('porfolio.edit')->with('porfolio', $porfolio);
    }

    public function store(Request $request)
    {	
    	$porfolio = new Porfolio;
    	$porfolio->name = $request->name;
    	$porfolio->description = $request->description;
        $porfolio->body = $request->body;
        $porfolio->css_name = $request->css_name;
        $porfolio->css_created_at = $request->css_created_at;
        $porfolio->save();

    	$this->multiple_file_upload($porfolio->id, $request);

    	return redirect()->route('porfolio.edit', ['id' => $porfolio->id]);
    }

    public function update($id, Request $request)
    {	

    	$this->multiple_file_upload($id, $request);

    	$porfolio = Porfolio::find($id);
    	$porfolio->name = $request->name;
    	$porfolio->description = $request->description;
    	$porfolio->body = $request->body;
        $porfolio->created_at = $request->created_at;
        $porfolio->css_name = $request->css_name;
        $porfolio->css_created_at = $request->css_created_at;
    	$porfolio->save();


    	return redirect()->route('porfolio.edit', ['id' => $porfolio->id]);

    }

}
