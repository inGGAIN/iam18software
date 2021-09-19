<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function View(Request $request)
    {
        $data['title']          =   'Latest Post';
        $data['q']              =   $request->get('q');
        $data['id_category']    =   $request->get('id_category');
        $data['categories']     =   Category::all();
        $query                  =   Post::select('tb_post.*', 'tb_category.name_category')
                                ->  where('title','like','%'.$request->get('q').'%')
                                ->  leftJoin('tb_category','tb_category.id_category','=','tb_post.id_category');

        if($data['id_category'])
        {
            $category   =   Category::find($data['id_category']);
            If($category)
            {
                $data['title']  =   '('.$category->name_category.')';
            }
        }

        $query  =   Post::select('tb-post.*','tb_category.name_category')
                ->  where('title','like','%'.$request->get('q').'%')
                ->  leftJoin('tb_category','tb_category.id_category','=','tb_post.id_category');
        
        if($request->id_category)
            $query              ->  where('tb_post.id_category', $request->get('id_category'));
            $data['posts']      =   $query->paginate(4)->withQueryString();
        
            return view('post.view', $data);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts   =   Post::where('title', 'like', '%'.$request->get('q'). '%')
        ->leftJoin('tb_category','tb_category.id_category','=','tb_post.id_category')
        ->paginate(15)->withQueryString();
        $data   =   
        [
            'title' =>  'Post Page',
            'post'  =>  $posts,
            'q'     =>  $request->get('q'),
        ];
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      =   'Add Post';
        $data['categories'] =   Category::all();
        return view('post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'title'         =>  'required',
            'id_category'   =>  'required',
        ]);

        $post   =   new Post
        ([
            'title'         =>  $request->title,
            'id_category'   =>  $request->id_category,
            'content'       =>  $request->content,
        ]);

        if($request->hasFile('picture'))
        {
            $post       ->  delete_pict();
            $picture    =   $request->file('picture');
            $filename   =   rand(1000, 9999) . $picture->getClientOriginalName();
            $picture    ->  move('pictures/post', $filename);
            $post       ->  picture  =   $filename;   
        }
        $post->save();
        return redirect()->route('post.index')->with('msg','Data is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['title']  =   $post->title;
        $data['post']   =   Post::select('tb_post.*', 'tb_category.name_category')
                        ->  leftJoin('tb_category', 'tb_category.id_category','=','tb_post.id_category')
                        ->  where('id_post', $post->id_post)
                        ->  first();

        $data['related']=   Post::select('tb_post.*','tb_category.name_category')
                        ->  where('id_post', '<>', $data['post']->id_post)
                        ->  where('tb_post.id_category', $data['post']->id_category)
                        ->  leftJoin('tb_category','tb_category.id_category', '=', 'tb_post.id_category')
                        ->  limit(3)
                        ->  get();

        return view('post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['title']      =   'Edit Post';
        $data['post']       =   $post;
        $data['categories'] =   Category::all();
        return view('post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $upd    =   Post::findorfail($post);
        // $first  =   $upd->picture();

        // $post   =   
        // [
        //     'title' =>  $request['title'],
        //     'picture'   => $first,
        // ];
        // $request->picture->move(public_path().'/pictures/post/'.$first);
        // $first->update($post);
        // return view('post.index');
       $request->validate
            ([
                'title'         =>  'required',
                'id_category'   =>  'required',
            ]);

        $post->title        =   $request->title;
        $post->id_category  =   $request->id_category;
        $post->content      =   $request->content;

        if($request->hasFile('picture'))
        {
            // $post->delete_pict();
            // $picture    =   request()->file('picture')->store('pictures/post');

            $picture        =   $request->file('picture');
            $filename       =   rand(1000, 9999).$picture->getClientOriginalName();
            $picture        ->  move('pictures/post',$filename);
            $post->picture  =   $filename;
        }
        // else
        // {
        //     $picture    =   $post->picture;
        // }
        // $attr['picture']    =   $picture;
        // $post->update($attr);
        $post->save();

        return redirect()->route('post.index')->with('msg','Data is Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete_pict();
        $post->delete();
        return redirect()->back()->with('msg','Data is Deleted');
    }
}
