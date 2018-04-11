@extends('template.index')

@section('body')
<div class="wrapper">
  @include('main.partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('main.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Account 
        <small>
          <a href="{{ url('my-account/view') }}">(Go Back)</a>
        </small>
      </h1> 
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row"> 
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/my-account/update') }}" style="margin-bottom: 40px;">
              {{ csrf_field() }}

              <div class="box-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <i class="fa fa-warning" aria-hidden="true"></i>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Whoops! Sorry!</strong> There were some problems with your input.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger text-center btn-close" role="alert">
                        <i class="fa fa-warning" aria-hidden="true"></i>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (Session::has('success')) 
                  <div class="alert alert-info btn-close text-center" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class=""> {{ Session::get('info') }}</span>
                  </div>
                @endif

                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="form-group">
                  <label for="name">My Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                  <label for="email">My Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group" id="newpassword">
                  <label for="newpasswordinput">My New Password</label>
                  <input type="password" class="form-control" id="newpasswordinput" name="password" placeholder="Password">
                </div> 

                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="use_new_password" name="password_check" value="true" checked> Use Old Password
                  </label>
                </div> 

                <div class="form-group col-md-6">
                  <label for="department">Select a Department</label>
                  <select id="department" name="department_id" class="form-control" required>
                    <option value="">Select a Department</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option> 
                    @endforeach
                  </select> 
                </div>

                <div class="form-group col-md-6">
                  <label for="role">Select a Role</label>
                  <select id="role" name="role_id" class="form-control" required>
                    <option value="">Select a Role</option>
                    @foreach($roles as $role)
                      <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach 
                  </select> 
                </div>

                <div class="form-group col-md-6">
                  <label for="nationality">Select a Nationality</label>
                  <select id="nationality" name="nationality" class="form-control" required>
                    <option value="">Select a Nationality</option>
                    <option value="afghan">Afghan</option>
                    <option value="albanian">Albanian</option>
                    <option value="algerian">Algerian</option>
                    <option value="american">American</option>
                    <option value="andorran">Andorran</option>
                    <option value="angolan">Angolan</option>
                    <option value="antiguans">Antiguans</option>
                    <option value="argentinean">Argentinean</option>
                    <option value="armenian">Armenian</option>
                    <option value="australian">Australian</option>
                    <option value="austrian">Austrian</option>
                    <option value="azerbaijani">Azerbaijani</option>
                    <option value="bahamian">Bahamian</option>
                    <option value="bahraini">Bahraini</option>
                    <option value="bangladeshi">Bangladeshi</option>
                    <option value="barbadian">Barbadian</option>
                    <option value="barbudans">Barbudans</option>
                    <option value="batswana">Batswana</option>
                    <option value="belarusian">Belarusian</option>
                    <option value="belgian">Belgian</option>
                    <option value="belizean">Belizean</option>
                    <option value="beninese">Beninese</option>
                    <option value="bhutanese">Bhutanese</option>
                    <option value="bolivian">Bolivian</option>
                    <option value="bosnian">Bosnian</option>
                    <option value="brazilian">Brazilian</option>
                    <option value="british">British</option>
                    <option value="bruneian">Bruneian</option>
                    <option value="bulgarian">Bulgarian</option>
                    <option value="burkinabe">Burkinabe</option>
                    <option value="burmese">Burmese</option>
                    <option value="burundian">Burundian</option>
                    <option value="cambodian">Cambodian</option>
                    <option value="cameroonian">Cameroonian</option>
                    <option value="canadian">Canadian</option>
                    <option value="cape verdean">Cape Verdean</option>
                    <option value="central african">Central African</option>
                    <option value="chadian">Chadian</option>
                    <option value="chilean">Chilean</option>
                    <option value="chinese">Chinese</option>
                    <option value="colombian">Colombian</option>
                    <option value="comoran">Comoran</option>
                    <option value="congolese">Congolese</option>
                    <option value="costa rican">Costa Rican</option>
                    <option value="croatian">Croatian</option>
                    <option value="cuban">Cuban</option>
                    <option value="cypriot">Cypriot</option>
                    <option value="czech">Czech</option>
                    <option value="danish">Danish</option>
                    <option value="djibouti">Djibouti</option>
                    <option value="dominican">Dominican</option>
                    <option value="dutch">Dutch</option>
                    <option value="east timorese">East Timorese</option>
                    <option value="ecuadorean">Ecuadorean</option>
                    <option value="egyptian">Egyptian</option>
                    <option value="emirian">Emirian</option>
                    <option value="equatorial guinean">Equatorial Guinean</option>
                    <option value="eritrean">Eritrean</option>
                    <option value="estonian">Estonian</option>
                    <option value="ethiopian">Ethiopian</option>
                    <option value="fijian">Fijian</option>
                    <option value="filipino">Filipino</option>
                    <option value="finnish">Finnish</option>
                    <option value="french">French</option>
                    <option value="gabonese">Gabonese</option>
                    <option value="gambian">Gambian</option>
                    <option value="georgian">Georgian</option>
                    <option value="german">German</option>
                    <option value="ghanaian">Ghanaian</option>
                    <option value="greek">Greek</option>
                    <option value="grenadian">Grenadian</option>
                    <option value="guatemalan">Guatemalan</option>
                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                    <option value="guinean">Guinean</option>
                    <option value="guyanese">Guyanese</option>
                    <option value="haitian">Haitian</option>
                    <option value="herzegovinian">Herzegovinian</option>
                    <option value="honduran">Honduran</option>
                    <option value="hungarian">Hungarian</option>
                    <option value="icelander">Icelander</option>
                    <option value="indian">Indian</option>
                    <option value="indonesian">Indonesian</option>
                    <option value="iranian">Iranian</option>
                    <option value="iraqi">Iraqi</option>
                    <option value="irish">Irish</option>
                    <option value="israeli">Israeli</option>
                    <option value="italian">Italian</option>
                    <option value="ivorian">Ivorian</option>
                    <option value="jamaican">Jamaican</option>
                    <option value="japanese">Japanese</option>
                    <option value="jordanian">Jordanian</option>
                    <option value="kazakhstani">Kazakhstani</option>
                    <option value="kenyan">Kenyan</option>
                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                    <option value="kuwaiti">Kuwaiti</option>
                    <option value="kyrgyz">Kyrgyz</option>
                    <option value="laotian">Laotian</option>
                    <option value="latvian">Latvian</option>
                    <option value="lebanese">Lebanese</option>
                    <option value="liberian">Liberian</option>
                    <option value="libyan">Libyan</option>
                    <option value="liechtensteiner">Liechtensteiner</option>
                    <option value="lithuanian">Lithuanian</option>
                    <option value="luxembourger">Luxembourger</option>
                    <option value="macedonian">Macedonian</option>
                    <option value="malagasy">Malagasy</option>
                    <option value="malawian">Malawian</option>
                    <option value="malaysian">Malaysian</option>
                    <option value="maldivan">Maldivan</option>
                    <option value="malian">Malian</option>
                    <option value="maltese">Maltese</option>
                    <option value="marshallese">Marshallese</option>
                    <option value="mauritanian">Mauritanian</option>
                    <option value="mauritian">Mauritian</option>
                    <option value="mexican">Mexican</option>
                    <option value="micronesian">Micronesian</option>
                    <option value="moldovan">Moldovan</option>
                    <option value="monacan">Monacan</option>
                    <option value="mongolian">Mongolian</option>
                    <option value="moroccan">Moroccan</option>
                    <option value="mosotho">Mosotho</option>
                    <option value="motswana">Motswana</option>
                    <option value="mozambican">Mozambican</option>
                    <option value="namibian">Namibian</option>
                    <option value="nauruan">Nauruan</option>
                    <option value="nepalese">Nepalese</option>
                    <option value="new zealander">New Zealander</option>
                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                    <option value="nicaraguan">Nicaraguan</option>
                    <option value="nigerien">Nigerien</option>
                    <option value="north korean">North Korean</option>
                    <option value="northern irish">Northern Irish</option>
                    <option value="norwegian">Norwegian</option>
                    <option value="omani">Omani</option>
                    <option value="pakistani">Pakistani</option>
                    <option value="palauan">Palauan</option>
                    <option value="panamanian">Panamanian</option>
                    <option value="papua new guinean">Papua New Guinean</option>
                    <option value="paraguayan">Paraguayan</option>
                    <option value="peruvian">Peruvian</option>
                    <option value="polish">Polish</option>
                    <option value="portuguese">Portuguese</option>
                    <option value="qatari">Qatari</option>
                    <option value="romanian">Romanian</option>
                    <option value="russian">Russian</option>
                    <option value="rwandan">Rwandan</option>
                    <option value="saint lucian">Saint Lucian</option>
                    <option value="salvadoran">Salvadoran</option>
                    <option value="samoan">Samoan</option>
                    <option value="san marinese">San Marinese</option>
                    <option value="sao tomean">Sao Tomean</option>
                    <option value="saudi">Saudi</option>
                    <option value="scottish">Scottish</option>
                    <option value="senegalese">Senegalese</option>
                    <option value="serbian">Serbian</option>
                    <option value="seychellois">Seychellois</option>
                    <option value="sierra leonean">Sierra Leonean</option>
                    <option value="singaporean">Singaporean</option>
                    <option value="slovakian">Slovakian</option>
                    <option value="slovenian">Slovenian</option>
                    <option value="solomon islander">Solomon Islander</option>
                    <option value="somali">Somali</option>
                    <option value="south african">South African</option>
                    <option value="south korean">South Korean</option>
                    <option value="spanish">Spanish</option>
                    <option value="sri lankan">Sri Lankan</option>
                    <option value="sudanese">Sudanese</option>
                    <option value="surinamer">Surinamer</option>
                    <option value="swazi">Swazi</option>
                    <option value="swedish">Swedish</option>
                    <option value="swiss">Swiss</option>
                    <option value="syrian">Syrian</option>
                    <option value="taiwanese">Taiwanese</option>
                    <option value="tajik">Tajik</option>
                    <option value="tanzanian">Tanzanian</option>
                    <option value="thai">Thai</option>
                    <option value="togolese">Togolese</option>
                    <option value="tongan">Tongan</option>
                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                    <option value="tunisian">Tunisian</option>
                    <option value="turkish">Turkish</option>
                    <option value="tuvaluan">Tuvaluan</option>
                    <option value="ugandan">Ugandan</option>
                    <option value="ukrainian">Ukrainian</option>
                    <option value="uruguayan">Uruguayan</option>
                    <option value="uzbekistani">Uzbekistani</option>
                    <option value="venezuelan">Venezuelan</option>
                    <option value="vietnamese">Vietnamese</option>
                    <option value="welsh">Welsh</option>
                    <option value="yemenite">Yemenite</option>
                    <option value="zambian">Zambian</option>
                    <option value="zimbabwean">Zimbabwean</option>
                  </select> 
                </div>
 
                <div class="form-group col-md-6">
                  <label>Date of Birth</label> 
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker5" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
                  </div> 
                </div>

                <div class="form-group col-md-6">
                  <label for="gender">Gender</label>
                  <select id="gender" name="gender" class="form-control" required>
                    <option value="">Select a Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select> 
                </div>

                <div class="form-group col-md-6">
                  <label for="marital_status">Marital Status</label>
                  <select id="marital_status" name="marital_status" class="form-control" required>
                    <option value="">Select a Marital Status</option>
                    <option value="Male">Single</option>
                    <option value="Female">Married</option>
                    <option value="Divorced">Divorced</option>
                  </select> 
                </div>

                <div class="form-group col-md-6">
                  <label for="id_number">ID Number</label>
                  <input type="text" class="form-control" id="id_number" name="id_number" placeholder="Enter ID Number" value="{{ $user->id_number }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="mobile_number">Mobile Number</label>
                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{ $user->mobile_number }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="next_of_kin">Next of Kin</label>
                  <input type="text" class="form-control" id="next_of_kin" name="next_of_kin" placeholder="Enter Next of Kin" value="{{ $user->next_of_kin }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="next_of_kin_id_no">Next of Kin ID Number</label>
                  <input type="text" class="form-control" id="next_of_kin_id_no" name="next_of_kin_id_no" placeholder="Enter Next of Kin ID Number" value="{{ $user->next_of_kin_id_no }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $user->address }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="employment_status">Employment Status</label>
                  <select id="employment_status" name="employment_status" class="form-control" required>
                    <option value="">Select Employment Status</option>
                    <option value="Full Time Contract">Full Time Contract</option>
                    <option value="Permanent Basis">Permanent Basis</option>
                    <option value="Part Time Contract">Part Time Contract</option>
                    <option value="Internship">Internship</option>
                  </select> 
                </div>

                <div class="form-group col-md-12">
                  <label for="linkedin_url">LinkedIn Profile Url</label>
                  <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="LinkedIn Profile Url" value="{{ $user->linkedin_url }}" required>
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary">Update My Details</button>
                </div>
              </div>

              </div>
              <!-- /.box-body -->
 
            </form>
          </div>
          <!-- /.box --> 

        </div>
      </div> 
 
    </section>
    <!-- /.content --> 
  <!-- /.content-wrapper -->
  
  @include('main.partials.footer')

</div>
<!-- ./wrapper -->
  
  @include('main.partials.body-script')
@stop 


