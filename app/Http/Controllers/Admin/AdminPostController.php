<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Photo;
use App\Category;
use App\Http\Requests\AdminPostCreateRequest;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('portal.admin.posts.index', compact('posts'));
    }
    public function managePosts()
    {
        $posts = Post::all();
        return view('portal.admin.posts.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id')->all();
        return view('portal.admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostCreateRequest $request)
    {
        $user = Auth::user();

        $input = $request->all();
        if($file = $request->file('photo_id'))
        {
          $name = time() . $file->getClientOriginalName();
          $file->move('images', $name);

          $photo = Photo::create(['file'=> $name]);

          $input['photo_id'] = $photo->id;
          $input['slug'] = str_slug($request->input('title')) .'-'.time();
        }
        $user->posts()->create($input);
        Session::flash('message', 'Post Created');
        return redirect('/admin/posts');
    //  return $user;
      //  return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('portal.admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('portal.admin.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostCreateRequest $request, $id)
    {
      $input = $request->all();

      if($file = $request->file('photo_id'))
      {
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);

        $photo = Photo::create(['file'=> $name]);

        $input['photo_id'] = $photo->id;
        $input['slug'] = str_slug($request->input('title')) .'-'.time();
      }
      Auth::user()->posts()->whereId($id)->first()->update($input);
      Session::flash('message', 'The Post: -- ' . ucfirst($input['title']) . ' --- has been updated :-)' );
      return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path($post->photo->file));
        $post->delete();
        Session::flash('message', 'The post has been deleted :-(');
        return redirect('/admin/posts');
    }
}
