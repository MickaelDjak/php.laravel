<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => BlogPost::withCount('comments')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $request->session()->reflash();

        return view('posts.show', [
            'post' => BlogPost::with('comments')->findOrFail($id),
        ]);
    }

    /**
     * Undocumented function
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('posts.edit', [
            'post' => BlogPost::findOrFail($id),
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Request
     * @return Response
     */
    public function update(StorePost $request, $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $validatedData = $request->validated();
        $blogPost->fill($validatedData);

        $blogPost->save();
        $request->session()->flash('status', 'Blog post was updated!!!');

        return redirect()->route('posts.show', ['post' => $blogPost->id]);
    }

    /**
     * Undocumented function
     *
     * @param Request
     * @return Response
     */
    public function store(StorePost $request)
    {
        $validatedData = $request->validated();
        $blogPost = BlogPost::create($validatedData);

        $request->session()->flash('status', 'Blog post was created!!!');

        return redirect()->route('posts.store', ['post' => $blogPost->id]);
    }

    /**
     * Undocumented function
     *
     * @param Request
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        $blogPost->delete();

        $request->session()->flash('status', 'Blog post was deleted!!!');

        return redirect()->route('posts.index');
    }
}
