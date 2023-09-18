<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $term = request()->input('term');
        $skip = request()->input('skip', 0);
        $take = request()->input('take', Movie::get()->count());

        if ($term) {
            return Movie::search($term, $skip, $take);
        } else {
            return Movie::skip($skip)
                ->take($take)
                ->get();
        }
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();
        $new = Movie::create($data);

        return $new;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Movie::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $data = $request->validated();
        $selectedMovie = Movie::find($id);
        $selectedMovie->update($data);
        return Movie::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return true;
    }
}
