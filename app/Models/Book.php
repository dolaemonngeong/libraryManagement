<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'year_release',
        'author',
        'member_id'
    ];

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');

    }
}
