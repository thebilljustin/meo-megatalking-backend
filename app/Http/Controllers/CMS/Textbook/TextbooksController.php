<?php

namespace App\Http\Controllers\CMS\Textbook;

use App\Http\Controllers\Controller;
use App\Textbook\Textbook;
use App\Textbook\TextbookUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TextbooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $book = new Textbook();
        $validator = Validator::make($request->all(), $book->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }

        $imagename = time() .'.' . $request->image->extension();
        $request->image->move(public_path('storage/images/textbooks'), $imagename);

        
        // $path = $request->image->store('images');
       
        // // $pathToFile = $request->file('image')->store('images', 'public');

        $book->series_id = $request->series_id;
        $book->title = $request->title;
        $book->image = $imagename;
        $book->save();
        return $this->message('success', 'Added new textbook.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function message($type, $data)
    {
        return response()->json([$type => $data]);
    }
}
