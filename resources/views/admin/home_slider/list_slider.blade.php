@extends('admin.admin_master')
@section('contain')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Home Slides</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('home-sliders.index') }}">Home Slides</a>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Management Home Slide</h4>
                        <div class="table-rep-plugin">
                            <div class="table-wrapper">
                                <div class="btn-toolbar">
                                    <div class="btn-group focus-btn-group">
                                        <a href="{{ route('home-sliders.create') }}">
                                            <button type="button" class="btn btn-primary">Add Slide</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table focus-on">
                                        <thead>
                                            <tr>
                                                <th id="tech-companies-1-col-0">STT</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Title</th>
                                                <th data-priority="3" id="tech-companies-1-col-2">Short Titke</th>
                                                <th data-priority="1" id="tech-companies-1-col-3">Home Slide</th>
                                                <th data-priority="3" id="tech-companies-1-col-4">Video Url</th>
                                                <th data-priority="3" id="tech-companies-1-col-5">Created at</th>
                                                <th data-priority="6" id="tech-companies-1-col-6">Updated at</th>
                                                <th data-priority="6" id="tech-companies-1-col-7">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listHomeSlides as $key => $homeSlide)
                                                <tr>
                                                    <th data-org-colspan="1" data-columns="tech-companies-1-col-0">
                                                        <span class="co-name">{{ $key + 1 }}</span>
                                                    </th>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">{{ $homeSlide->title }}</td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-2">{{ $homeSlide->short_title }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-3">
                                                        <img class="img-thumbnail" alt="200x200" width="200"
                                                            src="{{ asset('upload/admin_images/' . $homeSlide->home_slide) }}"
                                                            data-holder-rendered="true">
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-4">
                                                        <div class="text-center">
                                                            <!-- Small modal -->
                                                            <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop-{{ $homeSlide->id }}">Show
                                                                Video</button>
                                                        </div>
                                                        <div class="modal fade" id="staticBackdrop-{{ $homeSlide->id }}"
                                                            aria-labelledby="staticBackdropLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content" style="width: 1000px">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                                            Video</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <iframe width="942" height="530"
                                                                            src="{{ $homeSlide->video_url }}"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light waves-effect"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-5">{{ $homeSlide->created_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-6">{{ $homeSlide->updated_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-7"
                                                        class="dt-buttons btn-group flex-wrap">
                                                        <a class="btn btn-outline-secondary btn-sm" title="Edit"
                                                            href="{{ route('home-sliders.edit', [$homeSlide->id]) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="POST" id="my_form"
                                                            action="{{ route('home-sliders.destroy', [$homeSlide->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-secondary btn-sm" title="Delete"
                                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
