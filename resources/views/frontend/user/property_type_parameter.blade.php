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
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Property Type Parameter</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">

                            </div>
                            <div class="col-4 text-end">
                                                          
                                <!-- <div class="btn btn-info w-10" data-toggle="modal" data-target="#exampleModal">Explore Parameter</div> -->

                            </div>
                        </div>
                    </div>
                </div>

            @if(count($property_type) == 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Property Types not found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            @else

                <div class="row mt-5">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Type Name</th>
                                <th scope="col">Action</th>
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

        
@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get_property_type')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "asc"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'property_type_name', name: 'property_type_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},                
            ],
            "fnDrawCallback": function( oSettings ) {
                dispprove();
            }
        });
    };


    $(document).ready(function() {
        loadTable();
    });



    function dispprove() {
        $('.disapprove').on('click', function() {
        let value = $(this).attr('href');

        console.log(value);

        $('.modal-footer a').attr('href', value);
    })
    }
</script>

@endpush