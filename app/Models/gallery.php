<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $primaryKey = 'id_photo';

    protected $fillable = [
        'describe_photo',
        'gambar',
        'like_post',
        'userid',
    ];
     
    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'id_photo');
    }

    public function likes(){
        return $this->hasMany(like::class,'id_photo');
    }
}
