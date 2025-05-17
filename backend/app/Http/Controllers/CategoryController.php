<?php

namespace App\Http\Controllers; // ផ្លាស់ប្តូរ namespace ត្រង់នេះ
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ // Add Category (Store)
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('components.manageCategory');
        $categories = Category::all(); // ទាញយក categories ទាំងអស់
        // ឬប្រើ pagination: $categories = Category::paginate(10);
        return view('components.manageCategory', ['categories' => $categories]); // បញ្ជូន $categories ទៅ view
    }
    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'description' => 'nullable|string',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category added successfully!',
        ]);
    }

    // Edit Category (Fetch Data for Edit)
    public function editCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'category' => $category,
        ]);
    }

    // Update Category (Edit and Save Changes)
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully!',
        ]);
    }

    // Delete Category
    public function destroyCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }

        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully!',
        ]);
    }
}
