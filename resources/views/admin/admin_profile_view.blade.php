@extends('admin.admin_master')
@section('contain')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <form action="{{ route('admin.edit-profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Update Profile</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Name" name="name"
                                        id="name" value="{{ $getAdminById->name }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Email" value="{{ $getAdminById->email }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Profile
                                    Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="profile_image">
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="show-image"
                                        src="{{ !empty($getAdminById->profile_image) ? asset('upload/admin_images/' . $getAdminById->profile_image) : asset('assets/images/no_image.jpg') }}"
                                        alt="{{ $getAdminById->image }}" class="rounded avatar-lg">
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    e.preventDefault();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            })
        </script>
    @endsection
