@extends('backend.layout.master')
@section('content')
    <form method="post" >
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Create New user</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="email" value="{{old('email')}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input id="name" type="password" class="form-control" name="password" value="{{old('password')}}" >
                    </div>
                </div>
                <div>
                    @foreach($roles as $role)
                    <p><label>
                            <input type="checkbox" name="role-id[]" value="{{$role->id}}">
                        </label>{{$role->name}}</p>
                    @endforeach
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                        <a type="button" class="btn btn-danger" href="{{route('users.index')}}">Back</a>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection

