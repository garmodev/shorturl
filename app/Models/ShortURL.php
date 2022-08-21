<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortURL extends Model
{
    use HasFactory;
    protected $table = 'short_url';
    protected $fillable = [
        'status',
        'old_url',
        'new_url',
        'created_at',
        'number_clicks'
    ];
}
