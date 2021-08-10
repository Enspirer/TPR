@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">

                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <div class="row align-items-center">
                            <div class="col-6 ps-4">
                                <h4 class="fs-4 fw-bolder user-settings-head">Favourite Properties</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                        @foreach($property as $key=> $prop)
                            @foreach(App\Models\FileManager::where('id',$prop->feature_image_id)->get() as $data)

                            <div class="row align-items-center justify-content-between mb-4 border py-3">
                                <div class="col-6">
                                    <img src="{{ url('images',$data->file_name) }}" style="width:350px; object-fit:cover;" height="210px" class="card-img-top" alt="...">
                                </div>
                                <div class="col-5">
                                    <h5 class="card-title">Jaffna, {{ $prop->country }}</h5>

                                    @if($prop->beds == null)
                                    @else
                                        <p class="card-text mt-3 mb-1">
                                            {{ $prop->beds }} Bed Semidetached house
                                        </p>
                                    @endif

                                    <p class="card-text">Lancaster, claited Kingdom</p>
                                    <p class="mt-1 text-info">$ {{ $prop->price }}</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach

                            

                            <!-- <div class="row align-items-center justify-content-between mb-4 border py-3">
                                <div class="col-6">
                                    <img src="{{url('tpr_templete/images/fp_fm_2.svg')}}" class="card-img-top" alt="...">
                                </div>
                                <div class="col-5">
                                    <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                    <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                    <p class="card-text">Lancaster, claited Kingdom</p>
                                    <p class="mt-1 text-info">$ 480,000</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center justify-content-between mb-4 border py-3">
                                <div class="col-6">
                                    <img src="{{url('tpr_templete/images/fp_fm_3.svg')}}" class="card-img-top" alt="...">
                                </div>
                                <div class="col-5">
                                    <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                    <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                    <p class="card-text">Lancaster, claited Kingdom</p>
                                    <p class="mt-1 text-info">$ 480,000</p>

                                    <div class="row">
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn px-4 rounded-0 text-light py-1" style="background-color: #ff2c4b"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
