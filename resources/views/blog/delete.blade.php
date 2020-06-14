@extends("layouts.main")
@section("template")
    <div class="container">
        <form method="POST" action="{{ route('blog.api.delete', ['post_id' => $post->id]) }}">
            <input type="hidden" name="_method" value="DELETE">
            <!-- Скрытый метод для удаления -->
            <h1>Would you like to delete post {{ $post->title }}?</h1> 
            <!-- Заголовок, спрашивающий, точно ли мы хотим удалить пост? -->
            <a href="/" class="btn btn-primary">Cancel</a>
            <!-- Кнопка закрытия окна, то есть удаление не совершится -->
            <button type="submit" class="btn btn-danger">Delete</button>
            <!-- Кнопка удаления поста -->
        </form>
    </div>
@stop
