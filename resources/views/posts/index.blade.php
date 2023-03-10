<x-app-layout>
    <div class="container py-8">
        <div class="grid md:grid-cols-3 gap-6 grid-cols-1 lg:grid-cols-3">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url({{asset('storage/posts/example.png')}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('post.tag', $tag) }}" class="inline-block px-3 h-6 {{ 'bg-' . $tag->color . '-600' }} text-white rounded-full">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-black leading-8 font-bold mt-2">
                            <a href="{{ route('post.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>

                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </article>
            @endforeach
        </div>


        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
