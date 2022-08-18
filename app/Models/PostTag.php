<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

//For handling events on attach/ detach
class PostTag extends Pivot
{
    use HasFactory;
    protected $table='post_tag';

    public static function boot(){
        parent::boot();
        static::created(function($item){
            dd('created event',$item);
        });
        static::deleted(function($item){
            dd('delete event',$item);
        });
    }
}
