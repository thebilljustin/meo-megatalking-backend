<?php

namespace App\Http\Controllers\CMS\Textbook;

use App\Http\Controllers\Controller;
use App\Textbook\Textbook;
use App\Textbook\TextbookUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitsController extends Controller
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
        
        $unit = new TextbookUnit();
        $validator = Validator::make($request->all(), $unit->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }

        $request->elements = '{ id: 1 }';

        TextbookUnit::create($request->all());
        return $this->message('success', 'Added new unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = TextbookUnit::where('textbook_id', $id)->first();
        // $unit->elements = json_encode($unit->elements);
        return response()->json($unit);
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
        $unit = TextbookUnit::find($id);
        $unit->elements = $request->elements;
        if ($unit->save())
        {
            return $this->message('success', 'Updated elements.');
        }
        else {
            return $this->message('error', 'Failed to update.');
        }
        
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
