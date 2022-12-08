<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Str;
use Storage;

class UploadEditorController extends Controller
{
    public function upload(Request $request)
    {
        $path_url = 'storage/'.Auth::id();

        if ($request->hasFile('upload')) {
           $originName = $request->file('upload')->getClientOriginalName();

           $fileName = pathinfo($originName, PATHINFO_FILENAME);

           $extension = $request->file('upload')->getClientOriginalExtension();

           $fileName = Str::slug($fileName).'_'.time().'.'.$extension;

           $request->file('upload')->move(public_path($path_url), $fileName);
           
           $url = asset($path_url.'/'.$fileName);
        }

        return response()->json(['url' => $url]);
        
    }
}
