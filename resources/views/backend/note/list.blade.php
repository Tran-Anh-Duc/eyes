@extends('backend.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Category</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $key=>$note)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$note->name}}</td>
                           <td>{{$note->description}}</td>
                           <td>{{$note->user->name}}</td>
                           <td>{{$note->category->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
