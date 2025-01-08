<x-admin-layout>
    <x-slot name="header">
        {{ __('Post list') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">&nbsp;</h3>
                            <div class="card-tools">
                                <a href="{{ route('post.create') }}"><button class="btn btn-primary btn-sm">Create</button></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                            @endif
                            @if (isset($posts) && count($posts) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th style="width: 120px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr class="align-middle">
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ (isset($post->category->title) ? $post->category->title : '') }}</td>
                                                <td>{{ $post->author }}</td>
                                                <td>
                                                    <div style="display:flex; justify-content: space-between;">
                                                        <a href="{{ route('post.edit', $post->id) }}"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                                                        <form method="post" action="{{ route('post.destroy') }}">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="p-5 text-center">
                                    No posts yet.
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
