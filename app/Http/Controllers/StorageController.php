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
            $type = 'disabilities';
        }

        if ($request->file('diseases')) {
            $path =  public_path() . '/storage/temp/diseases';
            $files = $request->file('diseases');
            $type = 'diseases';
        }

        if ($request->file('certifications')) {
            $path =  public_path() . '/storage/temp/certifications';
            $files = $request->file('certifications');
            $type = 'certifications';
        }

        if ($request->file('licenses')) {
            $path =  public_path() . '/storage/temp/licenses';
            $files = $request->file('licenses');
            $type = 'licenses';
        }

        if ($request->file('specialities')) {
            $path =  public_path() . '/storage/temp/specialities';
            $files = $request->file('specialities');
            $type = 'specialities';
        }

        File::makeDirectory($path, $mode = 0777, true, true);
        $dir = $path . '/' . $request->get('element');
        File::makeDirectory($dir, $mode = 0777, true, true);

        foreach($files as $file) {
            $filename = $type . '-' . $request->get('element') . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);
        }

        return $filename;

    }

    public function deleteImg(Request $request)
    {
        $aux = explode('-', $request->get('element'));
        $path = public_path() . '/storage/temp/' . $aux[0] . '/' . $aux[1] . '/';

        if (file_exists($path . $request->get('element'))) {
            File::delete($path . $request->get('element'));
        }
    }

}