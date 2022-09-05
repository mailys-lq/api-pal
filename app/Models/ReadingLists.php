<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadingLists extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'id_book', 'book_read', 'like', 'user_id'];

    public function Users()
    {
        return $this->morphToMany(User::class, 'readinglisting');
    }
}
