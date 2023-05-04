@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ isset($category) ? 'Edit category': '+ Add category'}}</h1>
    </div>

    <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="post">
        @csrf
        @isset($category)
            @method('put')
        @endisset
        <div class="form-group col-5 mb-3">
            <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{ old('title', isset($category) ? $category->title : null) }}">
        </div>
        <div class="form-group col-5 mb-3">
            <input type="text" class="form-control form-control-lg" name="slug" placeholder="Slug" value="{{ old('slug', isset($category) ? $category->slug : null) }}">
        </div>

        <div class="form-group mt-5 mb-5">
            <input type="submit" class="btn btn-primary btn-lg" value="Save">
            <a href="{{ route('categories.index') }}" id="cancel" name="cancel" class="btn btn-default">Cancel</button>
        </div>
    </form>
</main>
@endsection
