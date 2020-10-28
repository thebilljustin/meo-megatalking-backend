<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiscsController extends Controller
{
    public function page_builder_image_upload(Request $request)
    {
        $imagename = time() .'.' . $request->image->extension();
        $request->image->move(public_path('storage/images/pagebuilder'), $imagename);

        return response()->json($imagename);
    }
}
