@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ isset($user) ? 'Edit librarian': '+ Add librarian'}}</h1>
    </div>

    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="post">
        @csrf
        @isset($user)
            @method('put')
        @endisset
        <div class="form-group col-5 mb-3">
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="{{ old('name', isset($user) ? $user->name : null) }}">
        </div>
        <div class="form-group col-5 mb-3">
            <input type="text" class="form-control form-control-lg" name="email" placeholder="Email" value="{{ old('email', isset($user) ? $user->email : null) }}">
        </div>
        <div class="form-group col-5 mb-3">
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
        </div>
        <div class="form-group mt-5 mb-5">
            <input type="submit" class="btn btn-primary btn-lg" value="Create">
            <a href="{{ route('users.index') }}" id="cancel" name="cancel" class="btn btn-default">Cancel</button>
        </div>
    </form>
</main>
@endsection
