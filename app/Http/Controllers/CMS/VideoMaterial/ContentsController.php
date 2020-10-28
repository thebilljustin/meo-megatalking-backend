<?php

namespace App\Http\Controllers\CMS\VideoMaterial;


use App\Http\Controllers\Controller;
use App\VideoMaterial\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $content = new Content();
        $validator = Validator::make($request->all(), $content->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }
        Content::create($request->all());

        return $this->message('success', 'Added new content.'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id)->with('tips')->get();

        return response()->json($content);
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
        $content = Content::find($id);
        $validator = Validator::make($request->all(), $content->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }
        
        $content->start_time = $request->start_time;
        $content->end_time = $request->end_time;
        $content->sentence = $request->sentence;
        $content->translation = $request->translation;
        $content->save();
        
        return $this->message('success', 'Content has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);

        return $this->message('success', 'Content has been deleted.');
    }

    private function message($type, $data)
    {
        return response()->json([$type => $data]);
    }
}
