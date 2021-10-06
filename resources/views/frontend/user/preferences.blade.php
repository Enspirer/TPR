@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
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
                        <h4 class="fs-4 fw-bolder user-settings-head">Notification Settings</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Make changes to your notification settings at any time.</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-preferences" role="tabpanel" aria-labelledby="nav-preferences-tab">
                            <div class="row">
                                <h4><i class="bi bi-bookmark-fill" style="color: #94ca60"></i> &nbsp;My Searches</h4>
                                <p class="mt-3 ps-5 p-0">You don't have any saved searches yet. <a href="#" style="color: #4195E1">Learn how to add a Saved Search</a></p>
                            </div>

                            <div class="row mt-5">
                                <h4><i class="bi bi-heart-fill" style="color: red"></i> &nbsp;My Favourites</h4>
                                <p class="mt-3 ps-5 p-0">Updates to Price, Photo, Open House</p>

                                <div class="form-check mb-3" style="margin-left: 2.5rem;">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        All Favourites
                                    </label>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between mt-3">
                <div class="col-3"></div>
                <div class="col-8">
                    <p>You can withdraw your consent at any time by clicking <a href="#" style="color: #4195E1">unsubscribe</a> here or by clicking the "unsubscribe" link in TROPICAL.com emails.</p>
                </div>
            </div>
        </div>
    </div>

@endsection

