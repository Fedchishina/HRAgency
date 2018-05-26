<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download($fileType, $fileName){
        $myFile = public_path('files/' . $fileName . '.' . $fileType);

        $headers = ['Content-Type: application/file'];
        $newName = $fileName . '_' . time() . '.' . $fileType;

        return response()->download($myFile, $newName, $headers);
    }
}
