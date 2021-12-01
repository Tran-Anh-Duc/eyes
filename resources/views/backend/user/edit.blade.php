@extends('backend.layout.master')
@section('content')
    <form  class="form-horizontal" method="post">
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Edit User</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">email</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div>
                    @foreach($roles as $role)
                        <p><label>
                                <input type="checkbox" name="role_id[]"  value="{{$role->id}}" {{in_array($role->id,$roleOfUser)?"checked":" "}}>
                            </label> {{$role->name}}</p>
                    @endforeach
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Change
                        </button>
                        <a  type="button" class="btn btn-danger" href="{{route('users.index')}}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection


