@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
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
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Sold Properties</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">

                            </div>
                            <div class="col-4 text-end">
                              
                                
                            </div>
                        </div>
                    </div>
                </div>

            @if(count($sold_properties) <= 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Data not found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            @else

                <div class="row mt-5">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">City</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">
                        </tbody>
                    </table>
                </div>

            @endif    
            </div>
        </div>
    </div>


@endsection



@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.management_get_sold_properties')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'city', name: 'city'},
                {data: 'price', name: 'price'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
    };


    $(document).ready(function() {
        loadTable();
    });


</script>

@endpush