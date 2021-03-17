@extends('admin.layouts.master')

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At.</th>
                            <th>Updated At.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td><a href="" class="btn btn-outline-success btn-sm">Edit</a></td>
                            <td><a href="" class="btn btn-outline-danger btn-sm">Delete</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td><a href="" class="btn btn-outline-success btn-sm">Edit</a></td>
                            <td><a href="" class="btn btn-outline-danger btn-sm">Delete</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td><a href="" class="btn btn-outline-success btn-sm">Edit</a></td>
                            <td><a href="" class="btn btn-outline-danger btn-sm">Delete</a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At.</th>
                            <th>Updated At.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
