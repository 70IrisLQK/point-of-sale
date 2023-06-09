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
                        <h4 class="card-title">Management Portfilio</h4>
                        <div class="table-rep-plugin">
                            <div class="table-wrapper">
                                <div class="btn-toolbar">
                                    <div class="btn-group focus-btn-group">
                                        <a href="{{ route('portfolios.create') }}">
                                            <button type="button" class="btn btn-primary">Add Portfolio</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table focus-on">
                                        <thead>
                                            <tr>
                                                <th id="tech-companies-1-col-0">STT</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Name</th>
                                                <th data-priority="3" id="tech-companies-1-col-2">Titke</th>
                                                <th data-priority="3" id="tech-companies-1-col-3">Image</th>
                                                <th data-priority="3" id="tech-companies-1-col-4">Description</th>
                                                <th data-priority="3" id="tech-companies-1-col-5">Created at</th>
                                                <th data-priority="6" id="tech-companies-1-col-6">Updated at</th>
                                                <th data-priority="6" id="tech-companies-1-col-7">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listPortfolios as $key => $portfolio)
                                                @php
                                                    $description = Str::limit($portfolio->portfolio_description, 70, '...');
                                                @endphp
                                                <tr>
                                                    <th data-org-colspan="1" data-columns="tech-companies-1-col-0">
                                                        <span class="co-name">{{ $key + 1 }}</span>
                                                    </th>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $portfolio->portfolio_name }}</td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-2">
                                                        {{ $portfolio->portfolio_title }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-3">
                                                        <img class="img-thumbnail" alt="200x200" width="100"
                                                            src="{{ asset('upload/admin_images/' . $portfolio->portfolio_image) }}"
                                                            data-holder-rendered="true">
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-2">
                                                        {{ $description }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-5">{{ $portfolio->created_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-6">{{ $portfolio->updated_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-7"
                                                        class="dt-buttons btn-group flex-wrap">
                                                        <a class="btn btn-info" title="Edit"
                                                            href="{{ route('portfolios.edit', [$portfolio->id]) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('portfolios.destroy', [$portfolio->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger" title="Delete"
                                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fas fa-trash"></i>

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
