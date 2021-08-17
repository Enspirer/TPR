@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row"> table-btn
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Agent Approval</h4>
                            </div>
                            <div class="col-6 text-end justify-content-end">
                                <input type="text" class="form-control w-75 ms-auto" placeholder="search" aria-label="search" aria-describedby="search">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <table class="table table-borderless table-responsive">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">

                        @foreach($agent_request as $agent)

                            <tr class="align-items-center">
                                <td>{{ $agent->name }}</td>
                                <td>{{ $agent->email }}</td>
                                <td>{{ $agent->created_at->toDateString() }}</td>
                                <td>{{ $agent->country_manager_approval }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{ route('frontend.user.single-agent-approval',$agent->id) }}"><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{ route('frontend.user.agentApprovalDelete',$agent->id) }}"><button class="btn text-light table-btn" style="background-color: #FF2C4B;">Delete</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach 
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    


@endsection
