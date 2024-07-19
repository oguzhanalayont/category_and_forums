<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['name','title','content','category_id'];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
