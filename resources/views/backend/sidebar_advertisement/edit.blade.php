@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')



<form action="{{route('admin.sidebar_advertisement.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                                <img src="{{url('files/sidebar_ad',$sidebar_advertisement->image)}}" class="img-fluid border border-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-5">
                                        
                                        <div class="row mt-4 pe-0">
                                            <div class="col-12">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" style="font-weight: 600; font-size:16px;">Title: </td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600; font-size:16px;">Link:</td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->link }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600; font-size:16px;">Country:</td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600; font-size:16px;">Status:</td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600; font-size:16px;">Ad Type:</td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->other }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600; font-size:16px;">Description:</td>
                                                            <td style="font-size:16px;">{{ $sidebar_advertisement->description }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="admin_approval" required>
                                    <option value="Approved" {{ $sidebar_advertisement->admin_approval == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $sidebar_advertisement->admin_approval == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $sidebar_advertisement->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $sidebar_advertisement->id }}"/>
                                <a href="{{route('admin.sidebar_advertisement.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<br><br>
@endsection
