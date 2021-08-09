@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')
    <form action="{{route('admin.country.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="country_name" class="form-label">Country Name</label> <br>
                            <select class="form-select w-100 p-1" aria-label="Default select example" id="country_name" name="country_name" required>
                                <option selected>Select Country</option>
                                <option value="1">Angola</option>
                                <option value="2">Anguilla</option>
                                <option value="2">Antigua and Barbuda</option>
                                <option value="3">Aruba</option>
                                <option value="3">Bahamas</option>
                                <option value="3">Barbados</option>
                                <option value="3">Belize</option>
                                <option value="3">Benin</option>
                                <option value="3">Bolivia</option>
                                <option value="3">Brazil</option>
                                <option value="3">British Virgin Islands</option>
                                <option value="3">Brunei</option>
                                <option value="3">Burkina Faso</option>
                                <option value="3">Burma</option>
                                <option value="3">Burundi</option>
                                <option value="3">Cambodia</option>
                                <option value="3">Cameroon</option>
                                <option value="3">Cayman Islands</option>
                                <option value="3">Central African Republic</option>
                                <option value="3">Chad</option>
                                <option value="3">Colombia</option>
                                <option value="3">Comoros</option>
                                <option value="3">Congo</option>
                                <option value="3">Costa Rica</option>
                                <option value="3">Cuba</option>
                                <option value="3">Democratic Republic of Congo</option>
                                <option value="3">Djibouti</option>
                                <option value="3">Dominica</option>
                                <option value="3">Dominican Republic</option>
                                <option value="3">East Timor</option>
                                <option value="3">Ecuador</option>
                                <option value="3">El Salvador</option>
                                <option value="3">Equatorial Guinea</option>
                                <option value="3">Eritrea</option>
                                <option value="3">Ethiopia</option>
                                <option value="3">French Guiana</option>
                                <option value="3">Gabon</option>
                                <option value="3">Galapagos Islands</option>
                                <option value="3">Gambia</option>
                                <option value="3">Grenada</option>
                                <option value="3">Guadeloupe</option>
                                <option value="3">Guatemala</option>
                                <option value="3">Guinea</option>
                                <option value="3">Guinea-Bissau</option>
                                <option value="3">Guyana</option>
                                <option value="3">Haiti</option>
                                <option value="3">Honduras</option>
                                <option value="3">India</option>
                                <option value="3">Indonesia</option>
                                <option value="3">Ivory Coast</option>
                                <option value="3">Jamaica</option>
                                <option value="3">Kenya</option>
                                <option value="3">Laos</option>
                                <option value="3">Liberia</option>
                                <option value="3">Madagascar</option>
                                <option value="3">Malawi</option>
                                <option value="3">Malaysia</option>
                                <option value="3">Mali</option>
                                <option value="3">Martinique</option>
                                <option value="3">Mauritania</option>
                                <option value="3">Mauritius</option>
                                <option value="3">Mayotte</option>
                                <option value="3">Mexico</option>
                                <option value="3">Montserrat</option>
                                <option value="3">Mozambique</option>
                                <option value="3">Netherlands Antilles</option>
                                <option value="3">Nicaragua</option>
                                <option value="3">Niger</option>
                                <option value="3">Nigeria</option>
                                <option value="3">Panama</option>
                                <option value="3">Paraguay</option>
                                <option value="3">Peru</option>
                                <option value="3">Philippines</option>
                                <option value="3">Puerto Rico</option>
                                <option value="3">Reunion</option>
                                <option value="3">Rwanda</option>
                                <option value="3">Saint Barthelemy</option>
                                <option value="3">Saint Helena</option>
                                <option value="3">Saint Kitts and Nevis</option>
                                <option value="3">Saint Lucia</option>
                                <option value="3">Saint Martin</option>
                                <option value="3">Saint Vincent and the Grenadines</option>
                                <option value="3">Sao Tome and Principe</option>
                                <option value="3">Senegal</option>
                                <option value="3">Seychelles</option>
                                <option value="3">Sierra Leone</option>
                                <option value="3">Singapore</option>
                                <option value="3">Somalia</option>
                                <option value="3">Sudan</option>
                                <option value="3">Suriname</option>
                                <option value="3">Tanzania</option>
                                <option value="3">Thailand</option>
                                <option value="3">Togo</option>
                                <option value="3">Trinidad and Tobago</option>
                                <option value="3">Turks and Cacaos Islands</option>
                                <option value="3">Uganda</option>
                                <option value="3">United States Virgin Islands</option>
                                <option value="3">Venezuela</option>
                                <option value="3">Vietnam</option>
                                <option value="3">Zambia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SLUG</label>
                            <input type="text" id="slug" class="form-control" name="slug" required>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" class="form-control" name="currency" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID</label>
                            <input type="text" class="form-control" name="country_id" required>
                        </div>
                        <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <!-- <input type="text" class="form-control" name="country_manager" required> -->
                            <select class="form-select w-100 p-1" aria-label="Default select example" name="country_manager" id="country_manager" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Features Flag</label>
                            <input type="text" class="form-control" name="features_flag" required>
                        </div>  
                        <div class="form-group">
                            <label>Features Manager</label>
                            <input type="text" class="form-control" name="features_manager" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="8" required></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1">Enable</option>   
                                <option value="0">Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Create New</button><br>
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
