@extends('layouts.app')


@section('title', 'Book reviews')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Books</h1>
        </div>

        <form action="{{ route('books.index') }}" method="GET" class="mb-4 flex items-center space-x-2">
            <input type="text" name="title" placeholder="Search by Title" value="{{ request('title') }}" class="input">
            <input type="hidden" name="filter" value="{{ request('filter') }}">
            <button type="submit" class="btn h-10">Search</button>
            <a href="{{ route('books.index') }}" class="btn h-10">Clear</a>
        </form>

        <div class="filter-container mb-4 flex">
            @php
                $filters = [
                    'latest' => 'Latest',
                    'popular_last_month' => 'Popular Last Month',
                    'popular_last_six_months' => 'Popular Last Six Months',
                    'highest_rated_last_month' => 'Hihgest Rated Last Month',
                    'highest_rated_last_six_months' => 'Highest Rated Last Six Months'
                ];
            @endphp

            @foreach ($filters as $key => $label)
                <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
                    class="{{ request('filter') === $key || (request('filter') == null && $key === '')
                        ? 'filter-item-active'
                        : 'filter-item' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
        <ul>
            @forelse($books as $book)
                <li class="mb-4">
                    <div class="book-item">
                        <div class="flex flex-wrap items-center justify-between">
                            <div class="full flex-grow sm:w-auto">
                                <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                                <span class="book-author">by {{ $book->author }}</span>
                            </div>
                            <div>
                                <div class="book-rating">
                                    <x-star-rating :rating="$book->review_avg_rating"/> &nbsp;
                                    {{ number_format($book->review_avg_rating, 1) }}
                                </div>
                                <div class="book-review-count">
                                    out of {{ $book->review_count }} {{ Str::plural('review', $book->review_count) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-book-item">
                        <p class="empty-text">No books found</p>
                        <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
