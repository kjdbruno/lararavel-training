<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories= BookCategory::all();
            return view('category.index', compact('categories'));
        } catch (\Exception $e) {
            logger('Message logged from BookCategoryController.index', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $path = null;
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'photo' => 'required|image|max:20248',
        // ]);
        // if ($request->hasFile('photo')) {
        //     $path = $request->file('photo')->store('public');
        // }
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image', 'max:2048']
        ]);
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        try {
            BookCategory::create($validated);
            // $category = new BookCategory;
            // $category->name = $request->get('name');
            // $category->save();
            return redirect()->route('category.index')->with('success', 'Record saved successfully!');
        } catch (\Exception $e) {
            logger('Message logged from StudentController.store', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $bookCategory)
    {
         try {
            return view('category.edit', compact('bookCategory'));
        } catch (\Exception $e) {
            logger('Error fetching book:', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong while fetching record',
                'msg' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCategory $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image', 'max:2048']
        ]);
        if ($request->hasFile('photo')) {
            if ($category->photo && Storage::disk('public')->exists($category->photo)) {
                Storage::disk('public')->delete($category->photo);
            }

            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        try {
            $category->update($validated);
            return redirect()->route('category.index')->with('success', 'Record updated successfully!');
        } catch (\Exception $e) {
            logger('Error updating book (Eloquent):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to update record',
                'msg' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $category)
    {
        try {
            if ($category->photo && Storage::disk('public')->exists($category->photo)) {
                Storage::disk('public')->delete($category->photo);
            }
            $category->delete();
            return redirect()->back()->with('success', 'Record deleted successfully!');

        } catch (\Exception $e) {
            logger('Error deleting book (Eloquent):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to delete record',
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
