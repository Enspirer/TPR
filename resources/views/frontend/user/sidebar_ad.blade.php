@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush


@if ( session()->has('message') )


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
                <div class="row justify-content-between mt-4">

                    <div class="container-fluid jumbotron text-center" style="background-color: #c6e4ee; border-radius: 15px 50px;">
                    <h1 style="margin-top:60px;" class="display-5">Succesfully Created!</h1><br>
                        <!-- <p class="lead"><h3>Your request is sent. One of our member will get back in touch with you soon!<br><br> Have a great day!</h3></p> -->
                        <hr><br>    
                        <p class="lead">
                            <a class="btn btn-success btn-md" href="{{url('/')}}" role="button">Go Back to Home Page</a>
                        </p>
                        <br>
                    </div>

                </div>                
            </div>
        </div>
    </div>


@else

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
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Sidebar Advertisement</h4>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <!-- <h4>Advertisement</h4> -->
                            <!-- class="needs-validation" novalidate -->
                        
                            <form action="{{route('frontend.user.agent.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="row" align="center">
                                    <div class="col-6">
                                        <div class="card" style="border-style: dashed;border-width: 1px;padding: 10px; border-color:black;">
                                            <div class="card-body">

                                            @if($ad1 == null)
                                                <button type="button" class="btn btn-info px-5" data-toggle="modal" data-target="#exampleModal" style="padding:30px 30px 30px 30px">
                                                Advertisement 1
                                                </button>
                                            @else

                                                <div class="form-group">
                                                    <a href="#"><img src="{{url('files/sidebar_ad',$ad1->image)}}" style="object-fit:cover; width:70%;" height="100%" alt="" data-toggle="modal" data-target="#exampleModalEdit1"></a>
                                                </div>                                            

                                                   <b>Title:</b> <p>{{ $ad1->title }}</p>
                                                   <b>Description:</b><p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $ad1->description }}</p>   
                                                   <b>Status:</b> 
                                                   <p>@if( $ad1->status == 1 ) Enabled 
                                                       @else Disabled 
                                                       @endif
                                                    </p>

                                            <a href="#" class="btn btn-danger pull-right" data-toggle="modal" data-target="#exampleModalDelete1">Delete</a>


                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card" style="border-style: dashed;border-width: 1px;padding: 10px; border-color:black;">
                                            <div class="card-body">                                            

                                            @if($ad2 == null)
                                                <button type="button" class="btn btn-info px-5" data-toggle="modal" data-target="#exampleModal2" style="padding:30px 30px 30px 30px">
                                                Advertisement 2
                                                </button>
                                            @else
                                                <div class="form-group">
                                                    <a href="#"><img src="{{url('files/sidebar_ad',$ad2->image)}}" style="object-fit:cover; width:70%;" height="100%" alt="" data-toggle="modal" data-target="#exampleModalEdit2"></a>
                                                </div>                                           

                                                   <b>Title:</b> <p>{{ $ad2->title }}</p>
                                                   <b>Description:</b><p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $ad2->description }}</p>   
                                                   <b>Status:</b> 
                                                   <p>@if( $ad2->status == 1 ) Enabled 
                                                       @else Disabled 
                                                       @endif
                                                    </p>

                                            <a href="" class="btn btn-danger pull-right" data-toggle="modal" data-target="#exampleModalDelete2">Delete</a>

                                            @endif
                                                
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    <!-- ad 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertisement 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label>Adaverisement Image </label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                                                                
                    <div class="form-group">
                        <label>Advertisement Title:</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link:</label>
                        <input type="text" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1">Enable</option>   
                            <option value="0">Disable</option>                                
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="ad_position" value="ad1">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>    
        </div>
    </div>
    </div>

    <!-- ad 2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Advertisement 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">            
                    <div class="form-group">
                        <label>Adaverisement Image </label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                                                                
                    <div class="form-group">
                        <label>Advertisement Title:</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link:</label>
                        <input type="text" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1">Enable</option>   
                            <option value="0">Disable</option>                                
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="ad_position" value="ad2">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>    
        </div>
    </div>
    </div>
   

    <!-- ad 1 edit-->
    <div class="modal fade" id="exampleModalEdit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        
            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelEdit1">Edit Advertisement 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label>Adaverisement Image </label>
                        <input type="file" class="form-control" name="image">
                        <br>
                        <img src="{{url('files/sidebar_ad',$ad1->image)}}" style="object-fit:cover; width:50%;" alt="">

                    </div>
                                                                
                    <div class="form-group">
                        <label>Advertisement Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $ad1->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3" required>{{ $ad1->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Link:</label>
                        <input type="text" class="form-control" name="link" value="{{ $ad1->link }}" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1" {{ $ad1->status == '1' ? "selected" : "" }}>Enable</option>   
                            <option value="0" {{ $ad1->status == '0' ? "selected" : "" }}>Disable</option>                                
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="ad_position" value="ad1">
                    <input type="hidden" class="form-control" name="hidden_id" value="{{ $ad1->id }}">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
            </form> 
            
        </div>
    </div>
    </div>

    <!-- ad 2 edit-->
    <div class="modal fade" id="exampleModalEdit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelEdit2">Edit Advertisement 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                
                    <div class="form-group">
                        <label>Adaverisement Image </label>
                        <input type="file" class="form-control" name="image">
                        <br>
                        <img src="{{url('files/sidebar_ad',$ad2->image)}}" style="object-fit:cover; width:50%;" alt="">

                    </div>
                                                                
                    <div class="form-group">
                        <label>Advertisement Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $ad2->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3" required>{{ $ad2->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Link:</label>
                        <input type="text" class="form-control" name="link" value="{{ $ad2->link }}" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1" {{ $ad2->status == '1' ? "selected" : "" }}>Enable</option>   
                            <option value="0" {{ $ad2->status == '0' ? "selected" : "" }}>Disable</option>                                
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" class="form-control" name="ad_position" value="ad2">
                    <input type="hidden" class="form-control" name="hidden_id" value="{{ $ad2->id }}">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
            </form> 
            
        </div>
    </div>
    </div>

    <!-- ad 1 delete-->
    <div class="modal fade" id="exampleModalDelete1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_delete',$ad1->id)}}" method="get" enctype="multipart/form-data">
                
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Are you sure you want to remove advertisement 1?</h5>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                   
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form> 
            
        </div>
    </div>
    </div>

    <!-- ad 2 delete-->
    <div class="modal fade" id="exampleModalDelete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <form action="{{route('frontend.user.sidebar_ad.sidebarAD_delete',$ad2->id)}}" method="get" enctype="multipart/form-data">
                
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Are you sure you want to remove advertisement 2?</h5>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                   
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form> 
            
        </div>
    </div>
    </div>

    



<script>
        
    $(function() {
        $( "#validate" ).change(function() {  
            validate();
        });
        function validate() {
            $('.form-validate-div').hide();
            var divKey = $( "#validate option:selected" ).val();                
            $('#divFrm'+divKey).show();

            $('.form-image-div').hide();
            var divKey = $( "#validate option:selected" ).val();                
            $('#img'+divKey).show();
        }       
        validate();
    });
    

    // function validateForm() {
    //     let x = document.forms["myForm"]["nic"].value;
    //     if (x == "") {
    //         alert("NIC Number must be filled out");
    //         return false;
    //     }
    // }

</script>

<!-- <script>
    $(document).ready(function(){
        $("form").submit(function(){
        alert("Submitted");
        });
    });
</script> -->





@endif

@endsection

