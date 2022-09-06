<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Favorites::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'id_book' => 'required',
            'page_number' => 'nullable',
            'gender' => 'required', 
            'img_book' => 'required', 
            'user_id' => 'nullable|exists:users,id'
        ]);

        $favorite = Favorites::create($data);

        return response()->json($favorite);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Favorites::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $favorite = Favorites::findOrFail($id);

        $data = $request->validate([
            'title' => 'nullable',
            'id_book' => 'nullable',
            'page_number' => 'nullable',
            'gender' => 'nullable'
        ]);

        $favorite->update($data);
        return response()->json($favorite);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favorites::destroy($id);
    }
}
