<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use PhpParser\Node\Stmt\Return_;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param
     * @return
     */

    public function index(Request $request): JsonResponse
    {
        $query = Anime::query();

        if ($request->has('titulo')){
            $query->where('titulo_br', 'like', '%' . $request->titulo  . '%');
        }

        if ($request->has('ano')){
            $query->where('ano_lancamento', $request->ano);
        }

        if ($request->has('estudio')){
            $query->where('estudio', 'like', '%' . $request->estudio  . '%');
        }

        if ($request->has('genero')){
            $query->where('genero', 'like', '%' . $request->genero  . '%');
        }

        $animes = $query->paginate(10);

        return response()->json($animes);
    }

    /**
     * Display the specified resource.
     * @param
     * @return
     */

    public function show(int $id): JsonResponse
    {
        $anime = Anime::findOrFail($id);
        return response()->json($anime);
    }
}
