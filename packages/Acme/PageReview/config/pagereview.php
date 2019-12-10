<?php
// File: packages/Acme/PageReview/config/pagereview.php

return [
    /*
    * This determines how the reviews will be ordered when fetched
    */
    'order' => [
        'by' => 'DESC',
        'as' => 'created_at',
    ],
];
