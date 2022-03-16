<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'parent_comment_id'
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function parent_comment()
    {
        return $this->belongsTo(comment::class, 'parent_comment_id', 'id');
    }

    public function child_comments()
    {
        return $this->hasMany(comment::class, 'parent_comment_id', 'id');
    }

    public function is_acceptable_depth()
    {
        $depth = 0;

        $parent = $this->parent_comment;
        if (!$parent) return true;

        $depth++;
        while ($parent) {
            $depth++;
            if ($depth > 4) return false;
            $parent = $parent->parent_comment;
        }

        return true;
    }
}