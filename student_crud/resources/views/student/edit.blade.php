@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Edit Record</h3>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    {{-- <p>{{$errors}}</p> --}}
                    <ul>
                        @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{action('StudentController@update', $id)}}" method="post">
                {{ csrf_field() }}
                {{-- PATCH method instead of PUT, will see later --}}
                <input type="hidden" name="_method"  value="PATCH"/>
                <div class="form-group">
                    <input type="text" name="firstName" value="{{$studentWithId['first_name']}}" class="form-control" placeholder="Enter first name"/>
                </div>

                <div class="form-group">
                    <input type="text" name="lastName" value="{{$studentWithId['last_name']}}" class="form-control" placeholder="Enter last name"/>
                </div>
                
                <div class="form-group">
                    {{-- On submit : Calls update(Request $request, $id) in the controller assigned with the endpoint --}}
                    {{-- All the form entries will be served as a Request object --}}
                    <input type="submit" class="btn btn-primary" value="Update"/>
                    <a href="{{action('StudentController@index')}}" class="btn btn-warning">Cancel</a>
                </div>

            </form>
        </div>

    </div>
    
@endsection