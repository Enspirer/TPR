@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
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
                            <div class="col-7">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Home Page Advertisement Category</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">

                            </div>
                            <div class="col-4 text-end">
                               
                            @if(count($ad_category) >= 6)
                                <div class="btn btn-info w-10 disabled" data-toggle="modal" data-target="#exampleModal">Maximum 6 Categories</div>
                            @else
                                <div class="btn btn-info w-10" data-toggle="modal" data-target="#exampleModal">Add New</div>
                            @endif
                                
                            </div>
                        </div>
                    </div>
                </div>

            @if(count($ad_category) <= 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Categories not found',
                    'not_found_description' => 'Please add categories',
                    'not_found_button_caption' => null
                ])
            @else

                <div class="row mt-5">
                    <table class="table table-responsive" id="villadatatable" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Admin Approval</th>
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

    <!-- ad category -->
    <form action="{{route('frontend.user.adCategory_store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">            

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertisement Category</h5>
                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">                
                                                                                    
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" class="form-control mt-3" name="name" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
               
            </div>
        </div>
        </div>
    </form> 


@if(count($ad_category) <= 0)
               
@else

    

    @foreach($ad_category as $key => $ad_cat)
   
        <div class="modal fade" id="exampleModaledit{{$ad_cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <form action="{{route('frontend.user.adCategory_update',$ad_cat->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Category Name:</label>
                                <input type="text" class="form-control mt-3" name="name" value="{{$ad_cat->name}}" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                            <input type="hidden" class="form-control" name="hidden_id" value="{{$ad_cat->id}}">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>     
                    </div>
                </div>
            </div>

        @endforeach    




        <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabeldelete" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeldelete">Delete Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this Category?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endif

@endsection



@push('after-scripts')
<script>
    function loadTable() {
        var table = $('#villadatatable').DataTable({
            processing: true,
            ajax: "{{route('frontend.user.get_ad_category')}}",
            serverSide: true,
            responsive: true,
            autoWidth: true,
            order: [[0, "desc"]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'admin_approval', name: 'admin_approval'},
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