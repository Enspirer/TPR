@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:12rem;">
        <div class="row justify-content-between">
            <div class="col-4"></div>
            <div class="col-7 p-0">
                <h4 class="fs-4 fw-bolder user-settings-head">Account Information</h4>
                <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>

            </div>
        </div>

        <div class="row justify-content-between">

            <div class="col-4 p-0">
                @include('frontend.includes.profile-settings-links')
            </div>

            <div class="col-7 border">

                <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                    <h4>About You</h4>
                    
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="firstName" class="form-label mb-0 required">First Name</label>
                                    <input type="text" class="form-control" id="firstName" aria-describedby="firstName">
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="lastName" class="form-label mb-0 required">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" aria-describedby="lastName">
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="displayName" class="form-label mb-0 mt-4 required">Display Name</label>
                                    <input type="text" class="form-control" id="displayName" aria-describedby="displayName">
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email">
                                </div>  
                            </div>
                        </div>
                    

                        <h4 class="mt-5 mb-1">More About You</h4>
                        <h6 style="color: #5e6871">Tell us more about you and your real estate needs.</h6>

                        <div class="row">
                            <div class="col-6">
                                <label for="userType" class="form-label mb-0">I am a</label>
                                <select class="form-select" aria-label="userType" id="userType">
                                    <option selected>No Preference</option>
                                    <option value="1">First time buyer</option>
                                    <option value="2">Repeat buyer</option>
                                    <option value="3">Seller</option>
                                    <option value="3">Residential investor</option>
                                    <option value="3">Commercial investor</option>
                                    <option value="3">Seller</option>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label for="birth" class="form-label mb-0">Year of birth</label>
                                <select class="form-select" aria-label="birth" id="birth">
                                    <option selected>Select</option>
                                    <option value="1">2021</option>
                                    <option value="2">2020</option>
                                    <option value="3">2019</option>
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="gender" class="form-label mb-0 mt-4">Gender</label>
                                <select class="form-select" aria-label="gender" id="gender">
                                    <option selected>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    </select>
                            </div>
                            <div class="col-6">
                                <label for=displayName" class="form-label mb-0 mt-4">Marital Status</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="single">Single</option>
                                    <option value="common-law">Common Law</option>
                                    <option value="married">Married</option>
                                    <option value="separated">separated</option>
                                    <option value="divorced">Divorced</option>
                                    </select>
                            </div>
                        </div>


                        <h4 class="mt-5 mb-1">Contact Information</h4>
                        <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="city" class="form-label mb-0">City</label>
                                    <input type="city" class="form-control" id="city" aria-describedby="city">
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="province" class="form-label mb-0">Province</label>
                                    <input type="province" class="form-control" id="province" aria-describedby="province">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="country" class="form-label mb-0 mt-4">Country</label>
                                <select class="form-select" aria-label="country" id="country">
                                    <option selected>Sri Lanka</option>
                                    <option value="india">India</option>
                                    <option value="australia">Australia</option>
                                    </select>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="postal-code" class="form-label mb-0 mt-4">Postal Code</label>
                                    <input type="postal-code" class="form-control" id="postal-code" aria-describedby="postal-code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="home-phone" class="form-label mb-0 mt-4">Home Phone</label>
                                    <input type="home-phone" class="form-control" id="home-phone" aria-describedby="home-phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="mobile-phone" class="form-label mb-0 mt-4">Mobile Phone</label>
                                    <input type="mobile-phone" class="form-control" id="mobile-phone" aria-describedby="mobile-phone">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #6e6e70;">Deactivate Account</button>
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

