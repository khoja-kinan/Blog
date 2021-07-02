<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src=" {{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  @include("admin.layouts.header")

  @include('admin.layouts.sidebar')

    @section('main-content')
      @show

  @include('admin.layouts.footer')

</body>
</html>
