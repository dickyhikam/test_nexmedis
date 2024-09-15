<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'content',
        'image_url',
    ];

    // Jika menggunakan timestamp default Eloquent
    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany(CommentModel::class, 'post_id');
    }
    public function likes()
    {
        return $this->hasMany(LikeModel::class, 'post_id');
    }

    // Relasi satu ke satu dengan User
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }
}
