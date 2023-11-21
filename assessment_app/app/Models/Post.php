<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'postsmodule'; //table module post
    protected $dateFormat = 'Y-m-d H:i:s'; //Date format to make it exact timezone based on locally.
    
    protected $fillable = [
        'title', 
        'content', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
