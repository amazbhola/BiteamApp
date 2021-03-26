@extends('admin.layouts.master')

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Brand</h3>
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
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId{{ $item->id }}">
                                      Delete
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $item->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                   <p class="text-danger"> Are you sure delete this Brand ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('brands.destroy',$item->id) }}" method="POST">
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