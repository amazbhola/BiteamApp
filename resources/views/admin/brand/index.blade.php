@extends('admin.layouts.master')

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Brand</h3>
                <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addnewBrand">
                    Add New Brand
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addnewBrand" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Brand Create Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Brand Name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Brand Image</label>
                                        <input type="file" class="form-control-file" name="image" id="" placeholder=""
                                            aria-describedby="fileHelpId">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Brand</button>
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
                            <th>Brand Image</th>
                            <th>Brand Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img width="60" src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{ route('brands.edit', $item->id) }}"
                                        class="btn btn-outline-success btn-sm">Edit</a></td>
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
                                                    <p class="text-danger"> Are you sure delete this Brand ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form action="{{ route('brands.destroy', $item->id) }}" method="POST">
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
@endsection
