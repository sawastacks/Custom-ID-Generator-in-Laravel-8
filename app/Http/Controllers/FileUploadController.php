<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;

class FileUploadController extends Controller
{
    function index(){
        return view('upload');
    }
    function upload(Request $request){
        $path = 'uploads/';
        $newname = Helper::renameFile($path, $request->file('_file')->getClientOriginalName());

        $upload = $request->_file->move(public_path($path), $newname);
        if($upload){
            echo 'File has been successfuly uploaded';
        }else{
            echo 'Something went wrong';
        }
    }
}
