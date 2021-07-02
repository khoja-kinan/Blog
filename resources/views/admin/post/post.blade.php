@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href=" {{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('main-content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posts Editor  </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
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
          <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                  {{-- Post Title --}}
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
                </div>
                  {{-- Post sub Title --}}
                <div class="form-group">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub title">
                </div>
                  {{-- Post Slug --}}
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                </div>
                  {{-- Post Image --}}
                <div class="form-group">
                  <label for="image">Image input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                </div>
                {{-- Post Tags --}}
                <div class="form-group">
                  <label>Tags</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;" name="tags[]">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- Post Category --}}
                <div class="form-group">
                  <label>Category</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="categories[]">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                  </select>
                </div>
                  {{-- Post Status --}}
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="publish" name="status" value="1">
                  <label class="form-check-label" for="status">publish</label>
                </div>
            </div>
                  {{-- Post Body --}}
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                Post body
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <textarea id="summernote" name="body"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
                {{-- Post submit button --}}
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href='{{ route('post.index') }}' class="btn btn-warning">Back</a>
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

@section('footerSection')
  <!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script src=" {{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function(){
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });

</script>
@endsection