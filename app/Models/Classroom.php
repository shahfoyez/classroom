<?php

namespace App\Models;

use App\Models\ClassroomMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function classroomMember(){
        return $this->hasMany(ClassroomMember::class, 'classroom_id');
    }
}
