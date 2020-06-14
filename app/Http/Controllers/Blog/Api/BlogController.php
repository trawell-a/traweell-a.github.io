<?php
namespace App\Http\Controllers\Blog\Api;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Media\MediaController;
use App\Models\Media;

class BlogController extends BaseController {
    protected $blog;
    public function __construct(){
        $this->blog = new Blog;
    }
    
    public function index() {
        $posts = $this->blog->all();
        return response()->json($posts);
    }

    protected function fileHandling(Request $request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $media = app(MediaController::class)->createFile($file);
            $data['media_id'] = $media->id;
        }
        return $data;
    }

    public function create(Request $request) {
        $data = $this->fileHandling($request);
        $this->blog->fill($data);
        $this->blog->save();
        // return response()->json($blog);
        return redirect()->route('blog.index');
    }

    public function show($id) {
        $post = $this->blog->find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id) {
        $data = $this ->fileHandling($request);
        $post = $this->blog->find($id);
        $post ->fill($data);
        $post ->save();
        // return response()->json($blog);
        return redirect()->route('blog.index');
    }

    public function delete($id) {
        $post = $this->blog->destroy($id);
        // return response()->json($blog);
        return redirect()->route('blog.index'); 
    }
}
