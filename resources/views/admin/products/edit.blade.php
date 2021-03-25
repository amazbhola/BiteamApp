@extends('admin.layouts.master')
@section('page-content')
   <div class="container">
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product | <span class="btn btn-outline-dark"><a href="{{ route('products.index') }}">Products List</a></span></h3>
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
          
              <form action="{{ route('products.update', $product->id )}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product Name">
                    @error('name')
                        <p class="text-danger">{{ $message  }}</p>
                    @enderror
                  </div>
                  <div class="row sm">
                    <div class="form-group col-6">
                      <label>Product price</label>
                      <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Product Price">
                      @error('price')
                          <p class="text-danger">{{ $message  }}</p>
                      @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="category_select">Product Category</label>
                        <select id="category_select" class="form-control" name="category_id">
                          <option value="">Select Cacegory</option>
                          @foreach ($categories as $category)
                          <option {{ $product->category_id == $category->id ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      @error('category_id')
                          <p class="text-danger">{{ $message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Product Quantity</label>
                      <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="Product Quantity">
                      @error('quantity')
                          <p class="text-danger">{{ $message  }}</p>
                      @enderror
                    </div>
                    <div class="form-group col-6">
                      <label>Product Status</label>
                      <select name="is_active" id="" class="form-control">
                        <option {{ $product->is_active == 0 ? 'selected' : ''}} value="0" >Inactive</option>
                        <option {{ $product->is_active == 1 ? 'selected' : ''}} value="1">Active</option>
                      </select>
                      @error('is_active')
                          <p class="text-danger">{{ $message  }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" class="form-control-sm">
                    <img width="80" src="{{ asset($product->image)}}" alt="">
                    @error('image')
                        <p class="text-danger">{{ $message  }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" name="description" id="" cols="10" rows="10">{{ $product->description}}</textarea>
                    @error('description')
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