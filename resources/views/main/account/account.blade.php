@extends('template.index')

@section('body')

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


