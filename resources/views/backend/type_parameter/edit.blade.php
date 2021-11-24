@extends('backend.layouts.app')

@section('title', __('Status Property Type Parameter'))

@section('content')
    
    <form action="{{route('admin.property_parameter.update')}}" method="post" enctype="multipart/form-data" id="create_formInit">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8 p-1">
                <div class="card">
                    <form action="{{route('admin.property_parameter.update')}}" method="post"  id="create_formInit">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div id="build-wrap"></div><br><br>
                            <input type="hidden" name="property_type_form_data" value="{!! json_encode($type_parameter_decode) !!}" id="output_data" oninvalid="tabInvalied('register_formTabs')" required>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $type_parameter->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $type_parameter->status == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $type_parameter->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $type_parameter->id }}"/>
                                <a href="{{route('admin.property_parameter.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>
        jQuery($ => {
            const fbTemplate = document.getElementById('build-wrap');
            var options = {
                showActionButtons: false ,// defaults: `true`
                typeUserEvents: {
                    text: {
                        onAddField: function(fld) {
                            console.log('aaaa');
                        }
                    }},
                formData: '{!! json_encode($type_parameter_decode) !!}'
            };
            var final_out = $(fbTemplate).formBuilder(options);

            $('#create_formInit').submit(function() {
                $('#output_data').val(final_out.actions.getData('json'));
            });
        });
    </script>
    @endpush


<br><br>
@endsection
