@extends('layouts.frontend')

@section('content')
    @include('layouts.includes.slide')

    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                @foreach ($article as $row)
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">{{ $row->title }}</li>
                                    </ul>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($article as $row)
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
                    @empty
                        <p>Data still empty!</p>
                    @endforelse
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
