<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'parent_comment_id'
    ];

    public function parent_comment()
    {
        return $this->belongsTo(comment::class, 'parent_comment_id', 'id');
    }

    public function child_comments()
    {
        return $this->hasMany(comment::class, 'parent_comment_id', 'id');
    }
}