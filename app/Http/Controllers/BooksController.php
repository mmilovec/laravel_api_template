<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BooksController extends Controller
{
    /**
     * Get all resources
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() {

        return response()->json([
            'data'=>Book::all()
        ]);
    }

    /**
     * Get resource by ID
     *
     * @param $id
     * @return mixed
     */
    public function getByID($id) {

        return response()->json([
            'data'=>Book::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function newBookUpdateBook(BookValidator $request, $id = null) {

        try {
            $book = Book::findOrNew($id);

            $book->bookTitle = $request->input('bookTitle');
            $book->ISBN = $request->input('ISBN');
            $book->publisher = $request->input('publisher');
            $book->numberOfPages = $request->input('numberOfPages');
            $book->authorID = $request->input('authorID');
            $book->shelveID = $request->input('shelveID');

            $book->save();

            return response()->json([
                'data' => $book
            ]);
        } catch (ValidationException $e) {
            return response()->json($e->getErrors(),200);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBook(Request $request, $id) {

        $book = Book::findOrFail($id);

        $book->delete();

        return response()->json([
            'data'=>[]
        ]);
    }
}
