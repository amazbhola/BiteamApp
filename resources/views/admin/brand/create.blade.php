@extends('admin.layouts.master')
@section('page-content')
   <div class="container">
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Brand | <span class="btn btn-outline-dark btn-sm"><a href="{{ route('brands.index') }}">Brand List</a></span></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if (session()->has('success'))
                <div class="alert text-success">
                    {{ session()->get('success') }}
                </div>
              @endif
              @if (session()->has('error'))
                <div class="alert text-danger">
                    {{ session()->get('error') }}
                </div>
              @endif
              <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Brand Name">
                    @error('name')
                        <p class="text-danger">{{ $message  }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Brand Image</label>
                    <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                    @error('image')
                        <p class="text-danger">{{ $message  }}</p>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

            
        
            

          </div>
       </div>
   </div>
@endsection

{{-- <form>
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form> --}}