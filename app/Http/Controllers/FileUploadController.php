<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request) 
    {
        if($request->file()) {
            $fileName = time().'.'.$request->file->getClientOriginalName();
            $request->file->move(public_path('uploads/'.$request->folder), $fileName);
            return $fileName;
        } else {
            return 'no file';
        }
    }
}
