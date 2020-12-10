<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Like;
class LikeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Like::all()->reverse();
        return view('welcome', compact( 'paths'));
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
        $input = $request->all();
    }              
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        $autor=$like->user->name;
     return view('includes.Like.view',compact('Like','autor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
        return view('includes.Like.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
        $imagen=($request->imagen_id);
        $usuario=($request->usuario_id);
        $likes=Like::where('imagen_id',$imagen)->where('usuario_id',$usuario)->get();

        if(count($likes)>0){
            foreach($likes as $like){
                $like->delete();
                return redirect()->route('home')->with('error','Eliminado Like');
            }
        }else{
            $input = $request->all();
            Like::create($input);
            return redirect()->route('home')->with('success','Liked!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
     //

    }
}
