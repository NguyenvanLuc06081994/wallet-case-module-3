@extends('wallet.html.index')
@section('content')
  <div class="">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Money</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                @if($transaction->category->type =='in')
            <tr>
                <th scope="row">{{$transaction->transaction_at}}</th>
                <td><a href="{{route('transactions.showFormEdit',$transaction->id)}}">{{$transaction->category->name}}</a></td>
                <td>{{$transaction->category->type}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->money}}</td>

            </tr>
            @endif
            @endforeach
            <tr>
                <td colspan="5" style="text-align: left">Total: {{$totalIn}}</td>
            </tr>
            </tbody>
        </table>
  </div>
    <div class="">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Money</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                @if($transaction->category->type =='out')
                    <tr>
                        <th scope="row">{{$transaction->transaction_at}}</th>
                        <td><a href="{{route('transactions.showFormEdit',$transaction->id)}}">{{$transaction->category->name}}</a></td>
                        <td>{{$transaction->category->type}}</td>
                        <td>{{$transaction->description}}</td>
                        <td>{{$transaction->money}}</td>

                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="5" style="text-align: left">Total: {{$totalOut}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
