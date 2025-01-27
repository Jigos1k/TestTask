<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function scopeAvailable($query){
        return $query->where('status', 'available');
    }

    public function canEdit($user){
        return $user === 'admin';
    }
}
