@extends('admin.layouts.app')

@section('main-content') 
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Roles Editor  </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('role.index') }}">Roles</a></li>
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
            <h3 class="card-title">Roles</h3>
          </div>

          @include('includes.messages')
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('role.update',$role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Role Name" value="{{ $role->name }}">
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <label>Posts Permission</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'post')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                              @foreach ($role->permissions as $role_permission)
                                @if ($role_permission->id == $permission->id)
                                  checked
                                @endif
                              @endforeach
                            > {{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>
                
  
                  <div class="col-lg-4">
                    <label>Users Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'user')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                            @foreach ($role->permissions as $role_permission)
                            @if ($role_permission->id == $permission->id)
                              checked
                            @endif
                          @endforeach
                            > {{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>

                  <div class="col-lg-4">
                    <label>Others Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'other')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                            @foreach ($role->permissions as $role_permission)
                            @if ($role_permission->id == $permission->id)
                              checked
                            @endif
                          @endforeach
                            > {{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                  </div>

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
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
