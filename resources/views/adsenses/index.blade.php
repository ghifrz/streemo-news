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
                <h4 class="card-title">Adsense List</h4>
            </div>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-primary">
                    {{ Session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover text-light" >
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
                    <tbody>
                        @forelse ($adsenses as $key => $row)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->link }}</td>
                                <td>
                                    @if ($row->status =='1')
                                        Active
                                        @else
                                        Draft
                                    @endif    
                                </td>
                                <td>
                                    <img src=" {{ asset('uploads/'. $row->imageads)}} " width="100">
                                </td>
                                <td>
                                    <a href="{{ route('adsenses.edit', $row->id) }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-edit"></i></a>
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

