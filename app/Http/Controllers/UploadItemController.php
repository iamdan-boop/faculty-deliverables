<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadItemController extends Controller
{


    public function store(Request $request)
    {

        if ($request->hasFile('proof')) {
            $file = $request->file('proof')[0];
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/images/tmp/' . $folder, $filename);

            $temp = TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            return $temp->folder;
        }
        return '';
    }
}
