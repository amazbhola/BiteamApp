@extends('admin.layouts.master')
@section('page-content')
   <div class="container">
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="" value="{{ $editById->name }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
       </div>
   </div>
@endsection
