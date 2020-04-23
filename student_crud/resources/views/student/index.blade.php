@extends('master')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($allStudents as $eachStudent)
                        <tr>
                            <td>{{$eachStudent['first_name']}}</td>
                            <td>{{$eachStudent['last_name']}}</td>
                            <td><a href="{{action('StudentController@edit', $eachStudent['id'])}}" class="btn btn-warning">Edit</a></td>

                            <td>
                                <form class="delete_form" action="{{action('StudentController@destroy', $eachStudent['id'])}}" method="post">
                                    {{ csrf_field() }}
                                    <input value="DELETE" type="hidden" name="_method">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if ($message = Session::get('success'))
                    <div class="aler alert-success">
                        <p>{{$message}}</p>
                    </div>
                    
                @endif
                <a href="{{route('student.create')}}" class="btn btn-primary">Add</a>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('.delete_form').on('submit', function(){
                    if (confirm("Are you sure want to delete it?")) {
                        return true;
                    } else {
                        return false;
                    }
                });
            });
        </script>
@endsection