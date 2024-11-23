<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'address',
        'email',
        'phone_number'
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
