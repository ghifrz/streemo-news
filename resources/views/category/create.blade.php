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
                <h4 class="card-title">Add New Categories</h4>
                <a href="{{route('category.index')}}" class="btn btn-warning btn-round ml-auto">
                    <i class="fas fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-6 col-lg-4">
                <form method="post" action="/category">
                    @csrf
                    <div class="form-group">
                        <label for="category">Name Category</label>
                        <input type="text" class="form-control" name="category_name" id="text" placeholder="Enter Name Category">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn mr-1">Save</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection

