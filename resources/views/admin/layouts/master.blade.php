@include('admin/layouts/inc/header')
@include('admin/layouts/inc/sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <?php $segments = ''; ?>
              @foreach(Request::segments() as $segment)
              <?php $segments .= '/'.$segment; ?>
              <li class="breadcrumb-item active"><a href="{{ $segments }}">{{$segment}}</a></li>
              @endforeach
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @yield('page-content')
   
  </div>

  @include('admin/layouts/inc/footer')