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
                                                          
                                <div class="btn btn-info w-10" data-toggle="modal" data-target="#exampleModal">Explore Parameter</div>

                            </div>
                        </div>
                    </div>
                </div>

            @if(count($property_type) <= 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Property Types not found',
                    'not_found_button_caption' => null
                ])
            @else

                <div class="row mt-5">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Type Name</th>
                                <th scope="col">Fields</th>
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

    

    <!-- ad category -->
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">            

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Explore Parameter</h5>
                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">                
                                                                                    
                    <!-- <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" class="form-control mt-3" name="name" required>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="country">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
               
            </div>
        </div>
        </div>
    </form> 




@if(count($property_type) <= 0)
               
@else    

    @foreach($property_type as $key => $ad_cat)
   
        

    @endforeach    


@endif

@endsection



@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get_property_type')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'property_type_name', name: 'property_type_name'},
                {data: 'activated_fields', name: 'activated_fields'},
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