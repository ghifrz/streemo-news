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
                <h4 class="card-title">Edit Article {{ $article->title }}</h4>
                <a href="{{route('articles.index')}}" class="btn btn-warning btn-round ml-auto">
                    <i class="fas fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Article Title</label>
                        <input type="text" class="form-control" name="title" id="text" value="{{ $article->title }}">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="editor1" name="editor1">{{ $article->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($category as $row)
                                @if ($row->id == $article->category_id)
                                    <option value="{{ $row->id }}" selected="selected">{{ $row->category_name }}</option>  
                                @else
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endif
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" {{ $article->is_active == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $article->is_active == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="article_img">Article IMG</label>
                        <input type="file" class="form-control" name="article_img">
                        <br>
                        <label for="article_img">Image Preview :</label><br>
                        <img src=" {{ asset('uploads/'. $article->article_img)}} " width="250">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-round ml-auto">Save</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection

