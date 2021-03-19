@extends('admin.layouts.master')
@section('page-content')
   <div class="container">
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category | <span class="btn btn-outline-dark"><a href="{{ route('categories.index') }}">Categories List</a></span></h3>
              </div>
              <!-- /.card-header -->
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
              <!-- form start -->
              <form method="POST" action="{{ route('categories.update',$editById->id) }}">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="" value="{{ $editById->name }}">
                    @error('name')
                    <p class="text-danger">{{ $message  }}</p>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
       </div>
   </div>
@endsection
