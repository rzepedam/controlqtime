<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    public function saveTempImg(Request $request)
    {
        if ($request->file('disabilities')) {
            $files = $request->file('disabilities');
            $dir =  public_path() . '/storage/imgs';

            foreach($files as $file) {
                $filename = Str::random(25) . '.' . $file->getClientOriginalExtension();
                $file->move($dir, $filename);
            }
        }
    }
}
