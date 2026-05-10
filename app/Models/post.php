<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'postUUID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'postUUID',
        'user_id',
        'text',
        'image_path',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
