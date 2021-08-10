@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
                        
                            <!-- <form action="{{route('frontend.user.agent.store')}}" method="post" enctype="multipart/form-data" > -->
                            <!-- {{csrf_field()}} -->
                                <div class="row">
                                    <div class="col-12">
                                            @if($ad1 == null)
                                            <div class="card" style="border-style: dashed;border-width: 1px; border-color:black;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-info px-5" data-toggle="modal" data-target="#exampleModal" style="padding:40px 0px 40px 0px; width:100%">
                                                    Advertisement 1
                                                    </button>
                                                </div>
                                            </div>                                                                        
                                            @else
                                            <div class="card" style="border-style: solid;border-width: 1px;padding: 10px; border-color:black;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <img src="{{url('files/sidebar_ad',$ad1->image)}}" style="object-fit:cover; width:100%; margin-top:20px;" height="150px" alt="">
                                                            </div> 
                                                        </div>
                                                        <div class="col-8">

                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">  
                                                                    <p align="left"><b>Title:</b> </p>  
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">  
                                                                    <p align="left">{{ $ad1->title }}</p> 
                                                                    <hr>                
                                                                </td>
                                                            </tr>
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">
                                                                    <p align="left"><b>Status:</b> </p>
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">     
                                                                    <p align="left">@if( $ad1->status == 1 ) Enabled 
                                                                                    @else Disabled 
                                                                                    @endif
                                                                    </p>  
                                                                    <hr>         
                                                                </td>
                                                            </tr>
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">  
                                                                    <p align="left"><b>Description:</b> </p>  
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">  
                                                                    <p align="left" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $ad1->description }}</p> 
                                                                    <hr>                
                                                                </td>
                                                            </tr>                                                    
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">   
                                                                    <!-- <p align="left"></p> -->
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0" align="right">
                                                                    <a href="#" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#exampleModalEdit1">Edit</a>
                                                                    <a href="#" class="btn btn-danger pull-right" data-toggle="modal" data-target="#exampleModalDelete1">Delete</a>            
                                                                </td>
                                                            </tr>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            
                                    </div>
                                </div>  
                                <br>

                                <div class="row">
                                    <div class="col-12">
                                            @if($ad2 == null)
                                            <div class="card" style="border-style: dashed;border-width: 1px; border-color:black;">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-info px-5" data-toggle="modal" data-target="#exampleModal2" style="padding:40px 0px 40px 0px; width:100%">
                                                    Advertisement 2
                                                    </button>
                                                </div>
                                            </div>                                                                        
                                            @else
                                            <div class="card" style="border-style: solid;border-width: 1px;padding: 10px; border-color:black;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <img src="{{url('files/sidebar_ad',$ad2->image)}}" style="object-fit:cover; width:100%; margin-top:20px;" height="150px" alt="">
                                                            </div> 
                                                        </div>
                                                        <div class="col-8">

                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">  
                                                                    <p align="left"><b>Title:</b> </p>  
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">  
                                                                    <p align="left">{{ $ad2->title }}</p> 
                                                                    <hr>                
                                                                </td>
                                                            </tr>
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">
                                                                    <p align="left"><b>Status:</b> </p>
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">     
                                                                    <p align="left">@if( $ad2->status == 1 ) Enabled 
                                                                                    @else Disabled 
                                                                                    @endif
                                                                    </p>  
                                                                    <hr>         
                                                                </td>
                                                            </tr>
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">  
                                                                    <p align="left"><b>Description:</b> </p>  
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0">  
                                                                    <p align="left" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $ad2->description }}</p> 
                                                                    <hr>                
                                                                </td>
                                                            </tr>                                                    
                                                            <tr>            
                                                                <td width="23%" cellpadding="0" cellspacing="0">   
                                                                    <!-- <p align="left"></p> -->
                                                                </td>
                                                                <td  cellpadding="0" cellspacing="0" align="right">
                                                                    <a href="#" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#exampleModalEdit2">Edit</a>
                                                                    <a href="#" class="btn btn-danger pull-right" data-toggle="modal" data-target="#exampleModalDelete2">Delete</a>            
                                                                </td>
                                                            </tr>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            
                                    </div>
                                </div> 
        <div>
    </div>        


    <!-- ad 1 -->
    <form action="{{route('frontend.user.sidebar_ad.sidebarAD_store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">

            

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
                    <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
               
            </div>
        </div>
        </div>
    </form> 

    <!-- ad 2 -->
    <form action="{{route('frontend.user.sidebar_ad.sidebarAD_store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">
            
                
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
                    <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>              
            </div>
        </div>
        </div>
    </form>      
  
    <!-- ad 1 edit-->
    @if($ad1 == null)
                                             
    @else
    <form action="{{route('frontend.user.sidebar_ad.sidebarAD_update')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

        <div class="modal fade" id="exampleModalEdit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">            

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
                    <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>            
            
            </div>
        </div>
        </div>
    </form>     
    @endif

    <!-- ad 2 edit-->
    @if($ad2 == null)
                                             
    @else
    <form action="{{route('frontend.user.sidebar_ad.sidebarAD_update')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="modal fade" id="exampleModalEdit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="font-size:15px;">

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
                    <input type="hidden" class="form-control" name="country" value="{{ $country->country_name }}">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
             
            
            </div>
        </div>
        </div>
    </form>    
    @endif

    <!-- ad 1 delete-->
    @if($ad1 == null)
                                             
    @else
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
    @endif

    <!-- ad 2 delete-->
    @if($ad2 == null)
                                             
    @else
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
    @endif


@endsection

