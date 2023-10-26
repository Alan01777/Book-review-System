@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="mb-4">
        <h1 class="sticky top-0 mb-2 text-2xl">{{ $book->title }}</h1>

        <div class="book-info">
            <div class="book-author mb-2 text-lg font-semibold text-slate-800">by {{ $book->author }}</div>
            <div class="mb-2 text-sm text-slate-500">
                <p>Last Update: {{ $book->updated_at->diffForHumans() }}</p>
            </div>
            <div class="book-rating flex items-center mb-2">
                <div class="book-rating">
                    <x-star-rating :rating="$book->review->avg('rating')"/> &nbsp;
                    {{ number_format($book->review->avg('rating'), 1) }} &nbsp;
                </div>
                <div class="book-review-count text-sm text-slate-500">
                    <span>
                        {{ $book->review->count() }}
                        {{ Str::plural('review', $book->review->count()) }}
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">Add a review</a>
            </div>

            @if ($book->description)
                <div class="book-description mb-4 text-slate-700">
                    {{ $book->description }}
                </div>
            @endif
        </div>
    </div>

    <div>
        <h2 class="mb-4 text-xl font-semibold text-slate-800">Reviews</h2>
        <ul>
            @forelse ($book->review as $review)
                <li class="book-item mb-4">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">
                            <span class="mb-2 flex items-center justify-between">{{ $review->user->name }}</span>
                        </div>
                        <div class="mb-2 flex items-center justify-between">
                            <div class="text-sm font-medium text-slate-700">
                                <x-star-rating :rating="$review->rating" /> &nbsp;
                            </div>

                            <div class="book-review-count text-slate-500">
                                {{ $review->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <p class="text-slate-700">{{ $review->review }}</p>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-book-item">
                        <p class="empty-text text-lg font-semibold text-slate-500">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
