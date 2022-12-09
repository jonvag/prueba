<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 md:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

        @foreach ($posts as $post)
            <x-card-post :post="$post"/> {{-- este es un componente con variable alojado en views/components, visto en el video de filtrar post por etiquetas, victor arana flores --}}
        @endforeach
        <div class="mt-4">
            {{$posts->links()}}

        </div>

    </div>
</x-app-layout>