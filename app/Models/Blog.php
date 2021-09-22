<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    protected $table ="blog";

    protected $fillable = [
        'active',
        'title',
        'slug',
        'preview_text',
        'detail_text',
        'preview_image',
        'detail_image',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function createdby(){
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

}
