<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use tidy;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();

        return response()->json($videos);
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
        $video = new Video();
        $validator = Validator::make($request->all(), $video->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }
        
        Video::create($request->all());

        return $this->message('success', 'New video has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Video::find($id)->with('contents')->get();
        return response()->json($data);
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
        $video = Video::find($id); 

        // $validator = Validator::make($request->all(), $video->rules);
        // if ($validator->fails())
        // {
        //     return $this->message('error', 'Please fill all required fields.');
        // }
        $video->unit_id = $request->unit_id;
        $video->video_title = $request->video_title;
        $video->save();

        return $this->message('success', 'Video has been updated.');;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);

        return $this->message('success', 'Video has been deleted.');
    }

    private function message($type, $data)
    {
        return response()->json([$type => $data]);
    }
}
