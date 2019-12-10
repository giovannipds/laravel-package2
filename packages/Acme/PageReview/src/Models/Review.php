<?php
// File: packages/Acme/PageReview/src/Models/Review.php

namespace Acme\PageReview\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'page_id',
        'username',
        'comment'
    ];
}
