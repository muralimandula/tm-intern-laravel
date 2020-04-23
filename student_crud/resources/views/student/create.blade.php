@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">

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

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
        @endif
        {{-- url('student')  is an endpoint like localhost:port/student --}}
        {{-- Invokes the controller assigned to that endpoint ('student') in web.php as Route--}}
        <form method="POST" action="{{url('student')}}">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="firstName" class="form-control" placeholder="Enter first name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" class="form-control" placeholder="Enter last name"/>
                </div>
                <div class="form-group">
                    {{-- On submit : Calls store(Request $request) in the controller assigned with the endpoint --}}
                    {{-- All the form entries will be served as a Request object --}}
                    <input type="submit" class="btn btn-primary"/>
                </div>
              </form>
        </div>
    </div>
@endsection