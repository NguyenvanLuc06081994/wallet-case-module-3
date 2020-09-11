@extends('wallet.html.index')
@section('content')
    <div class="container">
        <div>
            <form action="{{route('transactions.search')}}" method="post" id="search-transaction">
                @csrf
                <input type="date" name="date1" value="">
                <input type="date" name="date2">
                <input type="submit" value="Search" id="button-search" class="btn btn-success">
            </form>
        </div>
        <a href="{{route('transactions.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">Add new Transaction</a>
        <div>
            <table class="table table-hover" id="result">
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
                        <td>{{number_format("$transaction->money",0,",",".")}} VND</td>

                        <td>{{$transaction->transaction_at}}</td>@foreach($categories as $category)
                                @if($category->id == $transaction->category_id)
                                <td>{{$category->name}}</td>
                                <td>{{$category->type}}</td>
                                @endif
                            @endforeach


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
