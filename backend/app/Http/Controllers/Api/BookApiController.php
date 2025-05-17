<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class BookApiController extends Controller
{
    protected $books;

    public function __construct(Book $books)
    {
        $this->books = $books;
    }

    // Get all books
    public function getBooks()
    {
        $books = Book::all(); // You can change to paginate(10) if needed
        // return BookResource::collection(resource: $books);
        return response()->json(['books' => $books], 200);
    }

    // Get a single book by ID
    public function show($id)
    {
        $book = Book::with('category')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return new BookResource($book);
    }

    // Create a new book
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create book
        $book = new Book();
        $book->title = $request->title;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->category_id = $request->category_id;

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('public/cover_images'); // រក្សាទុកក្នុង storage/app/public/cover_images
            $imageUrl = Storage::url($path); // បង្កើត URL ដែលអាចចូលមើលបាន
            $book->cover_image_url = $imageUrl; // រក្សាទុក URL ក្នុង Database
        }

        $book->save();

        // Return book resource
        return new BookResource($book);
    }

    // Update a book by ID
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update fields
        $book->title = $request->input('title', $book->title);
        $book->price = $request->input('price', $book->price);
        $book->stock = $request->input('stock', $book->stock);
        $book->category_id = $request->input('category_id', $book->category_id);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $path = $request->file('cover_image')->store('cover_images', 'public');
            $book->cover_image = $path;
        }

        $book->save();

        // Return updated book resource
        return new BookResource($book);
    }

    // Delete a book by ID
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete cover image if it exists
        if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
            Storage::disk('public')->delete($book->cover_image);
        }

        // Delete book record
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 204);
    }
}
