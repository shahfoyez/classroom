<?php

namespace App\Models;

use App\Models\User;
use App\Models\Topic;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['attachment','user','assignment'];
    public function attachment(){
        return $this->hasOne(Attachment::class, 'post_id');
    }
    public function assignment(){
        return $this->hasOne(Assignment::class, 'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
