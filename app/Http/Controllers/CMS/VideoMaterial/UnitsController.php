<?php

namespace App\Http\Controllers\CMS\VideoMaterial;

use App\Http\Controllers\Controller;
use App\VideoMaterial\Video;
use App\VideoMaterial\VideomaterialUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UnitsController extends Controller
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
        $unit = new VideomaterialUnit();
        $validator = FacadesValidator::make($request->all(), $unit->rules);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }

        VideomaterialUnit::create($request->all());

        return $this->message('success', 'Added new unit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $unit = VideomaterialUnit::find($id);
        $validator = FacadesValidator::make($request->all(), $unit->title_rule);
        if ($validator->fails())
        {
            return $this->message('error', 'Please fill all required fields.');
        }

        $unit->title = $request->title;
        $unit->save();

        return $this->message('success', 'Unit has been updated.');;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideomaterialUnit::destroy($id);

        return $this->message('success', 'Unit has been deleted.');
    }

    private function message($type, $data)
    {
        return response()->json([$type => $data]);
    }
}
