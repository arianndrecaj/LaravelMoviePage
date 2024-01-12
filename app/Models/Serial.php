<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;

    protected $casts = [
        'genres' => 'array'
    ];
    protected $table = 'serial';
    protected $fillable = [
        'filename',
        'title',
        'description',
        'genres',
    ];

    public function user()
    {
        $this->belongsTo(Serial::class);
    }
}
