<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\IndustryWork;
use App\Models\ClassroomMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['user','post'];
    public function classroomMember(){
        return $this->belongsTo(ClassroomMember::class, 'classroom_id');
    }
    public function post(){
        return $this->hasMany(Post::class, 'classroom_id')->orderBy('created_at', 'desc');
    }
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
    // public function industryWork(){
    //     return $this->hasMany(IndustryWork::class, 'classroom_id');
    // }
}
