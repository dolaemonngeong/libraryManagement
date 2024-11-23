<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view( 'book.index',[
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create',[
            'categories' => Category::all(),
            'members' => Member::whereDoesntHave('books')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title' => 'required|string',
            'year_release' => 'required|string',
            'author' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'member_id*' => 'required'
        ]);

        $book = Book::create([
            'title' => $request->title  ,
            'year_release' => $request->year_release,
            'author' => $request->author,
            'member_id' => $request->member_id
        ]);

        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
            // return $request->all();
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view("book.update", [
            "book"=>Book::findOrFail($id),
            'categories' => Category::all(),
            'members' => Member::whereDoesntHave('books')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'year_release' => 'required|string|min:4|max:4',
            'author' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'member_id' => 'required'
        ]);


        $book = Book::findOrFail($id);

        $selectedMember = Member::findOrFail($request->member_id);

        if ($selectedMember->book && $selectedMember->book->id !== $book->id) {
            // If the selected member already has another book
            return back()->withErrors(['member_id' => 'This member is already borrowing another book.']);
        }
    

        $book->update([
            'title' => $request->title,
            'year_release' => $request->year_release,
            'author' => $request->author,
            'member_id' => $request->member_id
        
        ]);
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Deleted successfully!');

    }
}