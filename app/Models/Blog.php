<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    protected $table ="blog";

    protected $fillable = [
        'sort',
        'active',
        'category_id',
        'title',
        'slug',
        'type',
        'preview_text',
        'detail_text',
        'preview_image',
        'detail_image',
        'video_url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'view_counter'
    ];

    public function createdby(){
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

}
