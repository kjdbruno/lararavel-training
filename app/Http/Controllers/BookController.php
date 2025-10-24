<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        try {
            $books = DB::table('books')->get();
            return view('books.index', compact('books'));
        } catch (\Exception $e) {
            logger('Message logged from BookController.index', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);
        }

        // eloquent
        // try {
        //     $books= Book::all();
        //     return view('book.index', compact('books'));
        // } catch (\Exception $e) {
        //     logger('Message logged from BookController.index', [$e->getMessage()]);
        //     return response()->json([
        //         'error' => 'Something went wrong getting record',
        //         'msg' => $e->getMessage()
        //     ], 400);

        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //query builder
        try {
            $book = DB::table('books')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'stocks' => $request->stocks,
                'amount' => $request->amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('books.index')->with('success', 'Record saved successfully!');
        } catch (\Exception $e) {
            logger('Message logged from StudentController.store', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);

        }

        // eloquent
        // try {
        //     $book = new Book;
        //     $book->title = $request->get('title');
        //     $book->description = $request->get('description');
        //     $book->stocks = $request->get('stocks');
        //     $book->amount = $request->get('amount');
        //     $book->save();
        //     return response()->json([
        //         'msg' => 'RECORD STORED!',
        //         'data' => $book
        //     ], 200);
        // } catch (\Exception $e) {
        //     logger('Message logged from StudentController.store', [$e->getMessage()]);
        //     return response()->json([
        //         'error' => 'Something went wrong getting record',
        //         'msg' => $e->getMessage()
        //     ], 400);

        // }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // remove id if eloquent
    {
        //query builder
        try {
            $book = DB::table('books')->where('id', $id)->first();
            if (!$book) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            return view('books.edit', compact('book'));
        } catch (\Exception $e) {
            logger('Message logged from StudentController.show', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);
        }

        // eloquent
        // try {
        //     return response()->json([
        //         'msg' => 'Record found!',
        //         'data' => $book
        //     ], 200);
        // } catch (\Exception $e) {
        //     logger('Error fetching book:', [$e->getMessage()]);
        //     return response()->json([
        //         'error' => 'Something went wrong while fetching record',
        //         'msg' => $e->getMessage()
        //     ], 400);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // query builder
        try {
            DB::table('books')
                ->where('id', $id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'stocks' => $request->stocks,
                    'amount' => $request->amount,
                    'updated_at' => now(),
                ]);

            return redirect()->route('books.index')->with('success', 'Record updated successfully!');

        } catch (\Exception $e) {
            logger('Error updating book (Query Builder):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to update record',
                'msg' => $e->getMessage()
            ], 400);
        }

        // eloquent
        // try {
        //     $book->update([
        //         'title' => $request->title,
        //         'description' => $request->description,
        //         'stocks' => $request->stocks,
        //         'amount' => $request->amount,
        //     ]);

        //     return response()->json([
        //         'msg' => 'Record updated successfully!',
        //         'data' => $book
        //     ], 200);

        // } catch (\Exception $e) {
        //     logger('Error updating book (Eloquent):', [$e->getMessage()]);
        //     return response()->json([
        //         'error' => 'Failed to update record',
        //         'msg' => $e->getMessage()
        //     ], 400);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // eloquent
        // try {
        //     $book->delete();

        //     return response()->json([
        //         'msg' => 'Record deleted successfully!',
        //     ], 200);

        // } catch (\Exception $e) {
        //     logger('Error deleting book (Eloquent):', [$e->getMessage()]);
        //     return response()->json([
        //         'error' => 'Failed to delete record',
        //         'msg' => $e->getMessage(),
        //     ], 400);
        // }

        // query builder
        try {
            DB::table('books')->where('id', $id)->delete();

            return redirect()->back()->with('success', 'Record deleted successfully!');

        } catch (\Exception $e) {
            logger('Error deleting book (Query Builder):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to delete record',
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
