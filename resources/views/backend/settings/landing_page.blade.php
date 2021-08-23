@extends('backend.layouts.app')

@section('title', __('Landing Page'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.landing_page_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">   
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Landing Page Country Section 1</label>

                                <select class="form-control" name="psection1" required> 
                                        <option disabled selected value="">Select..</option>
                                    @foreach($country_list as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach                                                                 
                                </select>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Landing Page Country Section 2</label>
                                <select class="form-control" name="psection2" required>
                                        <option disabled selected value="">Select..</option> 
                                    @foreach($country_list as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach                                                                    
                                </select>
                            </div> 
                        </div>
                    </div>               
                                                 
                </div>
            </div>

            <!-- <input type="hidden" name="hidden_id" value=""/> -->
            <div class="text-center mt-5">
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            </div>
        </form>
    </div>         

            
</div>    

<br><br>



@endsection
