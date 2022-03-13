<?php

namespace App\Models;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with =['user'];

    public function assignment(){
        return $this->belongsTo(Assignment::class, 'as_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
