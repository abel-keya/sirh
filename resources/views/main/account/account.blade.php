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
        <a href="{{ url('/my-account/edit') }}">(edit)</a>
      </small>
    </h1> 
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row"> 
      <div class="col-md-8">

        <table class="table"> 
          <tbody>
            <tr>
              <td><strong>Name:</strong></td>
              <td>{{ $user->name }}</td> 
            </tr>
            <tr>
              <td><strong>Email:</strong></td>
              <td>{{ $user->email }}</td> 
            </tr>
            <tr>
              <td><strong>Department:</strong></td>
              <td>{{ $user->department->name }}</td> 
            </tr>
            <tr>
              <td><strong>Role:</strong></td>
              <td>
                @foreach($user->roles as $role)
                <span class="label label-success">
                  {{$role->name}}
                </span> &nbsp;
                @endforeach 
              </td> 
            </tr> 

            @if($user->nationality)
            <tr>
              <td><strong>Nationality:</strong></td>
              <td>{{ $user->nationality }}</td> 
            </tr>
            @endif

            @if($user->date_of_birth)
            <tr>
              <td><strong>Date of Birth:</strong></td>
              <td>{{ $user->date_of_birth }}</td> 
            </tr>
            @endif

            @if($user->gender)
            <tr>
              <td><strong>Gender:</strong></td>
              <td>{{ $user->gender }}</td> 
            </tr>
            @endif

            @if($user->marital_status)
            <tr>
              <td><strong>Marital Status:</strong></td>
              <td>{{ $user->marital_status }}</td> 
            </tr>
            @endif

            @if($user->id_number)
            <tr>
              <td><strong>ID Number:</strong></td>
              <td>{{ $user->id_number }}</td> 
            </tr>
            @endif

            @if($user->mobile_number)
            <tr>
              <td><strong>Mobile Number:</strong></td>
              <td>{{ $user->mobile_number }}</td> 
            </tr>
            @endif

            @if($user->next_of_kin)
            <tr>
              <td><strong>Next of Kin:</strong></td>
              <td>{{ $user->next_of_kin }}</td> 
            </tr>
            @endif

            @if($user->next_of_kin_id_no)
            <tr>
              <td><strong>Next of Kin Id No.:</strong></td>
              <td>{{ $user->next_of_kin_id_no }}</td> 
            </tr>
            @endif

            @if($user->address)
            <tr>
              <td><strong>Address:</strong></td>
              <td>{{ $user->address }}</td> 
            </tr>
            @endif

            @if($user->employment_status)
            <tr>
              <td><strong>Employment Status:</strong></td>
              <td>{{ $user->employment_status }}</td> 
            </tr>
            @endif

            @if($user->linkedin_url)
            <tr>
              <td><strong>Linkedin Url:</strong></td>
              <td>{{ $user->linkedin_url }}</td> 
            </tr>
            @endif

          </tbody>
        </table>

      </div>
    </div> 

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('main.partials.footer')

</div>
<!-- ./wrapper -->

@include('main.partials.body-script')
@stop 


