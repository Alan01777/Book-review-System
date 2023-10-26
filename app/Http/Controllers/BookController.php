<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return view('users.login');
        }

        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::when($title, fn($query, $title) => $query->title($title));

        switch ($filter) {
            case 'latest':
                $books->latest();
                break;
            case 'popular_last_month':
                $books->popular();
                break;
            case 'popular_last_6months':
                $books->popularLast6Months();
                break;
            case 'highest_rated_last_month':
                $books->highestRated();
                break;
            case 'highest_rated_last_6months':
                $books->highestRatedLast6Months();
                break;
            default:
                $books->latest()->withAvgRating()->withReviewsCount();
                break;
        }

        $cacheKey = 'books:' . $filter . ':' . $title;
        $books = cache()->remember($cacheKey, 3600, fn() => $books->paginate(10));

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if (!Auth::check()) {
            return view('users.login');
        }

        $cacheKey = 'book:' . $book->id;

        $book = cache()->remember(
            $cacheKey,
            3600,
            function () use ($book) {
                return Book::with([
                    'review' => function ($query) {
                        $query->latest();
                    },
                    'review.user',
                ])->findOrFail($book->id);
            }
        );

        $avgRating = $book->review->avg('rating');
        $reviewsCount = $book->review->count();

        $book->avg_rating = $avgRating;
        $book->reviews_count = $reviewsCount;

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
