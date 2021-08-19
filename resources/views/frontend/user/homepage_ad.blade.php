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
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">Home Page Advertisemnt</h4>
                            </div>
                        </div>

                        <div class="mt-4">
                            @include('includes.partials.messages')
                        </div>

                        <div class="row align-items-center">
                            <div class="col-10">

                            </div>
                            <div class="col-2">
                               
                            @if(count($homepage_ad) >= 6)
                                <div class="btn btn-info w-10 disabled" data-toggle="modal" data-target="#exampleModal">Maximum 6 Advertisements</div>
                            @else
                                <div class="btn btn-info w-10" data-toggle="modal" data-target="#exampleModal">Add New</div>
                            @endif
                                
                            </div>
                        </div>
                    </div>
                </div>

            @if(count($homepage_ad) <= 0)
                <section id="residential-properties">
                    <div class="container text-center" style="margin-top: 10rem">
                        <p class="display-6 text-secondary">Advertisements Are Not Found!</p>
                    </div>
                </section>
            @else

                <div class="row mt-5">
                    <table class="table table-borderless table-responsive">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>                                
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order</th>
                                <th scope="col">Admin Approval</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle table-data">

                        @foreach($homepage_ad as $key=> $home_ad)

                            <tr class="align-items-center">                                
                                <td width="22%"><img src="{{url('files/homepage_advertisement/',$home_ad->image)}}" style="width: 90%;" alt="" ></td>
                                <td> {{ $home_ad->name }} </td>                        
                                <td> {{ App\Models\AdCategory::where('id',$home_ad->category)->where('admin_approval', '=', 'Approved')->first()->name }} </td>
                                <td> {{ $home_ad->status }} </td>
                                <td> {{ $home_ad->order }} </td>
                                <td> {{ $home_ad->admin_approval }} </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModaledit{{$home_ad->id}}" class="btn text-light table-btn edit" style="background-color: #4195E1">Edit</a>
                                        </div>
                                        <div class="col-6">                                            
                                            <a href="{{ route('frontend.user.homepage_AD_delete', $home_ad->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModaldelete" class="btn text-light table-btn delete" style="background-color: #FF2C4B;">Delete</a>
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

    <!-- add ad -->
    <form action="{{route('frontend.user.homepage_AD_store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">            

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertisement</h5>
                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">                
                                                                                    
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control mt-1" name="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Category:</label>
                        <select class="form-control mt-1" name="category" required>
                            <option value="" selected disabled>Select...</option>
                            @foreach($ad_category as $ad_cat)
                                <option value="{{$ad_cat->id}}">{{$ad_cat->name}}</option>
                            @endforeach
                        </select>                           
                    </div>
                    <div class="form-group mt-3">
                        <label>Image: ( dimensions = width: 600px * height: 300px )</label>
                        <div class="input-group mt-1">
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label>Link:</label>
                        <input type="url" class="form-control mt-1" name="link" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Status:</label>
                        <select class="form-control mt-2" name="status" required>        
                            <option value="Enable">Enable</option>   
                            <option value="Disable">Disable</option>                             
                        </select>                            
                    </div>
                    <div class="form-group mt-3">
                        <label>Order:</label>
                        <input type="text" class="form-control mt-1" name="order" required>
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


@if(count($homepage_ad) <= 0)
               
@else

    

    @foreach($homepage_ad as $key=> $home_ad)
   
        <div class="modal fade" id="exampleModaledit{{$home_ad->id}}" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <form action="{{route('frontend.user.homepage_AD_update',$home_ad->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Edit Advertisement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control mt-1" name="name" value="{{$home_ad->name}}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Category:</label>
                                <select class="form-control mt-1" name="category" required>
                                    <option value="" selected disabled>Select...</option>
                                    @foreach($ad_category as $ad_cat)
                                        <option value="{{$ad_cat->id}}" {{ $home_ad->category == $ad_cat->id ? "selected" : "" }}>{{$ad_cat->name}}</option>
                                    @endforeach
                                </select>                           
                            </div>
                            <div class="form-group mt-3">
                                <label>Image: ( dimensions = width: 600px * height: 300px )</label>
                                <div class="input-group mt-1">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Link:</label>
                                <input type="url" class="form-control mt-1" name="link" value="{{$home_ad->link}}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Status:</label>
                                <select class="form-control mt-2" name="status" required>        
                                    <option value="Enable" {{ $home_ad->status == 'Enable' ? "selected" : "" }}>Enable</option>   
                                    <option value="Disable" {{ $home_ad->status == 'Disable' ? "selected" : "" }}>Disable</option>                             
                                </select>                            
                            </div>
                            <div class="form-group mt-3">
                                <label>Order:</label>
                                <input type="text" class="form-control mt-1" name="order" value="{{$home_ad->order}}" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                            <input type="hidden" class="form-control" name="hidden_id" value="{{$home_ad->id}}">
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
                            <h5 class="modal-title" id="exampleModalLabeldelete">Delete Advertisement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this Advertisement?
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

