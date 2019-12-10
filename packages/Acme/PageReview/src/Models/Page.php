<?php
// File: packages/Acme/PageReview/src/Models/Page.php

namespace Acme\PageReview\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'path',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
