<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Header Codes -->
      @include('backend.includes.header')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('backend.includes.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('backend.includes.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @include('backend.allinfo.flash_message')
          @yield('adminbodycontent')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Footer -->
      @include('backend.includes.footer')
      @yield('script')
</body>

</html>
