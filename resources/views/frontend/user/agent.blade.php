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
                        <h4 class="fs-4 fw-bolder user-settings-head">Agent Request Form</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <h4>About Agent</h4>
                        
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="country" class="form-label mb-0 required">Country</label>
                                            <input type="text" class="form-control" id="country" aria-describedby="country">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" id="name" aria-describedby="name">
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="agentType" class="form-label mb-0 mt-4 required">Agent Type</label>
                                            <select class="form-select" aria-label="agentType" id="agentType">
                                                <option selected>Company</option>
                                                <option value="individual">Individual</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="companyName" class="form-label mb-0 mt-4 required">Company Name</label>
                                            <input type="text" class="form-control" id="companyName" aria-describedby="companyName">
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="companyRegNo" class="form-label mb-0 mt-4 required">Company Registration Number</label>
                                            <input type="text" class="form-control" id="companyRegNo" aria-describedby="companyRegNo">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                            <input type="email" class="form-control" id="email" aria-describedby="email">
                                        </div>  
                                    </div>
                                </div>
                            

                                <h4 class="mt-5 mb-1">More About Agent</h4>
                                <h6 style="color: #5e6871">Tell us more about the agent</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="request" class="form-label mb-0 required">Request</label>
                                            <input type="text" class="form-control" id="request" aria-describedby="request">
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="photo" class="form-label mb-0 required">Photo</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="inputGroupFile02">
                                                <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="id" class="form-label mb-0 mt-4 required">NIC/ Passport/ License</label>
                                            <input type="text" class="form-control" id="id" aria-describedby="id">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="taxNo" class="form-label mb-0 mt-4 required">Tax Number - Nullable</label>
                                            <input type="text" class="form-control" id="taxNo" aria-describedby="taxNo">
                                        </div>
                                    </div>
                                </div>


                                <h4 class="mt-5 mb-1">Contact Information</h4>
                                <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="address" class="form-label mb-0 required">Address</label>
                                            <input type="address" class="form-control" id="address" aria-describedby="address">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="telephone" class="form-label mb-0 required">Telephone</label>
                                            <input type="telephone" class="form-control" id="telephone" aria-describedby="telephone">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="description" class="form-label mb-0 mt-4 required">Description Message</label>
                                        <textarea class="form-control" rows="4" placeholder="Description Message" aria-label="description" aria-describedby="description"></textarea>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

@endsection

