@extends('wallet.html.index')
@section('content')
    <div class="container">
        <a href="{{route('transactions.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">Add new Transaction</a>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Money</th>h>
                </tr>
                </thead>
                <tbody>

                @forelse($wallets as $key => $wallet)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$wallet->money}}</td>
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

