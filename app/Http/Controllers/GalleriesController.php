<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateGalleryRequest;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\User;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $galleries = Gallery::all();

        // return response()->json($galleries); 

    $results = Gallery::with('user', 'images');
    $galleries = $results->get();
    
    return response()->json($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(CreateGalleryRequest $request)
    {
        $data = $request->validated();
        $user = User::findOrFail($request['id']);
        $gallery= Gallery::create([
            "name"=>$data['name'],
            "description"=>$data['description'],
            'user_id' => $user['id'],
        ]);
        foreach($data['listOfSource'] as $source) {
            $gallery->addImage($source, $gallery['id']);
        }
        
        return response()->json($gallery);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $results = Gallery::with('user', 'images');
        // $galleries = $results->get();

        $gallery = Gallery::findOrFail($id);
        $images = $gallery->images;
        $user = $gallery->user;
        $results= [
            'id' => $gallery->id,
            'name'=>$gallery->name,
            'description'=>$gallery->description,
            'created_at'=>$gallery->created_at,
            'updated_at'=>$gallery->updated_at,
            'images'=>$images,
            'user'=>$user
        ];

        return response()->json($results);


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
}
