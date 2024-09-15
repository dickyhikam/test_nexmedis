<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = [
        'post_id',
        'user_id'
    ];

    // Tambahkan relasi dengan Post
    public function post()
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    // Tambahkan relasi dengan User
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }
}
