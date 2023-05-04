@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Books</h1>
    </div>
    @admin
    <a href="{{ route('books.create') }}" class="btn btn-primary" type="submit">+ Add book</a>
    @endadmin
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Author</th>
            <th scope="col">Description</th>
            <th scope="col">Rating</th>
            <th scope="col">Cover</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
          <tr>
            <td>
                <a href="{{ route('books.show', $book) }}">
                    {{ $book->title }}
                </a>
            </td>
            <td>@isset($book->slug) {{ $book->slug }}@endisset</td>
            <td>@isset($book->author) {{ $book->author }}@endisset</td>
            <td>{{ Str::limit($book->description, 20) }}</td>
            <td>@isset($book->rating) {{ $book->rating }}@endisset</td>
            <td><img src="{{ asset('/storage/covers/' . $book->cover) }}" width="50"></td>
            <td>
                @admin
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">edit</a>
                @endadmin
            </td>
            <td>
                @admin
                <form method="post" action = "{{ route('books.destroy', $book) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                </form>
                @endadmin
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
  {{ $books->links() }}
@endsection
