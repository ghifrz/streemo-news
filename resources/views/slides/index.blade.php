@extends('layouts.index')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Slider List</h4>
                    <a href="{{ route('slides.create') }}" class="btn btn-primary btn-round ml-auto">
                        <i class="fa fa-plus"></i>
                        Add New Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{ Session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover text-light">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th style="width: 12%">Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> --}}
                        <tbody>
                            @forelse ($slides as $key => $row)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $row->slide_title }}</td>
                                    <td>{{ $row->link }}</td>
                                    <td>
                                        @if ($row->status == '1')
                                            Active
                                        @else
                                            Draft
                                        @endif
                                    </td>
                                    <td>
                                        <img src=" {{ asset('uploads/' . $row->slide_img) }} " width="100">
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('slides.edit', $row -> id) }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-edit"></i></a> --}}

                                        <form method="POST" class="d-inline"
                                            action="{{ route('slides.destroy', $row->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data still empty..</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
