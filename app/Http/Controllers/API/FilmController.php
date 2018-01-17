<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get all items.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $films = Film::latest()->get();

        return response()->json($films, 200);
    }

    /**
     * Create item.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $film_data = $request->only(['name', 'description']);

        try {
            Film::create($film_data);
        } catch (Exception $exception) {
            return response()->json([
                'created' => false,
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }

        return response()->json(['created' => true], 200);
    }

    /**
     * Get item by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function read($id)
    {
        $film = Film::findOrFail($id);

        return response()->json($film, 200);
    }

    /**
     * Update item by id.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $film_data = $request->only(['name', 'description']);

        Film::findOrFail($id)->update($film_data);

        return response()->json(['updated' => true], 200);
    }

    /**
     * Delete item by id.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return response()->json(['deleted' => true], 200);
    }
}
