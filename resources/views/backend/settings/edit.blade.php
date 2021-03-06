@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">

                    @if($settings->type =='text_field')
                        <div class="form-group">
                            <label>Text</label>
                            <input type="text" class="form-control" name="{{ $settings->name }}" value="{{ $settings->static_value }}">
                        </div>
                    @elseif($settings->type == 'text_area')
                        <div class="form-group">
                            <label>Text area</label>
                            <textarea class="form-control" name="{{ $settings->name }}" rows="5">{{ $settings->static_value }}</textarea>
                        </div>
                    @elseif($settings->type == 'dropdown')
                        <div class="form-group">
                            <label>Drop down</label>
                            <select class="form-control" name="{{ $settings->name }}"> 
                                <option value="Enable" {{ $settings->static_value == 'Enable' ? "selected" : "" }}>Enable</option>   
                                <option value="Disable" {{ $settings->static_value == 'Disable' ? "selected" : "" }}>Disable</option>                                                                    
                            </select>
                        </div>  
                    @else
                        <div class="form-check">
                            <input class="form-check-input" name="{{ $settings->name }}" value="{{ $settings->static_value }}" type="checkbox">
                            <label>Default checkbox</label>
                        </div>
                    @endif
                        
                </div>
            </div>

            <input type="hidden" name="hidden_id" value="{{ $settings->id }}"/>
            <a href="{{route('admin.settings.index')}}" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            
        </form>
    </div>         

            
</div>    

<br><br>



@endsection
