<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600"> {{ $post->name }} </h1>

        <div class="text-lg text-gray-500 mb-2">
            {{ $post->extract }}
        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{asset('storage/posts/example.png') }}" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{ $post->body }}
                </div>
            </div>

            <aside class="">
                <h1 class="text-2-xl font-bold color-gray-600 mb-4"> Más en {{ $post->category->name }}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('post.show', $similar) }}">
                                <img class="w-36 h-20 object-cover object-center" src="{{asset('storage/posts/example.png') }}" alt="">
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </aside>

        </div>
    </div>
</x-app-layout>
