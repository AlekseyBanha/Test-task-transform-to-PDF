<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    const FORMAT_PAPER = 'a5';
    const CHANGE_ME = 'landscape';

    protected array $fillable = [
        'name',
        'date',
        'number',
        'course',
    ];

}
