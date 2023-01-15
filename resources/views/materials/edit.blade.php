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
                <h4 class="card-title">Edit Material {{ $materials->title }}</h4>
                <a href="{{route('materials.index')}}" class="btn btn-warning btn-round ml-auto">
                    <i class="fas fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="{{ route('materials.update', $materials->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="text" value="{{ $materials->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="editor1" name="description">{{ $materials->description }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Playlist</label>
                        <select class="form-control" name="playlist_id">
                            @foreach ($playlist as $row)
                                @if ($row->id == $materials->playlist_id)
                                    <option value="{{ $row->id }}" selected="selected">{{ $row->playlist_title }}</option>  
                                @else
                                    <option value="{{ $row->id }}">{{ $row->playlist_title }}</option>
                                @endif
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" {{ $materials->is_active == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $materials->is_active == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control" name="image">
                        <br>
                        <label for="image">Image Preview :</label><br>
                        <img src=" {{ asset('uploads/'. $materials->image)}} " width="250">
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

