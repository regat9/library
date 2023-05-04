<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('book.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();

        $relations = ['categories'];

        foreach ($relations as $relation) {
            if (isset($data[$relation])) {
                $$relation = $data[$relation];
            }

            unset($data[$relation]);
        }

        $book = Book::firstOrCreate($data);

        $book->update($data);

        if ($request->hasFile('cover')) {
            $destinationPath = 'public/covers';
            $file = $request->file('cover');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($destinationPath, $fileName);
            $input['cover'] = $fileName;
        }

        $book->update($input);

        foreach ($relations as $relation) {
            if  (!empty($$relation)) {
                foreach ($$relation as $item) {
                    $book->$relation()->attach($item);
                }
            }
        }

        return to_route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('book.form', compact(
            'book',
            'categories',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();

        $relations = ['categories'];

        foreach ($relations as $relation) {
            if (isset($data[$relation])) {
                $$relation = $data[$relation];
                $book->$relation()->sync($$relation);
            } else {
                $book->$relation()->detach();
            }

            unset($data[$relation]);
        }

        $book->update($data);

        return to_route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return to_route('books.index');
    }
}
