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
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Property Approval</h4>
                            </div>
                            <!-- <div class="col-6 text-end justify-content-end">
                                <input type="text" class="form-control w-75 ms-auto" placeholder="search" aria-label="search" aria-describedby="search">
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Property Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Admin Approval</th>
                                <th scope="col">Country Manager Approval</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody class="align-middle table-data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <form action="{{ route('frontend.user.get-property-approval-update') }}" method="POST">
    {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Disapprove Property</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Do you want to disapprove this property?
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="hid_id" value="">
                            <button type="submit" class="btn btn-danger">Disapprove</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection



@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get-property-approval')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'admin_approval', name: 'admin_approval'},
                {data: 'country_manager_approval', name: 'country_manager_approval'},
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
        let value = $(this).attr('id');

        $('.modal-footer input').attr('value', value);
    })
    }
</script>

@endpush

