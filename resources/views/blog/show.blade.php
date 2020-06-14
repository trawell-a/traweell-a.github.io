@extends("layouts.main")
@section("template")
    <div class="container">
        <div class="content text-center">
            <h1 class="duh"> {{$post->title}} </h1>
            <img class="mw-100" src="/media/storage/{{$post->path}}" alt="{{$post->title}}">
            <!-- mw это max width - максимальная ширина, 100% в нашем случае -->
            <div> {{$post->created_at}} </div>
            <p></p>
            <div class="fon">
                <p class="text-left"> {{$post->content}} </p>
            </div>
        </div>
    </div>
@stop






