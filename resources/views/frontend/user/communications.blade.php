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
                        <h4 class="fs-4 fw-bolder user-settings-head">Communications</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Stay connected with TROPICAL.com by subscribing to emails</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
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
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                                </div>
                            </form>
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

