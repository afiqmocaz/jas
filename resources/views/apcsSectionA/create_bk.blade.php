<!DOCTYPE html>
<html lang="en">
<head>
  <title>APCS Section A</title>

  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/justified-nav.css')!!}
  {!!Html::style('css/templatemo_style.css')!!}
  {!!Html::style('css/parsley.css')!!}
  {!!Html::style('css/button.css')!!}

  <script>
    function SameAs(f) {
  if(f.sameas.checked == true) {
    f.mailaddress.value = f.address.value + ", " + f.city.value + ", " + f.state.value + ", " + f.country_id.value;
    f.mailpostcode.value = f.postcode.value;
  }

  else if(f.sameas.checked == false)
   {
    
       f.mailaddress.value = ''; 
    f.mailpostcode.value = '';
   }
}
  </script>

  <!-- show hide radiobutton -->
<!--   <script type="text/javascript">
  function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'none';
}
function show3(){
  document.getElementById('div1').style.display = 'block';
}
</script> -->
  <!-- show hide radiobutton -->

<style>
/*.hide {
  display: none;
}*/
.well {
  background: white;
}
  .table th, .table td {
    border-top: none !important;
    border-left: none !important;
}
.fixed-table-container {
    border:0px;
}
button {
  float: right;
}
h3{
  font-size: 15px;
  font-style: bold;
}
.popover{
    max-width: 30%; /* Max Width of the popover (depending on the container!) */
}
f1 {
      font-size: 10px;
    }

    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }
    p {
      text-align: justify;
    }
    h4 {
      font-size: 20;
    }
   li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: #00ad00;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #006e00;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        font-weight: bold;
        padding: 5px 27px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #00ad00}

    .dropdown:hover .dropdown-content {
        display: block;
    }
    input:invalid,
    select:invalid,
    textarea:invalid,
    input[type=radio]:invalid {
      border-color: 1px solid red;
      background-color:  #ffe6e6;
      outline: 1px solid red;
    }
</style>
</head>
<body>
<div class="container">







<!-- HEADER -->
    <div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
      <!--img src="image/banner1.png" alt="header image" width="2048" height="100" class="img-responsive cleaner"-->
   </div>
    <div class="col-xs-10" style="height:20px;"></div>
    </div>
  <!-- HEADER -->






<!-- DISPLAY PERSONAL INFO -->
<div class="col-xs-10" style="height:20px;"></div>   

 <div class="well well-sm"  style="margin-left: 5%; margin-right: 15%; background-color: white">
 <table style="width: 60%">
    <tbody>   
      <tr>
        <td>
          <label>&nbsp &nbsp &nbsp NAME </label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp {{ Auth::user()->name }}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label> &nbsp &nbsp &nbsp NRIC / PASSPORT NUMBER</label>
        </td>
        <td>
          <label>: &nbsp &nbsp &nbsp <!-- 931405105499 --></label>
          <strong>{{ Auth::user()->nric }}</strong>
        </td>
      </tr>
     <tr>
        <button  class="small btn-primary " a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Signout</button>
      </tr>  
     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </tbody>  
  </table>
  </div>
 
<!-- DISPLAY PERSONAL INFO -->







  <!-- NAVIGATION BAR -->
  <div class="container">
  <div class="navbar templatemo-nav" id="navbar">
        <div class="navbar-header">               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav nav-justified">
          <li class="active"><a href="/apcsSectionA/create">SECTION A</a></li>
                    <li class="disabled"><a>SECTION B</a></li>
                    <li class="disabled"><a>SECTION C</a></li>

                    <li class="disabled"><a>SECTION D</a></li>
              
                    <li class="disabled"><a>SECTION E</a></li>
              
                    <li class="disabled"><a>SECTION F</a></li>
              
            </ul>
            </div> <!-- nav -->
          </div>
          </div>
  <!-- NAVIGATION BAR -->

@if (Session::has('success'))

        <div class="alert alert-success" role="alert">
    
        <strong>Success:</strong>  {{ Session::get('success') }}

        </div>

        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">

        <strong>Errors:</strong><ul>
        @foreach ($errors->all() as $error)
          <br><li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif






<!-- PAGE TITLE -->
<div class="well well-lg" style="margin-left: 5%; margin-right: 5%">
  <h2 style="margin-left: 5%">PRE-QUALIFICATION REGISTRATION FORM</h2>
  
 <h3 style="margin-left: 5%"><strong>
   SECTION A - PERSONAL INFORMATION
 </strong></h3>






 <!-- INSTRUCTION -->
  <div style="width: 60%; margin-left: 5%" class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">APCS Section A Instruction :</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">•  Enter your full name based on your name in I/C or passport<br />
        •  Click on <strong>Choose File </strong> to upload your photo and your photo must be in <strong>passport size</strong><br />
        •  Click on button <strong>Cancel Registration</strong> to cancel your application<br />
        •  Click on button <strong>Save Draft</strong> to save your application as draft<br />
        •  Click on button <strong>Next</strong> to save your application and continue to next step<br />
        •  You are <strong style="color: red">NOT ALLOWED</strong> to go to next page before completing this section
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  </script>


<div class="col-xs-12" style="height:50px;"></div>   


<!-- FORM -->
<div class="">
   <div class="well well-lg"  style="margin-left: 10%; margin-right: 10%; border-color: blue; background-color: #e6f2ff">    
  <table class="table">
    <tbody>
        {!! Form::open(['route' => 'apcsSectionA.store', 'data-parsley-validate'=> '', 'files'=> true]) !!}
        <tr>

        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            {{ Form::label('featured_image', 'Passport Photo:') }}

            <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
            </td>
<!-- <td colspan="4">
    <input name="discount" type="radio" id="Yes" value="Yes" required="" />Yes
    <input name="discount" type="radio" id="No" value="No" required="" />No<br />  
    <select class="purple" name="discountselection" id="discountselection" disabled required="">
        <option data-foo="" value="" disabled="true" selected="true">--Select year--</option>
        <option value="1 Year">1 Year</option>
        <option value="2 Years">2 Years</option>
        <option value="3 Years">3 Years</option>
    </select>                  
</td> -->


            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
            <em><label style="color: #aab2bd" class="col-2 col-form-label">image must be in (.png) and (.jpeg)</label></em>
            </br>
              <!-- {{ Form::file('featured_image')}} -->
              <input type="file" name="featured_image" accept="image/*" required="">
              </br>
                </td>
        </tr>
        <tr>
          <td>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{ Form::label('name', 'Full Name:') }}

            <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
            </td>

            <td>
              <label for="example-text-input" class="col-2 col-form-label">:
            </td>
            <td>
              <!-- {{ Form::text('name', null, array('class' => 'form-control',
               'style' => 'width: 95%', 'placeholder'=>'Eg: Muhd Izzat',
                'required' => ''))}} -->
                {{ Auth::user()->name }}
                </td>
        </tr>
        <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Title</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
    <!--     {{ Form::select('title', ['mr' => 'Mr', 'mrs' => 'Mrs', 'miss' => 'Miss', 'dr' => 'Dr', 'prof' => 'Prof' ], 'mr', array('class' => 'form-control', 'style' => 'width: 20%', 'required' => ''))}} -->
    <select name="title" class="form-control" style="width: 35%" required="">
<option data-foo="" value="" disabled="true" selected="true">--Please Select--</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Ms</option>
    <option value="Dr">Dr</option>
    <option value="Prof">Prof</option>
</select>

        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">NRIC / Passport</label>
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- <label for="example-text-input" class="col-2 col-form-label">931405105499</label> -->
          {{ Auth::user()->nric }}
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Address</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::textarea('address', null, array('style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'required' => ''))}}
          <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">City</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::text('city', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: Banting', 'required' => ''))}} -->
          <input type="text" name="city" class="form-control" style="width: 30%" placeholder="Eg: Banting" required title="Enter letters only" minlength="3" oninput="this.value=this.value.replace(/[^A-Za-z ]/g,'');">
          <!--<input style="width: 20%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Postcode</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::number('postcode', null, array('class' => 'form-control', 'style' => 'width: 25%', 'placeholder'=>'Eg: 42500', 'required' => ''))}} -->
          <input type="value" pattern="\d+" name="postcode" class="form-control" style="width: 25%" placeholder="Eg: 42500" required title="Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" "Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
        </td>
      </tr>
      <tr id="rowState">
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">State</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::select('state', [
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

            ], null, array('class' => 'form-control', 'style' => 'width: 35%', 'required' => ''))}} -->
            <select name="state" class="form-control" style="width: 50%" required="">
              <option data-foo="" value="0" disabled="true" selected="true">--Select State--</option>
                <optgroup label="J">
                  <option value="Johor">Johor</option>
                </optgroup>
                <optgroup label="K">
                  <option value="Kedah">Kedah</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Kuala Lumpur">Kuala Lumpur</option>
                </optgroup>
                <optgroup label="L">
                  <option value="Labuan">Labuan</option>
                </optgroup>
                <optgroup label="M">
                  <option value="Malacca">Malacca</option>
                </optgroup>
                <optgroup label="N">
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                </optgroup>
                <optgroup label="P">
                  <option value="Pahang">Pahang</option>
                  <option value="Perak">Perak</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Penang">Penang</option>
                  <option value="Putrajaya">Putrajaya</option>
                </optgroup>
                <optgroup label="S">
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                  <option value="Selangor">Selangor</option>
                </optgroup>
                <optgroup label="T">
                  <option value="Terengganu">Terengganu</option>
                </optgroup>
            </select>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{{ Form::label('country_id', 'Country')}}
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::select('country_id', ['' => '-- Select Country --',
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

            ], '', array('id' => 'country_id', 'class' => 'form-control', 'style' => 'width: 60%', 'required' => ''))}}
          </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Mail Address</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <input type="checkbox" name="sameas" onclick="SameAs(this.form)">
          <em>Check this box if Address and Mail Address are the same.</em>
          
          {{ Form::textarea('mailaddress', null, array('style'=>'width: 95%', 'class'=>'form-control', 'rows' => 5, 'placeholder'=>'Eg: No. 64, Jln Pahlawan 21, Taman Pahlawan', 'required' => ''))}}
          <!--<textarea style="width: 70%" class="form-control" rows="5" id="comment"></textarea>-->
        </td>

      </tr>
       <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Mail Postcode</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::number('mailpostcode', null, array('class' => 'form-control', 'style' => 'width: 25%', 'placeholder'=>'Eg: 42500', 'required' => ''))}} -->
          <input type="value" pattern="\d+" name="mailpostcode" class="form-control" style="width: 25%" placeholder="Eg: 42500" required title="Enter digit only. Min : 3, Max : 10" minlength="3" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Email</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::email('email', null, array('class' => 'form-control', 'style' => 'width: 40%', 'placeholder'=>'Eg: izzat@gmail.com', 'required' => ''))}}
          <!--<input style="width: 30%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Bumiputera status</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
<!--           {{ Form::radio('bumiputerastatus', 'Bumiputera' , true) }}
          {{ Form::label('Bumiputera')}}
          {{ Form::radio('bumiputerastatus', 'Non-Bumiputera' , false) }}
          {{ Form::label('Non-Bumiputera')}}
          {{ Form::radio('bumiputerastatus', 'Others' , false) }}
          {{ Form::label('Others')}} -->
        <input type="radio" name="bumiputerastatus" value="Bumiputera" required=""/>
        Bumiputera
        <input type="radio" name="bumiputerastatus" value="Non-Bumiputera" required=""/>
        Non-Bumiputera
        <input type="radio" name="bumiputerastatus" value="Others" required=""/>
        Others
        <!-- <input type="radio" name="bumiputerastatus" value="Bumiputera" onclick="show1();" />
        Bumiputera
        <input type="radio" name="bumiputerastatus" value="Non-Bumiputera" onclick="show2();" />
        Non-Bumiputera
        <input type="radio" name="bumiputerastatus" value="Others" onclick="show3();" />
        Others
        <div id="div1" class="hide">
        <em><label style="color: #aab2bd; margin-left: 50%">Enter your Bumiputera status</label></em>
        <input style="width: 30%; margin-left: 50%" class="form-control" type="text">
        </div> -->



        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::number('phoneno', null, array('id' => 'numb', 'class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: 0132458672', 'required' => ''))}} -->
          <input type="text" pattern="\d+" name="phoneno" class="form-control" style="width: 30%" placeholder="Eg: 0132458672" required minlength="10" maxlength="11" required title="Enter digit only. Min : 10, Max : 11" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
        </td>
      </tr>
      <tr>
        <td>
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label for="example-text-input" class="col-2 col-form-label">Fax No.</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          <!-- {{ Form::number('faxno', null, array('class' => 'form-control', 'style' => 'width: 30%', 'placeholder'=>'Eg: 033122342'))}} -->
          <input type="text" pattern="\d+" name="faxno" class="form-control" style="width: 30%" placeholder="Eg: 0132458672" minlength="10" maxlength="11" title="Enter digit only. Min : 10, Max : 11" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
        </td>
      </tr>

      
      </tbody>
    </table>


    
    <div class="well" id="txtA"  style="background-color: #e6e9ed; border-color: blue; width: 99%">
      <table class="table">
    <tbody>
    <tr>
        <td colspan="3">
          <label for="example-text-input" style="color: blue" class="col-2 col-form-label">Additional information for Non-Malaysian</label>
    <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        
      </tr>
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Place of Issue</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::text('placeofissue', null, array('id' => 'placeofissue', 'class' => 'form-control', 'style' => 'width: 60%', 'placeholder'=>'Eg: United State', 'required' => ''))}}
          <!--<input style="width: 40%" class="form-control" type="text" id="example-text-input">-->
        </td>
      </tr>
      <tr>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">Date of Issue</label>
          <!-- <label for="example-text-input" style="color: red" class="col-2 col-form-label">*</label> -->
        </td>
        <td>
          <label for="example-text-input" class="col-2 col-form-label">:</label>
        </td>
        <td>
          {{ Form::date('dateofissue', '', array('id' => 'dateofissue', 'class' => 'form-control', 'style' => 'width: 40%', 'required' => '')) }}
        </td>
      </tr>
    </tbody>
  </table>
</div></div></div>
<button type="submit" class="button next" style="margin-right: 5%">Next</button>
  </br>
  {!! Form::close() !!}
    

</br></br>

</div></div></div>




<!-- FOOTER -->
    <div class="container">
              <footer>
      <div class="credit row">
        <center><div class="col-md-6 col-md-offset-3">
          <div id="templatemo_footer">Copyright © 2017 <label href="#">Jabatan Alam Sekitar</label>
          </div>
        </div>
            
      </div>
    </footer>


    {!! Html::script('js/parsley.min.js')!!}
  {!! Html::script('js/jquery.js')!!}
  {!! Html::script('js/bootstrap.min.js')!!}
  {!! Html::script('js/templatemo_script.js')!!}



    <!-- templatemo 393 fantasy -->


  <script>
  $('#txt').click(function() {
    $("#txtC").toggle(this.checked);
    $("#txtD").toggle(this.checked);
    $("#txtE").toggle(this.checked);
});
</script>
<script>
function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1 || x > 999999999) {
        text = "Input not valid";
    } else {
        text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
}
</script>
<!-- FOOTER -->
  


<script type="text/javascript">
  function dynInput(cbox) {
      if (cbox.checked) {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "regNo";
        var div = document.createElement("div");
        div.id = cbox.name;
        div.innerHTML = " <br> &nbsp &nbsp &nbsp &nbsp &nbsp Registered Number : " ;
        div.appendChild(input);
        document.getElementById("insertinputs").appendChild(div);
      } else {
        document.getElementById(cbox.name).remove();
      }
    }
</script>
<!-- <script type="text/javascript">
  $('#country_id').hide();

$('#No').click(function() {
    $('#country_id').hide();
    $('#country_id').removeAttr('required');
});

$('#Yes').click(function() {
    $('#country_id').show();
    $('#country_id').removeAttr('disabled');
});
</script> -->
<!-- <script>
        $("#No").click(function() {
            $("#discountselection").prop("required", false);
            $("#discountselection").prop("disabled", true);
        });
        $("#Yes").click(function() {
           $("#discountselection").prop("required", true);
           $("#discountselection").prop("disabled", false);
        });
        

    </script>
 -->
 <script type="text/javascript">
  $('#country_id').on('change', function () {
    if (this.value === 'Malaysia') {
        $("#txtA").hide();
        $('#rowState').removeClass("hide");
        document.getElementById("dateofissue").required = false;
        document.getElementById("placeofissue").required = false;
    } else {
        $("#txtA").show();
         $('#rowState').addClass("hide");
         $('#state').val("0");
         
    }

});
 </script>
</body>

</html>
