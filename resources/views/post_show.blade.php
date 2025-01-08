<x-app-layout>
    <x-slot name="page_title">
        <div class="text-left" id="postHeader">
            <p class="m-0">{{ (isset($post->category->title) ? $post->category->title : ' ') }}</p>
            <h1 class="fw-bolder">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-3">
                    <span><i class="bi bi-person" style="padding-right: 7px;"></i>{{ $post->author }}</span>
                    <span style="margin-left: 15px;"><i class="bi bi-calendar" style="padding-right: 7px;"></i>{{ date("d-m-Y", strtotime($post->created_at)) }}</span>
                </div>
                <div class="col-md-9" style="text-align: right">
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
            </div>
        </div>
    </x-slot>
    <div class="container mt-4 mb-5" id="postContainer">
        @if (isset($post) && !empty($post))
            <div class="card mb-4 border-0">
                <div class="card-body">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="prevnextPaginator">
                <div class="row">
                    <div class="col-md-6 text-center">
                        @if (isset($prevPost) && !empty($prevPost))

                            <a href="{{ route('blog.show', $prevPost->id) }}">
                                <i class="bi bi-chevron-left"></i>
                                {{ $prevPost->title }}
                                <span>  |  {{ ($prevPost->id < 10 ? '0' : '') . $prevPost->id}}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 text-center">
                        @if (isset($nextPost) && !empty($nextPost))
                            <a href="{{ route('blog.show', $nextPost->id) }}">
                                <span>{{ ($nextPost->id < 10 ? '0' : '') . $nextPost->id}}  |  </span>
                                {{ $nextPost->title }}
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="card p-5 mt-5 text-center">
                <h2>This post not exist.</h2>
                <div><svg xmlns="http://www.w3.org/2000/svg" height="150" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                        <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                        <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                    </svg></div>
            </div>
        @endif
    </div>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous"
    />
</x-app-layout>
