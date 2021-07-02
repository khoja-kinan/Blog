@extends('admin.layouts.app')

@section('main-content') 
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Permissions Editor  </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('permission.index') }}">Permissions</a></li>
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
            <h3 class="card-title">Permissions</h3>
          </div>

          @include('includes.messages')
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Permission Name">
                </div>

                <div class="form-group">
                  <label for="for">Permissions For</label>
                  <select name="for" id="for" class="form-control">
                    <option selected disabled>Select Permission For</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>
                  </select>
                </div>


            </div>     
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('permission.index') }}' class="btn btn-warning">Back</a>
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
