@extends("layouts.main")
@section("template")
    <div class="container">
        <div class="row pt-5">
        @foreach($posts as $post)
           <div class="col-sm-col-md-6 col-lg-4 pb-5">
               <div class="card">
                   <img class="card-img-top" src="/media/storage/{{$post->path}}"
                   alt="{{$post->title}}">
                   <div class="card-body">
                       <a class="card-title" href="{{route('blog.show', ['post_id'=>$post->id]) }}"> {{$post->title}} </a>
                       <p class="card-text text-truncate"> {{$post->description}} </p>
                    </div>
               </div>
           </div> 
        @endforeach
        </div>
    </div>
@stop