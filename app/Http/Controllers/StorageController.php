<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    public function saveTempImg(Request $request)
    {
        if ($request->file('disabilities')) {
            $path =  public_path() . '/storage/temp/disabilities';
            $files = $request->file('disabilities');
        }

        if ($request->file('diseases')) {
            $path =  public_path() . '/storage/temp/diseases';
            $files = $request->file('diseases');
        }

        if ($request->file('certifications')) {
            $path =  public_path() . '/storage/temp/certifications';
            $files = $request->file('certifications');
        }

        if ($request->file('licenses')) {
            $path =  public_path() . '/storage/temp/licenses';
            $files = $request->file('licenses');
        }

        if ($request->file('specialities')) {
            $path =  public_path() . '/storage/temp/specialities';
            $files = $request->file('specialities');
        }

        File::makeDirectory($path, $mode = 0777, true, true);
        $dir = $path . '/' . $request->get('element');
        File::makeDirectory($dir, $mode = 0777, true, true);

        foreach($files as $file) {
            $filename = Str::random(25) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);
        }

        return $filename;

    }

    public function deleteImg($id)
    {
        dd('deleteImg...');
    }

}
