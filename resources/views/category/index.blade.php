@extends('layouts.index')

@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Category Page</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Category List</h4>
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-round ml-auto">
                    <i class="fa fa-plus"></i>
                    Add Data
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-primary">
                    {{ Session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover text-lightx" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Categories</th>
                            <th>Slug</th>
                            <th style="width: 12%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $key => $row)
                            <tr>
                                <td scope="row">{{ $key + 1 }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $row -> id) }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-edit"></i></a>

                                    <form method="POST" class="d-inline" action="{{ route('category.destroy', $row->id) }}">
                                    @csrf
                                    @method('delete') |
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

