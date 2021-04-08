@extends('admin.layouts.master')
@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addProduct">
                    Add New Product
                </button>
                <div class="modal fade bd-example-modal-lg" id="addProduct" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="row sm">
                                            <div class="form-group col-6">
                                                <label>Product price</label>
                                                <input type="text" name="price" class="form-control"
                                                    placeholder="Product Price" required>
                                                @error('price')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="category_select">Product Category</label>
                                                <select id="category_select" class="form-control" name="category_id">
                                                    <option value="">Select Cacegory</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" required>{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3">
                                                <label>Product Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    placeholder="Product Quantity" required>
                                                @error('quantity')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Product Status</label>
                                                <select name="is_active" id="" class="form-control" required>
                                                    <option value="0">Inactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                                @error('is_active')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-3">
                                                <label>Product Brand</label>
                                                <select id="category_select" class="form-control" name="brand_id">
                                                    <option value="" required>Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" name="image" class="form-control-sm" required>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" name="description" id="" cols="10"
                                                rows="10"></textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Active | Inactive</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img width="60" src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->is_active == 0 ? 'Inactive':'Active'}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#editproduct{{ $item->id }}">
                                            Edit
                                        </button>
                                        <div class="modal fade bd-example-modal-lg" id="editproduct{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('products.update', $item->id )}}" method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="card-body">
                                                              <div class="form-group">
                                                                <label>Product Name</label>
                                                                <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Product Name">
                                                                @error('name')
                                                                    <p class="text-danger">{{ $message  }}</p>
                                                                @enderror
                                                              </div>
                                                              <div class="row sm">
                                                                <div class="form-group col-6">
                                                                  <label>Product price</label>
                                                                  <input type="text" name="price" value="{{ $item->price }}" class="form-control" placeholder="Product Price">
                                                                  @error('price')
                                                                      <p class="text-danger">{{ $message  }}</p>
                                                                  @enderror
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="category_select">Product Category</label>
                                                                    <select id="category_select" class="form-control" name="category_id">
                                                                      <option value="">Select Cacegory</option>
                                                                      @foreach ($categories as $category)
                                                                      <option {{ $item->category_id == $category->id ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                                                      @endforeach
                                                                    </select>
                                                                  @error('category_id')
                                                                      <p class="text-danger">{{ $message}}</p>
                                                                  @enderror
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="form-group col-3">
                                                                  <label>Product Quantity</label>
                                                                  <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control" placeholder="Product Quantity">
                                                                  @error('quantity')
                                                                      <p class="text-danger">{{ $message  }}</p>
                                                                  @enderror
                                                                </div>
                                                                <div class="form-group col-6">
                                                                  <label>Product Status</label>
                                                                  <select name="is_active" id="" class="form-control">
                                                                    <option {{ $item->is_active == 0 ? 'selected' : ''}} value="0" >Inactive</option>
                                                                    <option {{ $item->is_active == 1 ? 'selected' : ''}} value="1">Active</option>
                                                                  </select>
                                                                  @error('is_active')
                                                                      <p class="text-danger">{{ $message  }}</p>
                                                                  @enderror
                                                                </div>
                                                                <div class="form-group col-3">
                                                                    <label>Product Brand</label>
                                                                    <select id="category_select" class="form-control" name="brand_id">
                                                                        <option value="">Select Brand</option>
                                                                        @foreach ($brands as $brand)
                                                                            <option {{ $item->brand_id == $brand->id ? 'selected':''}} value="{{ $brand->id }}">{{ $brand->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('brand_id')
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label>Product Image</label>
                                                                <input type="file" name="image" class="form-control-sm">
                                                                <img width="80" src="{{ asset($item->image)}}" alt="">
                                                                @error('image')
                                                                    <p class="text-danger">{{ $message  }}</p>
                                                                @enderror
                                                              </div>
                                                              <div class="form-group">
                                                                <label>Product Description</label>
                                                                <textarea class="form-control" name="description" id="" cols="10" rows="10">{{ $item->description}}</textarea>
                                                                @error('description')
                                                                    <p class="text-danger">{{ $message  }}</p>
                                                                @enderror
                                                              </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modelId{{ $item->id }}">
                                        Delete
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $item->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger"> Are you sure delete this <strong>{{ $item->name }}</strong> Product ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form action="{{ route('products.destroy', $item->id) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
