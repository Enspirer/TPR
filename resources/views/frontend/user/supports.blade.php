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
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Help & Supports</h4>
                            <!-- </div>
                            <div class="col-6 text-end justify-content-end">
                                <input type="text" class="form-control w-75 ms-auto" placeholder="search" aria-label="search" aria-describedby="search">
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get-supports')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'title', name: 'title'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    };


    $(document).ready(function() {
        loadTable();
    });
</script>

@endpush
