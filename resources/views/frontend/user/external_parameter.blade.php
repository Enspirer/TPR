@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
@endpush


<div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between mb-5">
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="fs-4 fw-bolder user-settings-head mb-0">External Parameter</h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">

                            </div>
                            <div class="col-4 text-end">
                                                          
                                
                            </div>
                        </div>
                    </div>
                </div>
    
            @if($type_parameter_id == null)
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <form action="{{route('frontend.user.external_parameter_store')}}" method="post"  id="create_formInit">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div id="build-wrap"></div><br><br>
                                    <input type="hidden" name="property_type_form_data" value="{!! json_encode($type_parameter_decode) !!}" id="output_data" oninvalid="tabInvalied('register_formTabs')" required>
                                    <input type="hidden" name="type_parameter_id" value="{{$type_parameter_id}}">
                                    <input type="hidden" name="property_type" value="{{$property_type->id}}">
                                    <button type="submit" class="btn btn-success" name="">Save</button>
                                </div>
                            </form>
                        </div><!--card-->
                    </div><!--col-->
                </div><!--row-->
            @else
            <div style="border:1px solid red; text-align:center" class="mb-4 p-1">
                <h6 style="color:red" class="mb-2 mt-1">Warning!</h6><h6 class="mb-1" style="font-size:15px;"> You can change the form. But you should have to wait until admin approval.</h6>
            </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <form action="{{route('frontend.user.external_parameter_store')}}" method="post"  id="create_formInit">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div id="build-wrap"></div><br><br>
                                    <input type="hidden" name="property_type_form_data" value="{!! json_encode($type_parameter_decode) !!}" id="output_data" oninvalid="tabInvalied('register_formTabs')" required>
                                    <input type="hidden" name="type_parameter_id" value="{{$type_parameter_id}}">
                                    <input type="hidden" name="property_type" value="{{$property_type->id}}">
                                    <button type="submit" class="btn btn-success" name="">Update</button>
                                </div>
                            </form>
                        </div><!--card-->
                    </div><!--col-->
                </div><!--row-->
            @endif

               
            </div>
        </div>
    </div>

    


@endsection



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