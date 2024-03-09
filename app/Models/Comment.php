<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'body', 'article_id'];
    //protected $guarded = [];
    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
