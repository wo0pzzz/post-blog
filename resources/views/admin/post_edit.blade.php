<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit post') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header"><div class="card-title">&nbsp;</div></div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="hidden" value="{{ $post->id }}" name="id">
                            <!--begin::Body-->
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Author name</label>
                                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $post->author) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror" style="min-height: 200px;">{{ old('content', $post->content) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags', $post->tags) }}" id="tagsInput">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"  required="">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $key => $category)
                                            <option value="{{ $key }}" {{ old('category_id', $post->category_id) == $key ? 'selected' : '' }}>
                                                {{ $category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (isset($post->image))
                                    <div class="input-group mb-3" id="nothidden-image">
                                        <label class="input-group-text">Image</label>
                                        <div class="form-control">
                                            <div style="position: relative; width: 150px;">
                                                <img src="/{{ $post->image }}" width="150px" height="auto"/>
                                                <div class="remove-img" alt="Delete" style="
                                                    position: absolute;
                                                    top: 0px;
                                                    right: 0px;
                                                    color: red;
                                                    width: 32px;
                                                    height: 32px;
                                                    background-color: #f8f9fa;
                                                    border-bottom-left-radius: 5px;
                                                    cursor: pointer;
                                                    " onclick="removeImg()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function removeImg() {
                                            document.getElementById('hidden-image').removeAttribute('style');
                                            document.getElementById('nothidden-image').remove();
                                        }
                                    </script>
                                @endif
                                <div class="input-group mb-3" id="hidden-image" style="display: none;">
                                    <label class="input-group-text">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.js"></script>
    <script>
        UseBootstrapTag(document.getElementById('tagsInput'))
    </script>
</x-admin-layout>
