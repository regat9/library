@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $category->title }}</h1>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
            <tbody>
                @isset($category->slug)
                <tr>
                    <td>Slug:</td>
                    <td>{{ $category->slug }}</td>
                </tr>
                @endisset
                @isset($books)
                <tr>
                    <td>Books:</td>
                    <td>
                        @foreach ($books as $book)
                        {{ $book->title }}<br>
                        @endforeach
                    </td>
                </tr>
                @endisset
            </tbody>
        </table>
        @admin
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm mb-3">edit</a>
        <form method="post" action = "{{ route('categories.destroy', $category) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">delete</button>
        </form>
        @endadmin
    </div>
  </main>
@endsection
