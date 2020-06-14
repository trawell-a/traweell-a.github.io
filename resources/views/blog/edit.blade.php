@extends("layouts.main")
@section("template")
    <div class="container">
        <form method="POST" 
        action="{{ route('blog.api.update', ['post_id'=>$post->id]) }}" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="title"> Title </label>
                <input type="text" class="form-control" id='title'
                name='title' value="{{ $post->title }}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="content"> Content </label>
                <input type="text" class="form-control" id='content'
                name='content' value="{{ $post->content}}" placeholder="Enter content">
            </div>

            <div class="form-group">
                <img src="/media/storage/{{$post->path}}" alt="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content"> Picture </label>
                <input type="file" multiple="multiple" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@stop