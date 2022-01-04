@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/blog.css') }}">
@endpush

<!-- banner -->
<section id="blog-banner">
    <div class="container-fluid blog-banner">
    </div>
</section>

<!-- blog section -->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="row blog-card-row">
                    <h1 class="blog-title">Latest Posts</h1>
                    <div class="blog-card col-4">
                        <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog1.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card col-4">
                    <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog2.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card col-4">
                    <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog3.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-card-row">
                    <div class="blog-card col-4">
                    <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog2.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card col-4">
                    <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog3.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-card col-4">
                    <div class="card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog1.jpg') }}" alt="" width="100%" >
                            <div class="txt-wrapper">
                                <h2>Lorem ipsum dolor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                <div class="author-wrapper">
                                    <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="sidebar-warpper">
                    <h2 class="blog-title">Popular Posts</h2>
                    <div class="popular-wrapper">
                        <div class="popular-card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog1.jpg') }}" alt="">
                            <div class="popular-txt">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                        <div class="popular-card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog2.jpg') }}" alt="">
                            <div class="popular-txt">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                        <div class="popular-card-wrapper">
                            <img src="{{ url('tpr_templete/images/blog/blog3.jpg') }}" alt="">
                            <div class="popular-txt">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                    <h2 class="blog-title">Latest Tweets</h2>
                    <div class="tweets-warpper">
                        Tweets here
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


@endsection



