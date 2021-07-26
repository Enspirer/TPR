@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <div class="col-8 p-0">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h4 class="fs-4 fw-bolder user-settings-head">Booking Box</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">

            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8 border">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-4 user-chat">
                                <div class="input-group mb-4 mt-2">
                                    <input type="text" class="form-control border-end-0" aria-label="username" aria-describedby="name" style="padding: 0px!important;">
                                    <span class="input-group-text" id="name"><i class="bi bi-search"></i></span>
                                </div>
                                
                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-1.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">Emma Newman</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name" href="{{ route('frontend.user.user-chat') }}">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-1.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">Emma Newman</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                                <a class="row align-items-center mb-2 text-decoration-none user-chat-name">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">John Wick</h6>
                                    </div>
                                </a>

                            </div>

                            <div class="col-8 ps-4">
                                <div class="col-6">
                                    <div class="row align-items-center mb-2 py-3">
                                        <div class="col-3 text-start p-0">
                                            <img src="{{ asset('tpr_templete/images/users/user-1.png') }}" alt="" class="img-fluid rounded-circle" style="border: 3px solid #0dcaf0">
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-0">Emma Newman</h6>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row mb-5">
                                    <div class="row p-0">
                                        <div class="col-2">
                                            <p class="mb-2 fw-bolder">Agent</p>
                                        </div>

                                        <div class="col-3">
                                            <p class="mb-2 fw-bolder">26/07/2021</p>
                                        </div>
                                    </div>

                                    <div class="col-11">
                                        <div class="row align-items-center justify-content-between p-2 border">
                                            <div class="col-6 p-0">
                                                <img src="{{url('tpr_templete/images/fp_fm_1.svg')}}" class="card-img-top" alt="...">
                                            </div>
                                            <div class="col-6 p-0 ps-3">
                                                <p class="card-title fw-bolder mb-2">Jaffna, Sri Lanka</p>
                                                <p class="card-text mb-1" style="font-size: 0.8rem">4 Bed Semidetached house</p>
                                                <p class="card-text mb-1" style="font-size: 0.8rem">Lancaster, claited Kingdom</p>
                                                <p class="text-info mb-0">$ 480,000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-end pe-2">
                                    <div class="col-11 mb-2">
                                        <div class="row align-items-center justify-content-between border">
                                            <p class="mb-0 p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, culpa! Hic harum ab illo aliquam quos facere asperiores explicabo fugiat molestiae autem nesciunt alias ratione eos, dicta vel perspiciatis.</p>
                                        </div>

                                        <div class="row justify-content-end text-end mt-2">
                                            <div class="col-2">
                                                <p class="fw-bolder">You</p>
                                            </div>

                                            <div class="col-3 p-0">
                                                <p class="fw-bolder">26/07/2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
