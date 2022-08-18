<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title'];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->withDefault([
            'name'=>'Guest User'
        ]);
    }

    public function tags(){
        //withTimestamps give value to timestamps in pivot table (post_tag)
        //withPivot to add additional columns of pivot to $post->tags->first()->pivot->status (additional column)
        //using will be to handle attach detach events
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')
        ->using(PostTag::class)
        ->withTimestamps()
        ->withPivot('status');
    }
}
