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
                    <h2 class="blog-title">{{$post_details->title}}</h2>
                    <div class="blog-card col-12">
                        <div class="card-wrapper">
                            <img src="{{ uploaded_asset($post_details->feature_image) }}" alt="" style="height:400px; object-fit:cover" width="100%" >
                            <div class="txt-wrapper">
                                
                                <p>{!!$post_details->body!!}</p>
                            </div>
                        </div>
                    </div>
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



