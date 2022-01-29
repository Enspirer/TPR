@extends('backend.layouts.app')

@section('title', __('Home Banner'))

@section('content')
    <form action="{{route('admin.country.home_bannerUpdate')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        
                        <div class="form-group">
                            <label class="mb-3">{{ $country->country_name}} Home Page Image <span class="text-danger">*</span></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="home_banner" value="{{ $country->home_banner}}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <input type="hidden" name="hidden_id" value="{{ $country->id }}"/>
                            <a href="{{route('admin.country.index')}}" class="btn btn-info rounded-pill text-light px-4 py-2">Back</a>&nbsp;&nbsp;
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                        </div>
                        
                    </div>
                </div>
            </div><br>

           
        </div>

    </form>

<br><br>
@endsection
