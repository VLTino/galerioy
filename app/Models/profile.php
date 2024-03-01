<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $primaryKey = 'profileid';

    public $timestamps = false ;

    protected $fillable = [
        'profileid',
        'userid',
        'describe_profile',
        'link_acc',
        'photo_profile'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }
}
