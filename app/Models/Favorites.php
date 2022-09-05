<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'id_book', 'page_number', 'gender', 'img_book', 'user_id'];
    
    // protected $with = ['users'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
