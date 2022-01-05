<?php

namespace Udiptaweb\LaravelMultilang\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function translationable()
    {
        return $this->morphTo();
    }
}
