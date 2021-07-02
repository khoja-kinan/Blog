@extends('admin.layouts.app')

@section('headSection')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">Posts</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                @can('posts.create', Auth::user())
                  <a class=' btn btn-primary' href="{{ route('post.create') }}">New Post</a>
                @endcan
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Post Sub Title</th>
                    <th>Post Slug</th>
                    <th>Created At</th>
                    @can('posts.update', Auth::user())
                    <th>Edit</th>
                    @endcan
                    @can('posts.delete', Auth::user()) 
                    <th>Delete</th>
                    @endcan
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($posts as $post)
                      
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->subtitle}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->created_at}}</td>
                        @can('posts.update', Auth::user())
                          <td><a href="{{ route('post.edit',$post->id ) }}"><i class="fas fa-edit"></i></span></a></td>
                        @endcan
                        @can('posts.delete', Auth::user())  
                            <td>
                              <form id="delete-form-{{ $post->id }}" method="POST" action="{{ route('post.destroy',$post->id) }}" style="display:none">
                                @csrf
                                @method('DELETE')
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You want to delete this post?')) {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $post->id }}').submit();
                              }else{
                                  event.preventDefault();
                              }"> <i class="fa fa-trash"></i></span></a>
                            </td> 
                        @endcan
                        
                      </tr>

                      @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Post Sub Title</th>
                    <th>Post Slug</th>
                    <th>Created At</th>
                    @can('posts.update', Auth::user())
                    <th>Edit</th>
                    @endcan
                    @can('posts.delete', Auth::user()) 
                    <th>Delete</th>
                    @endcan
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


@endsection

@section('footerSection')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>

    $(function () {
  
      $("#example1").DataTable({
  
        "responsive": true, "lengthChange": false, "autoWidth": false,
  
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
      $('#example2').DataTable({
  
        "paging": true,
  
        "lengthChange": false,
  
        "searching": false,
  
        "ordering": true,
  
        "info": true,
  
        "autoWidth": false,
  
        "responsive": true,
  
      });
  
    });
  
  </script>
  

@endsection