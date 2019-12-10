<?php
// File: packages/Acme/PageReview/src/Controllers/PageReviewController.php

namespace Acme\PageReview\Controllers;

use Illuminate\Http\Request;
use Acme\PageReview\Models\Page;
use Illuminate\Routing\Controller;
use Pusher\Laravel\Facades\Pusher;

class PageReviewController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->path)) {
            $page = Page::firstorCreate(['path' => $request->path]);

            $reviews = $page->reviews()
                    ->orderBy(
                        config('pagereview.order.as'),
                        config('pagereview.order.by')
                    )
                    ->get();

            return response()->json([
                'page' => $page,
                'reviews' => $reviews
            ]);
        }

        return response()->json([]);
    }

    public function store(Request $request)
    {
        $page = Page::firstorCreate(['path' => $request->path]);

        $review = $page->reviews()->create([
            'username' => $request->username,
            'comment' => $request->comment,
        ]);

        Pusher::trigger('page-'.$page->id, 'new-review', $review);

        return $review;
    }
}
