<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment'
    ];

    // Tambahkan relasi dengan Post
    public function post()
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    // Tambahkan relasi dengan User
    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }
}
