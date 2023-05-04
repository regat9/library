@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Librarians</h1>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($librarians as $librarian)
          <tr>
            <td>
                <a href="{{ route('users.show', $librarian) }}">
                    {{ $librarian->name }}
                </a>
            </td>
            <td>
                <a href="{{ route('users.show', $librarian) }}">
                    {{ $librarian->email }}
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection
