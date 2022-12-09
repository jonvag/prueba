<x-app-layout>
    <div class=" max-w-7xl mx-auto px-2 sm:px-6 lg:px-8"> 
        <div class=" py-8 bg-red-500">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"> 
                @foreach ($posts as $post)
                    <article class=" w-full h-80   @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg @endif )"> {{-- Esto es consultar la relacion entre posts e image --}}
                        
                            <div class="w-full h-full px-8 flex flex-col justify-center">
                                <div class="py-2">
                                    @foreach ($tags as $tag)
                                        <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-500 text-white rounded-full">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                                <h1 class="text-4xl text-white leading-8 font-bold mt-2">  
                                    <a href="{{route('posts.show', $post)}}">
                                        {{$post->name}} 
                                    </a>
                                </h1>
                                <h1 class="text-2xl text-gray-300 leading-8 font-bold">
                                    {!!$post->extract!!}
                                </h1>
                            </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>