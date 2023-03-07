<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UploadFileInfo;

class HomeController extends Controller
{
    public function index()
    {
        //dd(UploadFileInfo::all());
        return view('index', [
            'files' => UploadFileInfo::all(),
        ]);
    }
}
