
<x-app-layout>
    <x-slot name="page_title">
        <div class="text-left my-5">
            <h1 class="fw-bolder">Blog</h1>
        </div>
    </x-slot>
    <x-slot name="tailwindcss">
        yes
    </x-slot>
    <div class="container mt-4 mb-5" id="postContainer">
        @if (isset($posts) && count($posts) > 0)
            @foreach ($posts as $post)
                <div class="card mb-4 border-0" style="height: 376px;">
                    <div class="row">
                        <div class="col-md-4">
                            @if (isset($post->image))
                                <img src="/{{ $post->image }}" class="img-fluid" />
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" style="height: 100%; padding: 0;">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text" style="
                                    overflow: hidden;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    height: 290px;"
                                >
                                    {!! $post->content !!}
                                </p>

                            </div>
                            <div class="card-footer" style="margin-top: -40px; border:0; background-color: initial;">
                               <div class="row">
                                   <div class="col-md-9">
                                       @if (isset($post->tags))
                                           @php
                                               $tags = [];
                                               $tags = explode(',', $post->tags);
                                           @endphp
                                           @foreach ($tags as $tag)
                                               <button class="btn btn-secondary btn-sm">{{ $tag }}</button>
                                           @endforeach
                                       @endif
                                   </div>
                                   <div class="col-md-3" style="text-align: right;">
                                       <a class="btn btn-primary" href="{{ route('blog.show', $post->id) }}">Read more</a>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        @else
            <div class="card p-5 mt-5 text-center">
                <h2>No posts yet.</h2>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="150" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                        <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                        <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                    </svg>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
