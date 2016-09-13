<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;
use Storage;

class FileController extends Controller
{
    public function update($id, $type)
    {	

    	$file = File::find($id);

   if($type == 'delete') {
    	$filename = $file->filename;
    	$res = $file->delete();
    	if($res) {
    		Storage::disk('uploads')->delete($filename);
    	}
    }

    if($type == 'avatar') {

		File::where('filetable_id', $file->filetable_id)->where('filetable_type', $file->filetable_type)->update(['avatar' => false]);

    	$file->avatar = true;
    	$file->save();
    }

    return back();
    }

}