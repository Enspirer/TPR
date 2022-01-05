@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <h4 class="fs-4 fw-bolder user-settings-head mb-3">Saved Search History</h4>

                        <div class="form-group">
                            <div class="row">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif                                                    
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">                            

                            <table class="table table-responsive" id="villadatatable" style="width:100%">
                                <thead class="table-head">
                                    <tr>
                                        <th width="60%" scope="col">Date</th>
                                        <th width="60%" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle table-data">

                                </tbody>
                            </table>                           

                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>



<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.search_history_get_details')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'created_at', name: 'created_at'},
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




@endsection

