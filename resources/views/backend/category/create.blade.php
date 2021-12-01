@extends('backend.layout.master')
@section('content')
    <form method="post" >
        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Create New Note</h2>
                @csrf
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" >
                        @error('name')
                        <p class="text text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                        <a type="button" class="btn btn-danger" href="{{route('categories.index')}}">Back</a>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection
