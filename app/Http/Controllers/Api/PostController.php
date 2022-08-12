<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts"
            ],
            "data" => $posts
        ], 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if($post) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data Post"
                ],
                "data" => $post
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Post Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }

    public function PostHomePage(){
        $posts = Post::latest()->take(6)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Posts Homepage"
            ],
            "data" => $posts
        ], 200);
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
