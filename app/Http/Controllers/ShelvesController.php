<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelveValidator;
use App\Shelve;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{
    /**
     * Get all resources
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() {

        return response()->json([
            'data'=>Shelve::all()
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
            'data'=>Shelve::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function newShelveUpdateShelve(ShelveValidator $request, $id = null) {

    try {
        $shelve = Shelve::findOrNew($id);

        $shelve->shelveName = $request->input('shelveName');
        $shelve->save();

        return response()->json([
            'data'=>$shelve
        ]);
    }
    catch (ValidationException $e)
    {
        return response()->json($e->getErrors(),200);
    }


    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteShelve(Request $request, $id) {

        $shelve = Shelve::findOrFail($id);

        $shelve->delete();

        return response()->json([
            'data'=>[]
        ]);
    }
}
