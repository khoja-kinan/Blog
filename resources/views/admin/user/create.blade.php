@extends('admin.layouts.app')

@section('main-content') 
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admins Editor  </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Admins</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Admin</h3>
          </div>

          @include('includes.messages')
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                </div>
  
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                  <label for="phone">Mobile Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile phone" value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <div class="row">
                      <div class="col-lg-6">
                        <div class="checkbox">
                          <label><input type="checkbox" name="status" value="1" @if(old('status')==1)
                              checked
                          @endif> Status</label>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Assign Roles</label>
                  <div class="row">
                    @foreach ($roles as $role)
                      <div class="col-lg-2">
                        <div class="checkbox">
                          <label><input type="checkbox" name="role[]" value="{{$role->id}}" > {{$role->name}}</label>
                        </div>
                      </div>
                    @endforeach
                  </div>

                </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
    
  </section>
  <!-- /.content -->
  
</div>
<!-- /.content-wrapper -->



@endsection
