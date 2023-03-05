<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFileInfo extends Model
{
    use HasFactory;

    protected $table = 'upload_file_inforation';

    protected $filleble = [
        'id',

        'original_file_name',
        'file_size',
        'file_ext',
        'hash',

        'created_at',
        'updated_at'
    ];

    public static function SaveInfo($name, $file_size, $ext, $hash)
    {
        $return = new UploadFileInfo;
        $return->original_file_name = $name;
        $return->file_size = $file_size;
        $return->file_ext = $ext;
        $return->hash = $hash;
        $return->save();
        return $return;
    }
}
