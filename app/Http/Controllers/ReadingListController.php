<?php

namespace App\Http\Controllers;

use App\Models\ReadingLists;
use Illuminate\Http\Request;

class ReadingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ReadingLists::get());
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
            'id_book' => 'required', 
            'book_read_number' => 'nullable', 
            'like' => 'nullable|numeric|max:5', 
            'user_id' => 'nullable|exists:users,id', 
        ]);

        $reading_list = ReadingLists::create($data);

        return response()->json($reading_list);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ReadingLists::findOrFail($id));
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
        $reading_list = ReadingLists::findOrFail($id);

        $data = $request->validate([
            'id_book' => 'nullable', 
            'book_read_number' => 'nullable', 
            'like' => 'nullable|numeric|max:5', 
            'user_id' => 'nullable|exists:users,id', 
        ]);

        $reading_list->update($data);
        return response()->json($reading_list);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReadingLists::destroy($id);
    }
}
