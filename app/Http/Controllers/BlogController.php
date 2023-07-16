<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::latest()->paginate(20);
        return view('admin.blogs', [ 'blogs' => $blog ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $blog = Blog::latest()->paginate(12);
        return view('admin.addBlog' 
        // [ 'blogs' => $blog ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'img' => 'required'
        ]);

        $blog = new Blog;
        
        $blog->title = $req->title;
        $blog->description = $req->description;
        $blog->admin_id = 1;

        // Create the images
        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $image) {
                $destinationPath = 'blogs';
                $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());              
                $image_resize->fit(420, 220);
                
                // $image_resize->save(public_path('uploads/' . $filename));
                $image_resize->save('blogs/' . $filename);

                $blog->blog_img = $destinationPath."/".$filename;
            }
        }

        $blog->save();

        return redirect('/admin/blogs')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Blog has been created.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('static.viewLearnig', [ 'blog' => $blog ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('admin.addBlog', [ 'edit' => true, 'blog' => $blog ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->title = $req->title;
        $blog->description = $req->description;
        $blog->admin_id = 1;

        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $image) {
                $destinationPath = 'blogs';
                $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());              
                $image_resize->fit(420, 220);
                
                // $image_resize->save(public_path('uploads/' . $filename));
                $image_resize->save('blogs/' . $filename);

                $blog->blog_img = $destinationPath."/".$filename;
            }
        }

        $blog->save();

        return redirect('/admin/blogs')->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Blog has been updated.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        
        return redirect()->back()->with('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="lni-checkmark"></i> Success!</strong> Blog has been deleted.<button type="button" class="close" data-dismiss="alert" aria-lSource Sans Pro="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
}
