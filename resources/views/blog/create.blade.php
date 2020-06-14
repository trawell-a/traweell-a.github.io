@extends("layouts.main")
@section("template")
    <div class="container">
        <form method="POST" action="{{ route('blog.api.create') }}" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="title"> Title </label>
                <input type="text" class="form-control" id="title" 
                name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="content"> Content </label>
                <textarea class="form-control" id="content" name="content"
                placeholder="Enter content"></textarea>
            </div>

            <div class="form-group">
                <label for="content"> Picture </label>
                <input type="file" multiple="multiple" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary"> Send </button>
        </form>
    </div>
@stop