<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $primaryKey = 'idlike';

    protected $fillable = [
        'userid',
        'id_photo',
    ];
     
    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function post(){
        return $this->belongsTo(gallery::class, 'id_photo');
    }
}
