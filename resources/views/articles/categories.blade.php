@extends('layouts.frontend')

@section('title')
{{ $category->category_name }}
@endsection

@section('content')
<div class="row">
    <h2>{{ $category->category_name }}</h2>
    @foreach ($article as $row)
        <div class="col-md-4 mt-3">
            <div class="card" style="width: 100%; height: 100%; object-fit:cover">
                <img src="{{ asset('uploads/' . $row->article_img) }}" class="card-img-top" alt="..."
                    style="width: 100%; height: 50%; object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('show-details', $row->slug) }}" style="text-decoration: none;">
                            {{ $row->title }}
                        </a>
                    </h5>
                    <div class="text-break">
                    <p class="card-text">{!! $row->description !!}</p>
                    </div>
                  <a href="{{ route('show-details', $row->slug) }}" class="btn btn-primary mt-4 center-block">READ THIS ARTICLE</a>
                </div>
              </div>
        </div>
    @endforeach
</div>

@endsection