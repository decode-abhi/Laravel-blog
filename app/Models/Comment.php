<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['post_id','commenter_name','comment'];

    public function post()
{
    return $this->belongsTo(Post::class);

    // this will work like given bewlow
    // SELECT * FROM comments WHERE post_id = $post->id;

}

}
