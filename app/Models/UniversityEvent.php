<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityEvent extends Model
{
    use HasFactory;

    protected $table = 'university_events';

    protected $guarded = [];

    public $timestamps = false;
}
