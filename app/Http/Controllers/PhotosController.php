<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
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
    public function create($albumId)
    {
        //
        return view('photos.create')->with('albumId',$albumId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'photo'=>'image|max:1999',
            'album_id'=>'required'
        ]);
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $ext;

        //upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenameToStore);

        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->photo = $filenameToStore;
        $photo->description = $request->input('description');
        $photo->album_id = $request->input('album_id');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->save();
        return redirect('/albums/'.$photo->album_id)->with('success','Photo uploaded successfully');
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
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
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
        $photo = Photo::find($id);
        if(Storage::delete('/public/photos/' . $photo->album_id . '/' . $photo->photo)) {
            $photo->delete();
            return redirect('/')->with('success','Photo deleted successfully');
        }else {
            return redirect('/')->with('error','Couldn\'t delete photo');
        }
    }
}
