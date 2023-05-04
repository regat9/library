@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Categories</h1>
    </div>
    @admin
    <a href="{{ route('categories.create') }}" class="btn btn-primary" type="submit">+ Add category</a>
    @endadmin
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
          <tr>
            <td>
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->title }}
                </a>
            </td>
            <td>@isset($category->slug) {{ $category->slug }}@endisset</td>
            <td>
                @admin
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">edit</a>
                @endadmin
            </td>
            <td>
                @admin
                <form method="post" action = "{{ route('categories.destroy', $category) }}">
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
  {{ $categories->links() }}
@endsection
