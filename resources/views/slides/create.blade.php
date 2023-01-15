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
                <h4 class="card-title">Add New Video Slides</h4>
                <a href="{{route('slides.index')}}" class="btn btn-warning btn-round ml-auto">
                    <i class="fas fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="/slides" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="slide_title">Title</label>
                        <input type="text" class="form-control" name="slide_title" placeholder="Enter Title">
                        @error('slides_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link Video Slides</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter Link">
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slide_img">Image Banner</label>
                        <input type="file" class="form-control" name="slide_img">
                        @error('slide_img')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Publish</option>
                            <option value="0">Draft</option>
                        </select>
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

