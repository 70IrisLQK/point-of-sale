@extends('admin.admin_master')
@section('contain')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Management Footer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('footers.index') }}">Management
                                    Footer</a>
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
                        <div class="table-rep-plugin">
                            <div class="table-wrapper">

                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table focus-on">
                                        <thead>
                                            <tr>
                                                <th id="tech-companies-1-col-0">STT</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Number</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Description</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Address</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Email</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Facebook</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Twitter</th>
                                                <th data-priority="1" id="tech-companies-1-col-1">Copyright</th>
                                                <th data-priority="3" id="tech-companies-1-col-5">Created at</th>
                                                <th data-priority="6" id="tech-companies-1-col-6">Updated at</th>
                                                <th data-priority="6" id="tech-companies-1-col-7">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listFooters as $key => $footer)
                                                <tr>
                                                    <th data-org-colspan="1" data-columns="tech-companies-1-col-0">
                                                        <span class="co-name">{{ $key + 1 }}</span>
                                                    </th>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->number }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ Str::limit($footer->short_description, 70, '...') }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->address }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->email }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->facebook }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->twitter }}</td>
                                                    <td data-org-colspan="1" data-priority="1"
                                                        data-columns="tech-companies-1-col-1">
                                                        {{ $footer->copyright }}</td>
                                                    <td data-org-colspan="1" data-priority="3"
                                                        data-columns="tech-companies-1-col-5">{{ $footer->created_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-6">{{ $footer->updated_at }}
                                                    </td>
                                                    <td data-org-colspan="1" data-priority="6"
                                                        data-columns="tech-companies-1-col-7"
                                                        class="dt-buttons btn-group flex-wrap">
                                                        <a class="btn btn-info" title="Edit"
                                                            href="{{ route('footers.edit', [$footer->id]) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

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
