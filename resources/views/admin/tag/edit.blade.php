@extends('admin.layouts.app')

@section('main-content') 
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tags Editor  </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('tag.index') }}">Tags</a></li>
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
            <h3 class="card-title">Titles</h3>
          </div>

          @include('includes.messages')
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('tag.update',$tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Tag Title</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Tag Name" value="{{ $tag->name }}">
                </div>
  
                <div class="form-group">
                  <label for="slug">Tag Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $tag->slug }}">
                </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('tag.index') }}' class="btn btn-warning">Back</a>
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
