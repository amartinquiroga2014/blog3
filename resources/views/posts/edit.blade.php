<x-app-layout :title="$post->title">

    <x-slot name="header">Editar Post</x-slot>

    <div class="w-1/2 mx-auto mt-5">
        <form class="form-post" action="/posts/{{ $post->id }}" method="POST">
            <h2 class="font-bold text-xl">Editar Post</h2>
            
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label>Resumen</label>
                <textarea name="excerpt" id="" cols="30" rows="10">{{ $post->excerpt }}</textarea>
            </div>
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="content" id="" cols="30" rows="10">{{ $post->content }}</textarea>
            </div>
            <div class="flex gap-x-1 mt-2">
                <button type="submit" class="btn-primary">Actualizar</button>
                <a href="/posts/{{ $post->id }}" class="btn">Cancelar</a>              
            </div>          
        </form>
    </div>
</x-app-layout>