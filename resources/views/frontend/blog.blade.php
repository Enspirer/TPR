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
            <div class="col-9 full-size-width tab-full-width">
                <div class="row blog-card-row">
                    <h1 class="blog-title">Latest Posts</h1>

                    @if(count($all_posts) == 0)

                        @include('frontend.includes.not_found',[
                           'not_found_title' => 'Posts not Found',
                           'not_found_description' => null,
                           'not_found_button_caption' => null
                        ])

                    @else
                        @foreach($all_posts as $all_post)
                            <div class="blog-card col-4 mt-4 full-size-width tab-blog-card">
                                <a href="{{route('frontend.individual_blog',$all_post->id)}}" style="text-decoration:none; color:black">
                                    <div class="card-wrapper" style="min-height:365px; max-height:365px;">
                                        <img src="{{uploaded_asset($all_post->feature_image)}}" alt="" style="height:155px; object-fit:cover" width="100%">
                                        <div class="txt-wrapper">
                                            <h5 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$all_post->title}}</h5>
                                            <div  style="overflow: hidden;text-overflow: ellipsis;height: 125px;">
                                                <p>{!!$all_post->body!!}</p>
                                            </div>
                                            <!-- <div class="author-wrapper">
                                                <img src="{{ url('tpr_templete/images/blog/author.jpg') }}" alt="" class="circle-prof"> <span>Mr.Lorem Ipsum</span>
                                            </div> -->
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    @endif
                   

                </div>
            </div>
            <div class="col-3 blog-fifty-mobile">
                <div class="sidebar-warpper">
                    @if(count($newest_posts) != 0)
                        <h2 class="blog-title">Popular Posts</h2>
                        <div class="popular-wrapper">
                            @foreach($newest_posts as $newest_post)
                            <a href="{{route('frontend.individual_blog',$newest_post->id)}}" style="text-decoration:none; color:black">
                                <div class="popular-card-wrapper">
                                    <img src="{{ uploaded_asset($newest_post->feature_image) }}" alt="" style="object-fit:cover">
                                    <div class="popular-txt">
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $newest_post->title }}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach

                        </div>
                    @endif
                    
                </div>
                
            </div>
        </div>
    </div>
</section>


@endsection



