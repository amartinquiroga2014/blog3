<div>
    
    <div class="w-1/2 mx-auto">
         <h3 class="text-xs font-bold">Posts recientes</h3>
         <ul class="text-xs text-gray-400">
             @foreach ($posts as $post)
                  <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
             @endforeach             
         </ul>
    </div>

</div>