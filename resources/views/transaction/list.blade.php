@extends('wallet.html.index')
@section('content')
    <div class="container">
        <a href="{{route('transactions.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">Add new Transaction</a>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Money</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Type</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>

                @forelse($transactions as $key => $transaction)
                    <tr>
                        <th scope="row">{{++$key}}</th>
{{--                        {{$transaction->money}}--}}
                        <td>{{number_format("$transaction->money",0,",",".")}} VND</td>

                        <td>{{$transaction->transaction_at}}</td>
                        <td>{{$transaction->category->name}}</td>
                        <td>{{$transaction->category->type}}</td>
                        <td><a href="{{route('transactions.showFormEdit',$transaction->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{{route('transactions.delete',$transaction->id)}}" onclick="return confirm('are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                @empty
                    <tr>
                        <td>No Data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
