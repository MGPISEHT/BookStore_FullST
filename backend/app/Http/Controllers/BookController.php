<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    protected $books;
    public function __construct(Book $books)
    {
        $this->books = $books;
    }
    public function indexBook()
    {
        $books = Book::all(); // or paginate(10)
        $categories = Category::all();
        return view('components.manageBooks', compact('books', 'categories'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }

            $path = $request->file('cover_image')->store('cover_images', 'public');
            $book->cover_image = $path;
        }

        $book->save();

        return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',  // Ensure category exists
        ]);

        // Create new book instance and save to database
        $book = new Book();
        $book->title = $validated['title'];
        $book->price = $validated['price'];
        $book->stock = $validated['stock'];
        $book->category_id = $validated['category_id'];

        // Handle cover image upload if exists
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $path = $coverImage->store('cover_images', 'public');
            $book->cover_image = $path;
        }

        // Save the book (created_at and updated_at are handled by Laravel automatically)
        $book->save();

        return redirect()->route('book.index')->with('success', 'Book added successfully!');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $image;
        }

        $book->updated_at = now(); // Optional, Laravel does this automatically on save
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }
}
