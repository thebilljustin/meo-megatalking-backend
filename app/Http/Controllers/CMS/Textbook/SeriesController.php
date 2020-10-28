<?php

namespace App\Http\Controllers\CMS\Textbook;

use App\Http\Controllers\Controller;
use App\Textbook\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::where('currics_id', $_GET['curriculum_id'])
                    ->with('textbooks')->get();

        return response()->json($series);

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
        $series = new Series();
        $validator = Validator::make($request->all(), $series->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }


        Series::create($request->all());
        return $this->message('success', 'Added new series.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Series::with('textbooks')->where('currics_id', $id)->get();

        return response()->json($series);
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
