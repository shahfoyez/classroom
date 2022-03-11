<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['assignmentSubmission'];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function assignmentSubmission(){
        return $this->hasMany(AssignmentSubmission::class, 'assignment_id');
    }
}