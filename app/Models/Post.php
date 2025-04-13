<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    protected $table = 'Posts';
    protected $fillable = ['title','body'];

    public function comments()
{
    return $this->hasMany(Comment::class);
    // this will work like given bewlow
    // SELECT * FROM comments WHERE post_id = $post->id;
}
public function category()
{
    return $this->belongsTo(Category::class);
}

}
