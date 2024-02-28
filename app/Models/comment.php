<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = 'comment_logs';

    protected $primaryKey = 'id_comment';

    public $timestamps = false;

    protected $fillable = [
        'comment',
        'id_photo',
        'userid',
    ];
     
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'id_photo');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
