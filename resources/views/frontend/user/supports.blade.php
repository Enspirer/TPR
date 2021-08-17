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
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Help & Supports</h4>
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
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">

                        @foreach($feedback as $key=> $feed)
                            <tr class="align-items-center">
                                <td>{{ $feed->name }}</td>
                                    @if($feed->status == 'Solved')
                                    <td><i class="bi bi-circle-fill text-success me-2" style="font-size: 0.5rem; vertical-align: middle;"></i>{{ $feed->status }}</td>
                                    @elseif($feed->status == 'Not Solved')
                                    <td><i class="bi bi-circle-fill text-danger me-2" style="font-size: 0.5rem; vertical-align: middle;"></i>{{ $feed->status }}</td>
                                    @else
                                    <td><i class="bi bi-circle-fill text-warning me-2" style="font-size: 0.5rem; vertical-align: middle;"></i>{{ $feed->status }}</td>
                                    @endif
                                
                                <td>{{ $feed->created_at->toDateString() }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ route('frontend.user.supports.edit',$feed->id) }}"><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <a href="{{ route('frontend.user.supports.delete',$feed->id) }}"><button class="btn text-light table-btn" style="background-color: #FF2C4B">Delete</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach    
                            <!-- <tr>
                                <td>Glenn Maxwell</td>
                                <td><i class="bi bi-circle-fill text-success me-2" style="font-size: 0.5rem; vertical-align: middle;"></i>Solved</td>
                                <td>2021-08-01</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href=""><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn text-light table-btn" style="background-color: #FF2C4B">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Isuru Udana</td>
                                <td><i class="bi bi-circle-fill text-danger me-2" style="font-size: 0.5rem; vertical-align: middle;"></i>Not Solved</td>
                                <td>2021-07-31</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href=""><button class="btn text-light table-btn" style="background-color: #4195E1">View</button></a>
                                        </div>
                                        <div class="col-5">
                                            <button class="btn text-light table-btn" style="background-color: #FF2C4B">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
