@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Add review for {{ $book->title }}</h1>

    <form action="{{ route('books.reviews.store', $book) }}" method="POST">
        @csrf

        <div>
            <label for="review">Review</label>
            <textarea name="review" id="review" cols="20" rows="6" required class="input mb-4"></textarea>
        </div>

        <div>
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="input mb-4">
                <option value="">Select Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div>
            <button type="submit" class="btn">Add Review</button>
        </div>
    </form>
@endsection
