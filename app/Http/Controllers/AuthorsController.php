<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorPostValidation;
use App\Http\Requests\AuthorValidator;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Get all resources
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() {

        return response()->json([
            'data'=>Author::all()
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
            'data'=>Author::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function newAuthorUpdateAuthor(AuthorValidator $request, $id = null) {

        try {
            $author = Author::findOrNew($id);

            $author->authorName = $request->input('authorName');
            $author->authorSurname = $request->input('authorSurname');
            $author->save();

            return response()->json([
                'data' => $author
            ]);
        } catch (ValidationException $e) {
            return response()->json($e->getErrors(),200);
        }
    }

    /**
     * Delete resource by id
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAuthor(Request $request, $id) {

        $author = Author::findOrFail($id);

        $author->delete();

        return response()->json([
            'data'=>[]
        ]);
    }
}
