<?php
namespace App\Http\Controllers\Blog;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController {
    protected $blog;
    public function __construct(){
        $this->blog = new Blog;
    }
    
    public function index() {
        $posts = $this->blog->withMedia()->get();
        return view('blog.index', ['posts'=>$posts]);
    }

    public function create() {
        return view('blog.create');
    }
   
    public function show($id) {
        $post = $this->blog->withMedia()->find($id);
        return view('blog.show', ['post'=>$post]);
    }

    public function edit($id) {
        $post = $this->blog->withMedia()->find($id);
        return view('blog.edit', ['post'=>$post]);
    }

    public function delete($id) {
        $post = $this->blog->find($id);
        return view('blog.delete', ['post' => $post]);
    }
}
