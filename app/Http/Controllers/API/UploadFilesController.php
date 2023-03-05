<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UploadFileInfo;
use Illuminate\Support\Facades\Storage;

class UploadFilesController extends Controller
{
    public function upload(Request $request)
    {
        $name = $request->file('file')->getClientOriginalName();
        $hashName = $request->file('file')->hashName();
        $size = $request->file('file')->getSize();

        if (($size / 102400) < 5) {
            if (stripos($name, 'Jpeg') !== false) {
                $ext = 'Jpeg';
                $return = UploadFileinfo::SaveInfo($name, $size, $ext, $hashName)->hash;
            } elseif (stripos($name, 'Pdf')  !== false) {
                $ext = 'Pdf';
                $return = "<strong>File was uploaded successfully</strong><br>";
                $return .='ID: '. UploadFileinfo::SaveInfo($name, $size, $ext, $hashName)->hash;
            } else $return = collect([
                'error_description' => 'We support .pdf,.jpeg formats '
            ]);
        }else $return = collect([
            'error_description' => 'The file size has exceeded 5MB'
        ]);

        return $return;
    }
}
