@extends('master')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark">
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
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection