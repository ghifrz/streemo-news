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
                <h4 class="card-title">Edit Playlist {{ $playlist->playlist_title }}</h4>
                <a href="{{route('playlist.index')}}" class="btn btn-warning btn-round ml-auto">
                    <i class="fas fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="{{ route('playlist.update', $playlist->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="playlist_title">Article Title</label>
                        <input type="text" class="form-control" name="playlist_title" id="text" value="{{ $playlist->playlist_title }}">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="editor1" name="description">{{ $playlist->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" {{ $playlist->is_active == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $playlist->is_active == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="playlist_img">playlist IMG</label>
                        <input type="file" class="form-control" name="playlist_img">
                        <br>
                        <label for="playlist_img">Image Preview :</label><br>
                        <img src=" {{ asset('uploads/'. $playlist->playlist_img)}} " width="250">
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

