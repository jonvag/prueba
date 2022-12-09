<x-app-layout>
    <div class="container py-8 px-6 gap-6">
        <h1 class="text-4xl font-bold text-gray-500">{{$post->name}}</h1>

        <div class="container px-3 text-lg text-gray-500 mb-2 ">

            {{$post->extract}}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="md:col-span-2">
                <figure class="pr-20">
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
        
                     @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg" alt="">
        
                    @endif
                </figure>
                <div class="container text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>

            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-500 mb-4">Mas en {{$post->category->name}}{{-- este category es la relacion de los modelos post y category --}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
        
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg" alt="">
                    
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>

</x-app-layout>