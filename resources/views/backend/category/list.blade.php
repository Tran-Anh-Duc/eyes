@extends('backend.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <div class="col-8">
                        <a style="margin-left: -10px" type="button" class="btn btn-primary"
                           href=" {{route('categories.create')}}">Add New Category</a>
                    </div>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td><a type="button" class="btn btn-info" href="{{route('categories.show',$category->id)}}">Detail</a>
                            <td><a type="button" class="btn btn-danger" onclick="return confirm(' Are you sure ? ')"
                                   href="{{route('categories.destroy',$category->id)}}">Delete</a></td>
                            <td><a type="button" class="btn btn-success"
                                   href="{{route("categories.showFormEdit",$category->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
