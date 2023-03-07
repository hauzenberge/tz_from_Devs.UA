<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

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

    protected $appends = [
        'img'
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



    public function getImgAttribute()
    {
        if (stripos($this->original_file_name, 'Jpeg') !== false) {
            $return = '<img src="' . Storage::url('uploads/' . $this->original_file_name) . '" class="card-img-top" alt="...">';
        }else $return = null;
        return $return;
    }

    public function getOriginalFileNameAttribute($value)
    {
        if (stripos( $value, 'Pdf') != false) {
            $return = '<a href="' . Storage::url('uploads/' . $value) . '" target="_blank">' . $value . '</a>';
        }else $return =$value;

        return $return;
    }
}
