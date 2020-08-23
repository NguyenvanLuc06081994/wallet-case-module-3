@extends('wallet.html.index')
@section('content')
    <div class="container">
        <a href="{{route('outcomes.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">Add new money</a>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Money</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>

                @forelse($outcomes as $key => $outcome)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{number_format($outcome->money)}} VND</td>
                        <td>{{$outcome->date}}</td>
                        <td>{{$outcome->category->name}}</td>
                        <td><a href="{{route('outcomes.showFormEdit',$outcome->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                        <td><a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
