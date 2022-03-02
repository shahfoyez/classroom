<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $with=['classroomMember'];
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
