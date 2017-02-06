<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];
    protected $filePath = '/images/'; //setting the file path here to avoid hard coding it

    public function getFileAttribute($photo) //creating the file accessor
    {
      return $this->filePath . $photo;
    }
}
