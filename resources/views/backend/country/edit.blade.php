@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.country.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="country_name" class="form-label">Country Name</label> <br>
                            <select class="form-select w-100 p-1" aria-label="Default select example" id="country_name" name="country_name" required>
                            <option selected>Select Country</option>
                                <option value="Angola" {{ $country->country_name == 'Angola' ? "selected" : "" }}>Angola</option>
                                <option value="Anguilla" {{ $country->country_name == 'Anguilla' ? "selected" : "" }}>Anguilla</option>
                                <option value="Antigua and Barbuda" {{ $country->country_name == 'Antigua and Barbuda' ? "selected" : "" }}>Antigua and Barbuda</option>
                                <option value="Aruba" {{ $country->country_name == 'Aruba' ? "selected" : "" }}>Aruba</option>
                                <option value="Bahamas" {{ $country->country_name == 'Bahamas' ? "selected" : "" }}>Bahamas</option>
                                <option value="Barbados" {{ $country->country_name == 'Barbados' ? "selected" : "" }}>Barbados</option>
                                <option value="Belize" {{ $country->country_name == 'Belize' ? "selected" : "" }}>Belize</option>
                                <option value="Benin" {{ $country->country_name == 'Benin' ? "selected" : "" }}>Benin</option>
                                <option value="Bolivia" {{ $country->country_name == 'Bolivia' ? "selected" : "" }}>Bolivia</option>
                                <option value="Brazil" {{ $country->country_name == 'Brazil' ? "selected" : "" }}>Brazil</option>
                                <option value="British Virgin Islands" {{ $country->country_name == 'British Virgin Islands' ? "selected" : "" }}>British Virgin Islands</option>
                                <option value="Brunei" {{ $country->country_name == 'Brunei' ? "selected" : "" }}>Brunei</option>
                                <option value="Burkina Faso" {{ $country->country_name == 'Burkina Faso' ? "selected" : "" }}>Burkina Faso</option>
                                <option value="Burma" {{ $country->country_name == 'Burma' ? "selected" : "" }}>Burma</option>
                                <option value="Burundi" {{ $country->country_name == 'Burundi' ? "selected" : "" }}>Burundi</option>
                                <option value="Cambodia" {{ $country->country_name == 'Cambodia' ? "selected" : "" }}>Cambodia</option>
                                <option value="Cameroon" {{ $country->country_name == 'Cameroon' ? "selected" : "" }}>Cameroon</option>
                                <option value="Cayman Islands" {{ $country->country_name == 'Cayman Islands' ? "selected" : "" }}>Cayman Islands</option>
                                <option value="Central African Republic" {{ $country->country_name == 'Central African Republic' ? "selected" : "" }}>Central African Republic</option>
                                <option value="Chad" {{ $country->country_name == 'Chad' ? "selected" : "" }}>Chad</option>
                                <option value="Colombia" {{ $country->country_name == 'Colombia' ? "selected" : "" }}>Colombia</option>
                                <option value="Comoros" {{ $country->country_name == 'Comoros' ? "selected" : "" }}>Comoros</option>
                                <option value="Congo" {{ $country->country_name == 'Congo' ? "selected" : "" }}>Congo</option>
                                <option value="Costa Rica" {{ $country->country_name == 'Costa Rica' ? "selected" : "" }}>Costa Rica</option>
                                <option value="Cuba" {{ $country->country_name == 'Cuba' ? "selected" : "" }}>Cuba</option>
                                <option value="Democratic Republic of Congo" {{ $country->country_name == 'Democratic Republic of Congo' ? "selected" : "" }}>Democratic Republic of Congo</option>
                                <option value="Djibouti" {{ $country->country_name == 'Djibouti' ? "selected" : "" }}>Djibouti</option>
                                <option value="Dominica" {{ $country->country_name == 'Dominica' ? "selected" : "" }}>Dominica</option>
                                <option value="Dominican Republic" {{ $country->country_name == 'Dominican Republic' ? "selected" : "" }}>Dominican Republic</option>
                                <option value="East Timor" {{ $country->country_name == 'East Timor' ? "selected" : "" }}>East Timor</option>
                                <option value="Ecuador" {{ $country->country_name == 'Ecuador' ? "selected" : "" }}>Ecuador</option>
                                <option value="El Salvador" {{ $country->country_name == 'El Salvador' ? "selected" : "" }}>El Salvador</option>
                                <option value="Equatorial Guinea" {{ $country->country_name == 'Equatorial Guinea' ? "selected" : "" }}>Equatorial Guinea</option>
                                <option value="Eritrea" {{ $country->country_name == 'Eritrea' ? "selected" : "" }}>Eritrea</option>
                                <option value="Ethiopia" {{ $country->country_name == 'Ethiopia' ? "selected" : "" }}>Ethiopia</option>
                                <option value="French Guiana" {{ $country->country_name == 'French Guiana' ? "selected" : "" }}>French Guiana</option>
                                <option value="Gabon" {{ $country->country_name == 'Gabon' ? "selected" : "" }}>Gabon</option>
                                <option value="Galapagos Islands"{{ $country->country_name == 'Galapagos Islands' ? "selected" : "" }}>Galapagos Islands</option>
                                <option value="Gambia" {{ $country->country_name == 'Gambia' ? "selected" : "" }}>Gambia</option>
                                <option value="Grenada" {{ $country->country_name == 'Grenada' ? "selected" : "" }}>Grenada</option>
                                <option value="Guadeloupe" {{ $country->country_name == 'Guadeloupe' ? "selected" : "" }}>Guadeloupe</option>
                                <option value="Guatemala" {{ $country->country_name == 'Guatemala' ? "selected" : "" }}>Guatemala</option>
                                <option value="Guinea" {{ $country->country_name == 'Guinea' ? "selected" : "" }}>Guinea</option>
                                <option value="Guinea-Bissau" {{ $country->country_name == 'Guinea-Bissau' ? "selected" : "" }}>Guinea-Bissau</option>
                                <option value="Guyana" {{ $country->country_name == 'Guyana' ? "selected" : "" }}>Guyana</option>
                                <option value="Haiti" {{ $country->country_name == 'Haiti' ? "selected" : "" }}>Haiti</option>
                                <option value="Honduras" {{ $country->country_name == 'Honduras' ? "selected" : "" }}>Honduras</option>
                                <option value="India" {{ $country->country_name == 'India' ? "selected" : "" }}>India</option>
                                <option value="Indonesia" {{ $country->country_name == 'Indonesia' ? "selected" : "" }}>Indonesia</option>
                                <option value="Ivory Coast" {{ $country->country_name == 'Ivory Coast' ? "selected" : "" }}>Ivory Coast</option>
                                <option value="Jamaica" {{ $country->country_name == 'Jamaica' ? "selected" : "" }}>Jamaica</option>
                                <option value="Kenya" {{ $country->country_name == 'Kenya' ? "selected" : "" }}>Kenya</option>
                                <option value="Laos" {{ $country->country_name == 'Laos' ? "selected" : "" }}>Laos</option>
                                <option value="Liberia" {{ $country->country_name == 'Liberia' ? "selected" : "" }}>Liberia</option>
                                <option value="Madagascar" {{ $country->country_name == 'Madagascar' ? "selected" : "" }}>Madagascar</option>
                                <option value="Malawi" {{ $country->country_name == 'Malawi' ? "selected" : "" }}>Malawi</option>
                                <option value="Malaysia" {{ $country->country_name == 'Malaysia' ? "selected" : "" }}>Malaysia</option>
                                <option value="Mali" {{ $country->country_name == 'Mali' ? "selected" : "" }}>Mali</option>
                                <option value="Martinique" {{ $country->country_name == 'Martinique' ? "selected" : "" }}>Martinique</option>
                                <option value="Mauritania" {{ $country->country_name == 'Mauritania' ? "selected" : "" }}>Mauritania</option>
                                <option value="Mauritius" {{ $country->country_name == 'Mauritius' ? "selected" : "" }}>Mauritius</option>
                                <option value="Mayotte" {{ $country->country_name == 'Mayotte' ? "selected" : "" }}>Mayotte</option>
                                <option value="Mexico" {{ $country->country_name == 'Mexico' ? "selected" : "" }}>Mexico</option>
                                <option value="Montserrat" {{ $country->country_name == 'Montserrat' ? "selected" : "" }}>Montserrat</option>
                                <option value="Mozambique" {{ $country->country_name == 'Mozambique' ? "selected" : "" }}>Mozambique</option>
                                <option value="Netherlands Antilles" {{ $country->country_name == 'Netherlands Antilles' ? "selected" : "" }}>Netherlands Antilles</option>
                                <option value="Nicaragua" {{ $country->country_name == 'Nicaragua' ? "selected" : "" }}>Nicaragua</option>
                                <option value="Niger" {{ $country->country_name == 'Niger' ? "selected" : "" }}>Niger</option>
                                <option value="Nigeria" {{ $country->country_name == 'Nigeria' ? "selected" : "" }}>Nigeria</option>
                                <option value="Panama" {{ $country->country_name == 'Panama' ? "selected" : "" }}>Panama</option>
                                <option value="Paraguay" {{ $country->country_name == 'Paraguay' ? "selected" : "" }}>Paraguay</option>
                                <option value="Peru" {{ $country->country_name == 'Peru' ? "selected" : "" }}>Peru</option>
                                <option value="Philippines" {{ $country->country_name == 'Philippines' ? "selected" : "" }}>Philippines</option>
                                <option value="Puerto Rico" {{ $country->country_name == 'Puerto Rico' ? "selected" : "" }}>Puerto Rico</option>
                                <option value="Reunion" {{ $country->country_name == 'Reunion' ? "selected" : "" }}>Reunion</option>
                                <option value="Rwanda" {{ $country->country_name == 'Rwanda' ? "selected" : "" }}>Rwanda</option>
                                <option value="Saint Barthelemy" {{ $country->country_name == 'Saint Barthelemy' ? "selected" : "" }}>Saint Barthelemy</option>
                                <option value="Saint Helena" {{ $country->country_name == 'Saint Helena' ? "selected" : "" }}>Saint Helena</option>
                                <option value="Saint Kitts and Nevis" {{ $country->country_name == 'Saint Kitts and Nevis' ? "selected" : "" }}>Saint Kitts and Nevis</option>
                                <option value="Saint Lucia" {{ $country->country_name == 'Saint Lucia' ? "selected" : "" }}>Saint Lucia</option>
                                <option value="Saint Martin" {{ $country->country_name == 'Saint Martin' ? "selected" : "" }}>Saint Martin</option>
                                <option value="Saint Vincent and the Grenadines" {{ $country->country_name == 'Saint Vincent and the Grenadines' ? "selected" : "" }}>Saint Vincent and the Grenadines</option>
                                <option value="Sao Tome and Principe" {{ $country->country_name == 'Sao Tome and Principe' ? "selected" : "" }}>Sao Tome and Principe</option>
                                <option value="Senegal" {{ $country->country_name == 'Senegal' ? "selected" : "" }}>Senegal</option>
                                <option value="Seychelles" {{ $country->country_name == 'Seychelles' ? "selected" : "" }}>Seychelles</option>
                                <option value="Sierra Leone" {{ $country->country_name == 'Sierra Leone' ? "selected" : "" }}>Sierra Leone</option>
                                <option value="Singapore" {{ $country->country_name == 'Singapore' ? "selected" : "" }}>Singapore</option>
                                <option value="Somalia" {{ $country->country_name == 'Somalia' ? "selected" : "" }}>Somalia</option>
                                <option value="Sri Lanka" {{ $country->country_name == 'Sri Lanka' ? "selected" : "" }}>Sri Lanka</option>
                                <option value="Sudan" {{ $country->country_name == 'Sudan' ? "selected" : "" }}>Sudan</option>
                                <option value="Suriname" {{ $country->country_name == 'Suriname' ? "selected" : "" }}>Suriname</option>
                                <option value="Tanzania" {{ $country->country_name == 'Tanzania' ? "selected" : "" }}>Tanzania</option>
                                <option value="Thailand" {{ $country->country_name == 'Thailand' ? "selected" : "" }}>Thailand</option>
                                <option value="Togo" {{ $country->country_name == 'Togo' ? "selected" : "" }}>Togo</option>
                                <option value="Trinidad and Tobago" {{ $country->country_name == 'Trinidad and Tobago' ? "selected" : "" }}>Trinidad and Tobago</option>
                                <option value="Turks and Cacaos Islands" {{ $country->country_name == 'Turks and Cacaos Islands' ? "selected" : "" }}>Turks and Cacaos Islands</option>
                                <option value="Uganda" {{ $country->country_name == 'Uganda' ? "selected" : "" }}>Uganda</option>
                                <option value="United States Virgin Islands" {{ $country->country_name == 'United States Virgin Islands' ? "selected" : "" }}>United States Virgin Islands</option>
                                <option value="Venezuela" {{ $country->country_name == 'Venezuela' ? "selected" : "" }}>Venezuela</option>
                                <option value="Vietnam" {{ $country->country_name == 'Vietnam' ? "selected" : "" }}>Vietnam</option>
                                <option value="Zambia" {{ $country->country_name == 'Zambia' ? "selected" : "" }}>Zambia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SLUG</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $country->slug }}" required>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" class="form-control" name="currency" value="{{ $country->currency }}" required>
                        </div>
                        <div class="form-group">
                            <label>Currency Rate</label>
                            <input type="text" class="form-control" name="currency_rate" value="{{ $country->currency_rate }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID</label>
                            <input type="text" class="form-control" name="country_id" value="{{ $country->country_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <select class="form-select w-100 p-1" aria-label="Default select example" name="country_manager" id="country_manager" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $country->country_manager == $user->id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Features Flag</label>
                            <input type="text" class="form-control" name="features_flag" value="{{ $country->features_flag }}" required>
                        </div>  
                        <div class="form-group">
                            <label>Features Manager</label>
                            <input type="text" class="form-control" name="features_manager" value="{{ $country->features_manager }}" required>
                        </div>                      
                        
                        <!-- <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="8" required></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $country->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $country->status == '0' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $country->id }}"/>
                <a href="{{route('admin.country.index')}}" class="btn btn-info pull-right ml-4">Back</a>&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            

        </div>

    </form>



<script>

$("#country_name").keyup(function(){
    var str = $(this).val();
    var trims = $.trim(str)
    var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $("#slug").val(slug.toLowerCase()) 
})

</script>


<br><br>
@endsection
