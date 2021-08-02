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
    
<div class="row">
    <div class="col-6">
        <form action="{{route('admin.property_type.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Property Type Name</label>
                            <input type="text" class="form-control" name="property_type_name" value="{{ $property_type->property_type_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Property Description</label>
                            <input type="text" class="form-control" name="property_description" value="{{ $property_type->property_description }}" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required> 
                                <option value="1" {{ $property_type->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $property_type->status == '0' ? "selected" : "" }}>Disable</option>                                                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Activated Field</label>
                        </div>

                       
                                <div style="border-style: ridge;border-width: 3px;padding: 50px;">

                                    <div id="example2Left" class="list-group mb-4 mt-3" data-id="1">

                                        @foreach(json_decode($property_type->activated_fields) as $key => $type)

                                        @if($type == 'Land Size')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="2">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Land Size</p>
                                                    <input type="hidden" name="item[]" value="Land Size"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Zoning Type')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="3">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Zoning Type</p>
                                                    <input type="hidden" name="item[]" value="Zoning Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Number Of Units')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="4">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Number Of Units</p>
                                                    <input type="hidden" name="item[]" value="Number Of Units"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Building Size')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="5">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Building Size</p>
                                                    <input type="hidden" name="item[]" value="Building Size"/>
                                                </div>
                                            </div> 
                                        @elseif($type == 'Farm Type')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="6">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Farm Type</p>
                                                    <input type="hidden" name="item[]" value="Farm Type"/>
                                                </div>
                                            </div> 
                                        @elseif($type == 'Building Type')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Building Type</p>
                                                    <input type="hidden" name="item[]" value="Building Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Open House Only')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Open House Only</p>
                                                    <input type="hidden" name="item[]" value="Open House Only"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Parking Type')    
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Parking Type</p>
                                                    <input type="hidden" name="item[]" value="Parking Type"/>
                                                </div>
                                            </div>
                                        @elseif($type == 'Beds')
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Beds</p>
                                                    <input type="hidden" name="item[]" value="Beds"/>
                                                </div>
                                            </div>
                                        @else
                                            <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                                <div>
                                                    <p class="mb-0 d-inline-flex align-items-center">
                                                    Baths</p>
                                                    <input type="hidden" name="item[]" value="Baths"/>
                                                </div>
                                            </div> 

                                        @endif                                           

                                        @endforeach 

                                    </div>
                                </div>
                            
                        
                    </div>
                </div>

                <input type="hidden" name="hidden_id" value="{{ $property_type->id }}"/>
                <a href="{{route('admin.property_type.index')}}" class="btn btn-warning pull-right ml-4">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br><br><br>
            
        </form>
    </div>

            

            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group text-center">
                            <label>Attributes</label>
                        </div>
                        <div style="border-style: ridge;border-width: 3px;padding: 40px;">
                            <div id="example2Right" class="list-group mb-4" data-id="2">                                   

                            

                               
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="2">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Land Size</p>
                                            <input type="hidden" name="item[]" value="Land Size"/>
                                        </div>
                                    </div>
                               
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="3">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Zoning Type</p>
                                            <input type="hidden" name="item[]" value="Zoning Type"/>
                                        </div>
                                    </div>
                              
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="4">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Number Of Units</p>
                                            <input type="hidden" name="item[]" value="Number Of Units"/>
                                        </div>
                                    </div>
                                
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="5">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Building Size</p>
                                            <input type="hidden" name="item[]" value="Building Size"/>
                                        </div>
                                    </div> 
                                
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="6">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Farm Type</p>
                                            <input type="hidden" name="item[]" value="Farm Type"/>
                                        </div>
                                    </div> 
                                 
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Building Type</p>
                                            <input type="hidden" name="item[]" value="Building Type"/>
                                        </div>
                                    </div>
                                  
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Open House Only</p>
                                            <input type="hidden" name="item[]" value="Open House Only"/>
                                        </div>
                                    </div>
                                  
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Parking Type</p>
                                            <input type="hidden" name="item[]" value="Parking Type"/>
                                        </div>
                                    </div>
                                
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Beds</p>
                                            <input type="hidden" name="item[]" value="Beds"/>
                                        </div>
                                    </div>
                             
                                    <div class="list-group-item d-flex align-items-center justify-content-between" data-id="7">
                                        <div>
                                            <p class="mb-0 d-inline-flex align-items-center">
                                            Baths</p>
                                            <input type="hidden" name="item[]" value="Baths"/>
                                        </div>
                                    </div> 

                                                                         

                                                

                             
                                

                            </div>
                        </div>    
                    </div>
                </div>    
            </div> 
</div>    

<br><br>


<script>
    new Sortable(example2Left, {
        group: 'shared', 
        animation: 150
    });
    new Sortable(example2Right, {
        group: 'shared',
        animation: 150
    });  
</script>   


@endsection
