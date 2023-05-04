@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $book->title }}</h1>
    </div>
    <img src="{{ asset('/storage/covers/' . $book->cover) }}" width="300">
    <div class="table-responsive">
      <table class="table table-striped table-sm">
            <tbody>
                @isset($book->slug)
                <tr>
                    <td>Slug:</td>
                    <td>{{ $book->slug }}</td>
                </tr>
                @endisset
                @isset($book->author)
                <tr>
                    <td>Author:</td>
                    <td>{{ $book->author }}</td>
                </tr>
                @endisset
                @isset($book->description)
                <tr>
                    <td>Description:</td>
                    <td>{{ Str::limit($book->description, 40) }}</td>
                </tr>
                @endisset
                @isset($book->rating)
                <tr>
                    <td>Rating:</td>
                    <td>{{ $book->rating }}</td>
                </tr>
                @endisset
                @isset($book->categories)
                <tr>
                    <td>Categories:</td>
                    <td>
                        @foreach ($book->categories as $category)
                        {{ $category->title }}
                        @endforeach
                    </td>
                </tr>
                @endisset
            </tbody>
        </table>
        @admin
        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm mb-3">edit</a>
        <form method="post" action = "{{ route('books.destroy', $book) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">delete</button>
        </form>
        @endadmin
    </div>
  </main>
@endsection
