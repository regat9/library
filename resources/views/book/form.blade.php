@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ isset($book) ? 'Edit book': '+ Add book'}}</h1>
    </div>

    <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($book)
            @method('put')
        @endisset
        <div class="form-group mb-3">
            <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{ old('title', isset($book) ? $book->title : null) }}">
        </div>
        <div class="row d-flex">
            <div class="form-group col-5 mb-3">
                <input type="text" class="form-control form-control-lg" name="slug" placeholder="Slug" @isset($book) value="{{ $book->slug }}@endisset">
            </div>
            <div class="form-group col-5 mb-3">
                <input type="text" class="form-control form-control-lg" name="author" placeholder="Author" @isset($book) value="{{ $book->author }}@endisset">
            </div>
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control form-control-lg" name="description" placeholder="Description">@isset($book){{ $book->description }}@endisset</textarea>
        </div>

        <div class="row d-flex">
            <div class="form-group col-5 mb-3">
                <input type="text" class="form-control form-control-lg" name="rating" placeholder="Rating" @isset($book) value="{{ $book->rating }}@endisset">
            </div>
            <div class="form-group col-4 mb-3">
                <select multiple class="form-control form-control-lg" id="categories" name="categories[]">
                    @isset($book)
                        @php $bcategories = $book->categories; @endphp
                    @endisset
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @isset($book)
                            @if ($bcategories->contains($category)) selected @endif
                        @endisset
                        >{{ $category->title }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="uploadcover">Upload cover</label>
            <input type="file" class="form-control" name="cover" id="uploadcover" onchange="preview()" >
        </div>

        <div class="d-flex">
            @isset($book)
            <img src="{{ asset('/storage/covers/' . $book->cover) }}" width="100">
            @endisset
        </div>
        <div class="form-group mt-5 mb-5">
            <input type="submit" class="btn btn-primary btn-lg" value="Save">
            <a href="{{ route('books.index') }}" id="cancel" name="cancel" class="btn btn-default">Cancel</button>
        </div>
    </form>
</main>
@endsection
