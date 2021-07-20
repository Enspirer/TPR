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
                <div class="border">

                    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

                        <h5 class="px-3 mt-4 pb-2 mb-0">My Account</h5>

                        <a class="nav-link active border-0 bg-light ps-5 w-100" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-account" aria-selected="true">Account Information</a>

                        <a class="nav-link border-0 bg-light ps-5 border-bottom w-100 pb-3" id="nav-communication-tab" data-bs-toggle="tab" data-bs-target="#nav-communication" type="button" role="tab" aria-controls="nav-communication" aria-selected="false">Communications</a>

                        <h5 class="px-3 mt-4 pb-2 mb-0">My Settings</h5>

                        <a class="nav-link border-0 bg-light ps-5 w-100" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="true">Search Criteria</a>

                        <a class="nav-link border-0 bg-light ps-5 border-bottom w-100 pb-3" id="nav-results-tab" data-bs-toggle="tab" data-bs-target="#nav-results" type="button" role="tab" aria-controls="nav-results" aria-selected="false">Results View</a>


                        <h4 class="px-3 mt-4 pb-2 mb-0">Notification Settings</h4>

                        <a class="nav-link border-0 bg-light ps-5 w-100 pb-3" id="nav-preferences-tab" data-bs-toggle="tab" data-bs-target="#nav-preferences" type="button" role="tab" aria-controls="nav-preferences" aria-selected="true">Preferences</a>

                    </div>
                </div>
            </div>

            <div class="col-7 border">
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
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
                                <button type="button" class="btn rounded-pill text-light px-5 py-3 me-2" style="background-color: #6e6e70;">Deactivate Account</button>
                                <button type="submit" class="btn rounded-pill text-light px-5 py-3 ms-2" style="background-color: #94ca60;">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                        <form>
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <label for="language" class="form-label mb-1 required">Communication Language</label>
                                        <select class="form-select" aria-label="language" id="language">
                                            <option selected>English</option>
                                            <option value="malaysia">Malaysia</option>
                                          </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="form-check mb-3 ps-4">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Send me updates on the latest REALTOR.ca features, promotions, trends and insights.
                                    </label>
                                </div>
    
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Send me confirmation email when I contact the TROPICAL®.
                                    </label>
                                </div>
    
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Yes, always add My Notes to email I send to friends.
                                    </label>
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <button type="submit" class="btn rounded-pill text-light px-5 py-3 ms-2" style="background-color: #94ca60;">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade px-2 py-3" id="nav-results" role="tabpanel" aria-labelledby="nav-results-tab">
                        <form>
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <label for="language" class="form-label mb-1 required">Sort results by</label>
                                        <select class="form-select" aria-label="language" id="language">
                                            <option selected>Newest</option>
                                            <option value="oldest">Oldest</option>
                                            <option value="lowest">Lowest Price</option>
                                            <option value="highest">Higest price</option>
                                          </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-7">
                                    <div>
                                        <label for="language" class="form-label mb-1 required">View results on</label>
                                        <select class="form-select" aria-label="language" id="language">
                                            <option selected>Map</option>
                                            <option value="list">List</option>
                                          </select>
                                    </div> 
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <button type="button" class="btn rounded-pill me-2 p-0 ps-3" style="border: 1px solid #CCCCCC; color: #23A1C0">Reset <i class="fas fa-undo ms-3"></i></button>
                                <button type="submit" class="btn rounded-pill text-light px-5 py-3 ms-2" style="background-color: #94ca60;">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade px-2 py-3" id="nav-preferences" role="tabpanel" aria-labelledby="nav-preferences-tab">
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
                            <button type="submit" class="btn rounded-pill text-light px-5 py-3 ms-2" style="background-color: #94ca60;">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between mt-3 invisible unsubscribe-div">
                <div class="col-4"></div>
                <div class="col-7">
                    <p>You can withdraw your consent at any time by clicking <a href="#" style="color: #4195E1">unsubscribe</a> here or by clicking the "unsubscribe" link in TROPICAL.com emails.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
