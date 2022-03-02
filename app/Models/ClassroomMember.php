<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassroomMember extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['user', 'classroom'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
