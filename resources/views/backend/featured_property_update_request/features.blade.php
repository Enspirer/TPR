@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')

<style>
.list-group .list-group-item {
    border-radius: 0;
    cursor: move;
}
.list-group .list-group-item:hover {
    background-color:#dcdada;
}
</style>

<!-- <div class="form-group">
            <div class="row m-0">
              
              @if(session()->has('error'))
                  <div class="alert alert-danger">
                      {{ session()->get('error') }}
                  </div>
              @endif
                                      
            </div>
          </div> -->
<form action="{{ route('admin.fpur.update') }}" method="POST">
    <div class="row">
    
        {{csrf_field()}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        
                            @if(json_decode($fpur->key) != null)
                            <div class="row">
                                <div class="col-4">
                                    <h4><b>Feature Title: </b></h4> 
                                </div>
                                <div class="col-8">
                                    <h4>{{ json_decode($fpur->key)['0']->title }}</h4>
                                </div>
                            </div>
                            @else
                                <!-- <input type="text" class="form-control" name="featureTitle1" value="" required> -->
                            @endif
                        
                    </div>                   

                    <div class="properties1">
                        @if(json_decode($fpur->key) != null)
                            @if(json_decode($fpur->key)[0]->properties != null)
                                @foreach(json_decode($fpur->key)[0]->properties as $prop)
                                    @if(App\Models\Properties::where('id', $prop)->first() == null)
                                        <div class="row border mt-2">
                                            <h4 align="center" style="color:grey; margin: 30px 0 30px 0;">Property Not Found!</h4>
                                        </div>
                                    @else
                                        <div class="row border align-items-center p-1 mt-2 property-row">
                                            <div class="col-6">
                                                <img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-9">
                                                        <input type="hidden" name="properties1[]" value="{{ $prop }}" required>
                                                    </div>
                                                </div>
                                                
                                                <p class="fw-bold mb-0">{{ App\Models\Properties::where('id', $prop)->first()->name }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>
                                            </div>                                        
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">


                        @if(json_decode($fpur->key) != null)
                            <div class="row">
                                <div class="col-4">
                                    <h4><b>Feature Title: </b></h4> 
                                </div>
                                <div class="col-8">
                                    <h4>{{ json_decode($fpur->key)['1']->title }}</h4>
                                </div>
                            </div>
                        @else
                                <!-- <input type="text" class="form-control" name="featureTitle1" value="" required> -->
                        @endif

                    </div>


                    <div class="properties2">
                        @if(json_decode($fpur->key) != null)
                            @if(json_decode($fpur->key)[1]->properties != null)
                                @foreach(json_decode($fpur->key)[1]->properties as $prop)
                                    @if(App\Models\Properties::where('id', $prop)->first() == null)
                                        <div class="row border mt-2">
                                            <h4 align="center" style="color:grey; margin: 30px 0 30px 0;">Property Not Found!</h4>
                                        </div>
                                    @else
                                        <div class="row border align-items-center p-1 mt-2 property-row">
                                            <div class="col-6">
                                                <img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-9">
                                                        <input type="hidden" name="properties2[]" value="{{ $prop }}" required>
                                                    </div>
                                                </div>
                                                
                                                <p class="fw-bold mb-0">{{ App\Models\Properties::where('id', $prop)->first()->name }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: {{ App\Models\Properties::where('id', $prop)->first()->transaction_type }}</p>
                                                <p class="mb-0" style="font-size: 0.8rem;">Country: {{ App\Models\Properties::where('id', $prop)->first()->country }}</p>
                                            </div>                                        
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-4">
            <h4>Admin Approval</h4>
            <select class="form-control mt-3" name="admin_approval" required>
                <option value="Approved" {{ $fpur->admin_approval == 'Approved' ? "selected" : "" }}>Approve</option>   
                <option value="Disapproved" {{ $fpur->admin_approval == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                <option value="Pending" {{ $fpur->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                               
            </select>
        </div>

        <div class="mt-3 mb-5">
            <button type="submit" class="btn btn-success pull-right px-5 py-2 fs-6">Update</button><br>
            <input type="hidden" class="form-control" name="hidden_id" value="{{ $fpur->id }}" required>
        </div>
    
    </div>
</form>



@endsection
