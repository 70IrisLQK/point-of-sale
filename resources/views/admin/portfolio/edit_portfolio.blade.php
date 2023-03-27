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
                    <form action="{{ route('portfolios.update', [$getPortfolioById->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h4 class="card-title">Update Portfolio</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Name" name="name"
                                        id="title" value="{{ $getPortfolioById->portfolio_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Title" name="title"
                                        id="short-title" value="{{ $getPortfolioById->portfolio_title }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description">{{ $getPortfolioById->portfolio_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">
                                    Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="portfolio-image" name="portfolio_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="show-portfolio-image"
                                        src="{{ !empty($getPortfolioById->portfolio_image) ? asset('upload/admin_images/' . $getPortfolioById->portfolio_image) : asset('assets/images/no_image.jpg') }}"
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
            $('#portfolio-image').change(function(e) {
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-portfolio-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

@endsection
