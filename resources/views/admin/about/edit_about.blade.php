@extends('admin.admin_master')
@section('contain')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('about.update', [$getAboutById->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h4 class="card-title">Update About</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Title" name="title"
                                        id="title" value="{{ $getAboutById->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Short Title" name="short_title"
                                        id="short-title" value="{{ $getAboutById->short_title }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" class="form-control" type="text" id="short_description" name="short_description"
                                        placeholder="Short Description">{{ $getAboutById->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">{{ $getAboutById->long_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">About
                                    Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="about-image" name="about_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="show-about-image"
                                        src="{{ !empty($getAboutById->about_image) ? asset('upload/admin_images/' . $getAboutById->about_image) : asset('assets/images/no_image.jpg') }}"
                                        class="rounded avatar-lg">
                                </div>
                            </div>
                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#about-image').change(function(e) {
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-about-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

@endsection
