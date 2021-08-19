@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
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
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Home Page Advertisemnt Category</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">

                            </div>
                            <div class="col-4">
                               
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
                <section id="residential-properties">
                    <div class="container text-center" style="margin-top: 8rem">
                        <p class="display-6 text-secondary">Categories Are Not Found!</p>
                    </div>
                </section>
            @else

                <div class="row mt-5">
                    <table class="table table-borderless table-responsive">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Admin Approval</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">

                        @foreach($ad_category as $key=> $ad_cat)

                            <tr class="align-items-center">
                                <td> {{ $ad_cat->name }} </td>
                                <td> {{ $ad_cat->admin_approval }} </td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{$ad_cat->id}}" class="btn text-light table-btn edit" style="background-color: #4195E1">Edit Name</a>
                                        </div>
                                        <div class="col-4">                                            
                                            <a href="{{ route('frontend.user.adCategory_delete', $ad_cat->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModaldelete" class="btn text-light table-btn delete" style="background-color: #FF2C4B;">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach 
                            
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
                        <label>Category Name</label>
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
                                <label>Category Name</label>
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
    

       
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endif

@endsection

