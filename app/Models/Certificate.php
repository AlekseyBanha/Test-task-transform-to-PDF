<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    const FORMAT_PAPER = 'a5';
    const PAGE_ORIENTATION = 'landscape';

    protected array $fillable = [
        'name',
        'date',
        'number',
        'course',
    ];

}
