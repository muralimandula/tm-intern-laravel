@extends('master')

@section('content')
<div class="container">
	<h1>Ezepay Transactions</h1>	
            <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search by transaction Id.." title="Type in a transactionId">
                    </div>
                </div>
            </form>
            
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

            @if ($message = Session::get('success'))
                <div class="aler alert-success">
                    <p>{{$message}}</p>
                </div>
                
            @endif
            <table id="myTable" class="table">
                <tr>
                    <th>Transaction Id</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                @foreach ($allTransactions as $eachTransaction)
                    <form action={{action('TransactionController@update', $eachTransaction['transaction_id'])}} method="POST">
                        {{ csrf_field() }}
                        {{-- PATCH method instead of PUT, will see later --}}
                        <input type="hidden" name="_method"  value="PATCH"/>
                        <tr>
                            <td>{{$eachTransaction['transaction_id']}}</td>
                            <td>{{$eachTransaction['amount']}}</td>
                            <td>{{$eachTransaction['date']}}</td>
                            <td>{{$eachTransaction['status']}}</td>
                            <td>
                                <select name="newStatus" class="browser-default custom-select">
                                    <option selected>Change status</option>
                                    <option value="Refund">Refund</option>
                                    <option value="Chargeback">Chargeback</option>
                                    <option value="Blocked">Blocked</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Update"/>    
                            </td>
                        </tr>
                    </form>
                @endforeach
            </table>
        </div>

        <script>
            function myFunction() {
                var input, filter, table, tr, transactionId, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    transactionId = tr[i].getElementsByTagName("td")[0];
                    
                    if (transactionId) {
                        txtValue = (transactionId.textContent || transactionId.innerText) ;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
        </script>
@endsection