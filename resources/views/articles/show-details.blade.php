@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-4">
                <div class="div">
                    <img src="{{ asset('uploads/' . $article->article_img) }}" class="img-fluid" alt="">
                </div>
                <div class="detail-content mt-2 p-4">
                    <div class="detail-badge">
                        <a href="" class="badge bg-primary"
                            style="text-decoration: none">{{ $article->categories->category_name }}</a>
                        <a href="" class="badge bg-info"
                            style="text-decoration: none">{{ $article->users->name }}</a>
                    </div>
                    <h2>{{ $article->title }}</h2>
                    <div class="detail-body">
                        <p>
                            {!! $article->description !!}
                        </p>
                    </div>
                </div>
                <div id="disqus_thread" class="mt-4"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://news-egazdm8vmx.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                        by
                        Disqus.</a></noscript>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="detail-sidebar-ads">
                    <h4>Ads Here</h4>

                    <a href="">
                        <img src="{{ asset('uploads/' . $adsense->imageads) }}" width="350px" alt="">
                    </a>
                </div>
                <div class="detail-sidebar-category">
                    <h4 class="mt-4">Categories</h4>

                    @foreach ($category as $row)
                        <div class="sidebar-category d-flex justify-content-between">
                            <a href="" style="text-decoration: none">
                                <p>{{ $row->category_name }}</p>
                            </a>
                            <p class="ml-auto text-end"><span class="badge bg-dark">{{ $row->articles->count() }}</span></p>
                        </div>
                    @endforeach
                    {{-- <div class="sidebar-category d-flex justify-content-between">
                    <a href="" style="text-decoration: none">
                        <p>All Categories Here</p>
                    </a>
                    <p class="ml-auto text-end"><span class="badge bg-dark">4</span></p>
                </div>
                <div class="sidebar-category d-flex justify-content-between">
                    <a href="" style="text-decoration: none">
                        <p>All Categories Here</p>
                    </a>
                    <p class="ml-auto text-end"><span class="badge bg-dark">4</span></p>
                </div>
                <div class="sidebar-category d-flex justify-content-between">
                    <a href="" style="text-decoration: none">
                        <p>All Categories Here</p>
                    </a>
                    <p class="ml-auto text-end"><span class="badge bg-dark">4</span></p>
                </div>
                <div class="sidebar-category d-flex justify-content-between">
                    <a href="" style="text-decoration: none">
                        <p>All Categories Here</p>
                    </a>
                    <p class="ml-auto text-end"><span class="badge bg-dark">4</span></p>
                </div> --}}
                </div>

                <div class="detail-sidebar-article mb-4">
                    <h4 class="mt-4">New Articles</h4>

                    @foreach ($newPost as $row)
                        <div class="d-flex">
                            <div class="flex-shrink-0 mt-3">
                                <img src="{{ asset('uploads/' . $row->article_img) }}" style="width:80px; height: 80px"
                                    alt="...">
                            </div>
                            <div class="flex-grow-1 mt-3 ms-3">
                                <h6><a href="{{ route('show-details', $row->slug) }}" style="text-decoration: none;">
                                        {{ $row->title }}
                                    </a></h6>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="d-flex">
                    <div class="flex-shrink-0 mt-3">
                      <img src="{{ asset('uploads/news1.png') }}" width="80px" alt="...">
                    </div>
                    <div class="flex-grow-1 mt-3 ms-3">
                        <h5>Article Title</h5>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0 mt-3">
                      <img src="{{ asset('uploads/news1.png') }}" width="80px" alt="...">
                    </div>
                    <div class="flex-grow-1 mt-3 ms-3">
                        <h5>Article Title</h5>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
