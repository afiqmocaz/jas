@extends('layouts.master_consultant')
@section('header', $category.': Personal Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			 <h2  style="margin-left:30px">Personal Profile&nbsp;<a id="popoverData" class="btn btn-primary" href="#" data-content='1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
                2. The date for the examination will be announced by the secretariat. <br>
                3. Applicant is required to make yourselves available for the examination. <br>
                                4. Applicant have to click on the Confirm button to make the confirmation for the examination. <br>
                5. Once Applicant has submitted the confirmation, applicant must wait on that date to seat for the examination.<br>
                6. The applicant will be consider as failed if do not attend the examination.'
        data-html="true" data-placement="right" data-original-title="Instructions" data-trigger="hover" data-toggle="popover"><i class="glyphicon glyphicon-info-sign"></i></a></h2>

				<!-- <div class="panel-group">
    <div class="panel panel-primary"style="width:90%;margin-left:30px">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Instructions:</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">1. Online examination will be set-up at the Department of Environment Head Quarters or EiMAS. <br>
								2. The date for the examination will be announced by the secretariat. <br>
								3. Applicant is required to make yourselves available for the examination. <br>
                                4. Applicant have to click on the Confirm button to make the confirmation for the examination. <br>
								5. Once Applicant has submitted the confirmation, applicant must wait on that date to seat for the examination.<br>
								6. The applicant will be consider as failed if do not attend the examination.
								</div>
      </div>
    </div></div> --><br><br>


    <div class="table-responsive" style="width: 80%; margin-left: 10%">
     <table class="table table-bordered">
  <tbody>
 
    <tr>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Passport Image</label>
      </td>
      <td style="background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="background-color: #f2f2f2">
        
      <img class="file" src="/image/{{$sectionA->image}}" href="/image/{{$sectionA->image}}" width="100px" height="150px"></img></td>
      
        

        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
         
        {{ Auth::user()->name }}
        
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">IC No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
        {{ Auth::user()->nric }}

      </td>
    </tr>
    
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">QP No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">CIETSC {{ $cert->id }}
        
      </td>
    </tr>
   
    {!! Form::model($sectionA, ['route' =>['eiaprofiles.update', $sectionA->id], 'method' => 'PUT']) !!}
      <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Address</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
     
        {{ Form::textarea('address', null, ['class' => 'form-control', 'style' => 'width: 100%;']) }}
       
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">City</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ Form::text('city', null, ['class' => 'form-control', 'style' => 'width: 100%;']) }}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
     
        <!--<input type="value" pattern="\d+" name="postcode" class="form-control" style="width: 25%" required title="Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" "Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');">-->
        {{ Form::number('postcode', null, ['class' => 'form-control', 'style' => 'width: 100%', 'required' => '', 'required title' => 'Enter digit only. Min : 3, Max : 10', 'minlength'=>'3', 'maxlength'=>'10', 'minlength'=>'3', 'maxlength'=>'10']) }}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">State</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
              {{ Form::select('state', [
      'J' =>
      [
            'Johor' => 'Johor'],
      'K' =>
      [
            'Kedah' => 'Kedah',
            'Kelantan' => 'Kelantan',
            'Kuala Lumpur' => 'Kuala Lumpur'],
      'M' =>
      [
            'Malacca' => 'Malacca'],
      'L' =>
      [
            'Labuan' => 'Labuan'],      
      'N' =>
      [
            'Negeri Sembilan' => 'Negeri Sembilan'],
      'P' =>
      [
            'Pahang' => 'Pahang',
            'Perak' => 'Perak',
            'Perlis' => 'Perlis',
            'Penang' => 'Penang',
            'Putrajaya' => 'Putrajaya'],
      'S' =>
      [
            'Sabah' => 'Sabah',
            'Sarawak' => 'Sarawak',
            'Selangor' => 'Selangor'],     
      'T' =>
      [
            'Terengganu' => 'Terengganu'],            

            ], $sectionA->state, array('class' => 'form-control', 'style' => 'width: 35%', 'required' => ''))}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Country</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
      {{ Form::select('country_id',['' => '-- Select Country --',
    'A' =>
    [
            'Afghanistan' => 'Afghanistan',
            'Albania' => 'Albania',
            'Algeria' => 'Algeria',
            'Andorra' => 'Andorra',
            'Angola' => 'Angola',
            'Antigua And Barbuda' => 'Antigua And Barbuda',
            'Argentina' => 'Argentina',
            'Armenia' => 'Armenia',
            'Aruba' => 'Aruba',
            'Australia' => 'Australia',
            'Austria' => 'Austria',
            'Azerbaijan' => 'Azerbaijan'],
      'B' =>
      [
            'Bahamas' => 'Bahamas',
            'Bahrain' => 'Bahrain',
            'Bangladesh' => 'Bangladesh',
            'Barbados' => 'Barbados',
            'Belarus' => 'Belarus',
            'Belgium' => 'Belgium',
            'Belize' => 'Belize',
            'Benin' => 'Benin',
            'Bhutan' => 'Bhutan',
            'Bolivia' => 'Bolivia',
            'Bosnia And Herzegovina' => 'Bosnia And Herzegovina',
            'Botswana' => 'Botswana',
            'Brazil' => 'Brazil',
            'Brunei Darussalam' => 'Brunei Darussalam',
            'Bulgaria' => 'Bulgaria',
            'Burkina Faso' => 'Burkina Faso',
            'Burundi' => 'Burundi'],
      'C' =>
      [
            'Cabo Verde' => 'Cabo Verde',
            'Cambodia' => 'Cambodia',
            'Cameroon' => 'Cameroon',
            'Canada' => 'Canada',
            'Central African Republic' => 'Central African Republic',
            'Chad' => 'Chad',
            'Chile' => 'Chile',
            'China' => 'China',
            'Colombia' => 'Colombia',
            'Comoros' => 'Comoros',
            'Congo (Democratic Republic)' => 'Congo (Democratic Republic)',
            'Congo (Republic)' => 'Congo (Republic)',
            'Costa Rica' => 'Costa Rica',
            'Cote dIvoire' => 'Cote dIvoire',
            'Croatia' => 'Croatia',
            'Cuba' => 'Cuba',
            'Cyprus' => 'Cyprus',
            'Czech Republic' => 'Czech Republic'],
      'D' =>
      [
            'Denmark' => 'Denmark',
            'Djibouti' => 'Djibouti',
            'Dominica' => 'Dominica',
            'Dominican Republic' => 'Dominican Republic'],
      'E' =>
      [
            'Ecuador' => 'Ecuador',
            'Egypt' => 'Egypt',
            'El Salvador' => 'El Salvador',
            'Equatorial Guinea' => 'Equatorial Guinea',
            'Eritrea' => 'Eritrea',
            'Estonia' => 'Estonia',
            'Ethiopia' => 'Ethiopia'],
      'F' =>
      [
            'Fiji' => 'Fiji',
            'Finland' => 'Finland',
            'France' => 'France'],
      'G' =>
      [
            'Gabon' => 'Gabon',
            'Gambia' => 'Gambia',
            'Georgia' => 'Georgia',
            'Germany' => 'Germany',
            'Ghana' => 'Ghana',
            'Greece' => 'Greece',
            'Grenada' => 'Grenada',
            'Guatemala' => 'Guatemala',
            'Guinea' => 'Guinea',
            'Guinea-Bissau' => 'Guinea-Bissau',
            'Guyana' => 'Guyana'],
      'H' =>
      [
            'Haiti' => 'Haiti',
            'Honduras' => 'Honduras',
            'Hungary' => 'Hungary'],
      'I' =>
      [
            'Iceland' => 'Iceland',
            'India' => 'India',
            'Indonesia' => 'Indonesia',
            'Iran' => 'Iran',
            'Iraq' => 'Iraq',
            'Ireland' => 'Ireland',
            'Israel' => 'Israel',
            'Italy' => 'Italy'],
      'J' =>
      [
            'Jamaica' => 'Jamaica',
            'Japan' => 'Japan',
            'Jordan' => 'Jordan'],
      'K' =>
      [
            'Kazakhstan' => 'Kazakhstan',
            'Kenya' => 'Kenya',
            'Kiribati' => 'Kiribati',
            'Kosovo' => 'Kosovo',
            'Kuwait' => 'Kuwait',
            'Kyrgyzstan' => 'Kyrgyzstan'],
      'L' =>
      [
            'Laos' => 'Laos',
            'Latvia' => 'Latvia',
            'Lebanon' => 'Lebanon',
            'Lesotho' => 'Lesotho',
            'Liberia' => 'Liberia',
            'Libya' => 'Libya',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lithuania',
            'Luxembourg' => 'Luxembourg'],
      'M' =>
      [
            'Macedonia (FYROM)' => 'Macedonia (FYROM)',
            'Madagascar' => 'Madagascar',
            'Malawi' => 'Malawi',
            'Malaysia' => 'Malaysia',
            'Maldives' => 'Maldives',
            'Mali' => 'Mali',
            'Malta' => 'Malta',
            'Marshall Islands' => 'Marshall Islands',
            'Mauritania' => 'Mauritania',
            'Mauritius' => 'Mauritius',
            'Mexico' => 'Mexico',
            'Micronesia' => 'Micronesia',
            'Moldova' => 'Moldova',
            'Monaco' => 'Monaco',
            'Mongolia' => 'Mongolia',
            'Montenegro' => 'Montenegro',
            'Morocco' => 'Morocco',
            'Mozambique' => 'Mozambique',
            'Myanmar' => 'Myanmar'],
      'N' =>
      [
            'Namibia' => 'Namibia',
            'Nauru' => 'Nauru',
            'Nepal' => 'Nepal',
            'Netherlands' => 'Netherlands',
            'New Zealand' => 'New Zealand',
            'Nicaragua' => 'Nicaragua',
            'Niger' => 'Niger',
            'Nigeria' => 'Nigeria',
            'North Korea' => 'North Korea',
            'Norway' => 'Norway'],
      'O' =>
      [
            'Oman' => 'Oman'],
      'P' =>
      [
            'Pakistan' => 'Pakistan',
            'Palau' => 'Palau',
            'Palestine' => 'Palestine',
            'Panama' => 'Panama',
            'Papua New Guinea' => 'Papua New Guinea',
            'Paraguay' => 'Paraguay',
            'Peru' => 'Peru',
            'Philippines' => 'Philippines',
            'Poland' => 'Poland',
            'Portugal' => 'Portugal'],
      'Q' =>
      [
            'Qatar' => 'Qatar'],
      'R' =>
      [
            'Romania' => 'Romania',
            'Russia' => 'Russia',
            'Rwanda' => 'Rwanda'],

      'S' =>
      [
            'Saint Kitts And Nevis' => 'Saint Kitts And Nevis',
            'Saint Lucia' => 'Saint Lucia',
            'Saint Vincent And The Grenadines' => 'Saint Vincent And The Grenadines',
            'Samoa' => 'Samoa',
            'San Marino' => 'San Marino',
            'Sao Tome And Principe' => 'Sao Tome And Principe',
            'Saudi Arabia' => 'Saudi Arabia',
            'Senegal' => 'Senegal',
            'Serbia' => 'Serbia',
            'Seychelles' => 'Seychelles',
            'Sierra Leone' => 'Sierra Leone',
            'Singapore' => 'Singapore',
            'Slovakia' => 'Slovakia',
            'Slovenia' => 'Slovenia',
            'Solomon Islands' => 'Solomon Islands',
            'Somalia' => 'Somalia',
            'South Africa' => 'South Africa',
            'South Korea' => 'South Korea',
            'South Sudan' => 'South Sudan',
            'Spain' => 'Spain',
            'Sri Lanka' => 'Sri Lanka',
            'Sudan' => 'Sudan',
            'Suriname' => 'Suriname',
            'Swaziland' => 'Swaziland',
            'Sweden' => 'Sweden',
            'Switzerland' => 'Switzerland',
            'Syria' => 'Syria'],
      'T' =>
      [
            'Taiwan' => 'Taiwan',
            'Tajikistan' => 'Tajikistan',
            'Tanzania' => 'Tanzania',
            'Thailand' => 'Thailand',
            'Timor-Leste' => 'Timor-Leste',
            'Togo' => 'Togo',
            'Tonga' => 'Tonga',
            'Trinidad And Tobago' => 'Trinidad And Tobago',
            'Tunisia' => 'Tunisia',
            'Turkey' => 'Turkey',
            'Turkmenistan' => 'Turkmenistan',
            'Tuvalu' => 'Tuvalu'],
      'U' =>
      [
            'Uganda' => 'Uganda',
            'Ukraine' => 'Ukraine',
            'United Arab Emirates (UAE)' => 'United Arab Emirates (UAE)',
            'United Kingdom(UK)' => 'United Kingdom(UK)',
            'United States of America (USA)' => 'United States of America (USA)',
            'Uruguay' => 'Uruguay',
            'Uzbekistan' => 'Uzbekistan'],
      'V' =>
      [
            'Vanuatu' => 'Vanuatu',
            'Vatican City (Holy See)' => 'Vatican City (Holy See)',
            'Venezuela' => 'Venezuela',
            'Vietnam' => 'Vietnam'],
      'Y' =>
      [
            'Yemen' => 'Yemen'],
      'Z' =>
      [
            'Zambia' => 'Zambia',
            'Zimbabwe' => 'Zimbabwe'],

            ], $sectionA->country_id, array('id' => 'country_id', 'class' => 'form-control', 'style' => 'width: 60%', 'required' => ''))}}
        
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Email</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ Form::email('email', null, array('class' => 'form-control', 'style' => 'width: 100%', 'required' => ''))}}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        <!--<input type="text" pattern="\d+" name="phoneno" class="form-control" style="width: 30%" placeholder="Eg: 0132458672" required minlength="10" maxlength="11" required title="Enter digit only. Min : 10, Max : 11" oninput="this.value=this.value.replace(/[^0-9]/g,'');">-->

        {{ Form::number('phoneno', null, ['class' => 'form-control', 'style' => 'width: 100%', 'required' => '', 'required minlength'=>'10', 'maxlength'=>'11', 'required title'=>'Enter digit only. Min : 10, Max : 11']) }}
      </td>
    </tr>
    <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Certificate</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
      
        {{ $cert->id }}
        
      </td>
    </tr>
     <tr>
      <td style="width: 35%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">Certificate Expiry Date</label>
      </td>
      <td style="width: 5%; background-color: #d9d9d9">
        <label for="example-text-input" class="col-2 col-form-label">:</label>
      </td>
      <td style="width: 60%; background-color: #f2f2f2">
       {{ $cert->expired->format('d-M-Y') }}
            
      </td>
    </tr>
     
    
  </tbody>
</table>   
</div>   


<center>
               <table width="40%">
               <tr>
                <td width="50%">
               <center>{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}&nbsp;<a href="{{route('eiaprofiles.create')}}" class="btn btn-primary"">Cancel</a></center></td>
                </tr>
                </table></center>

{!! Form::close() !!}

  </div>
</div>



            </div>
        </div><br><br>
		
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset ('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
 // azhari mustapa, azhari@nafa.my, 23/01/2018
    $('#popoverData').popover({
    container: 'body' });
    
</script>  
@endsection
