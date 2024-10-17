<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        "id",
        "name",
    ];

    public $incrementing = false;
}
