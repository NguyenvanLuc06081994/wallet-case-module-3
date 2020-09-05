@extends('wallet.html.index')
@section('content')
    <div class="container">
        <form method="post" action="" class="form-group" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Transaction Money</label>
                <input type="text" class="form-control" name="money" value="{{$transaction->money}}" placeholder="1.000" required>
            </div>
            <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control" value="{{$transaction->transaction_at}}"  name="transaction_at"  required>
            </div>
            <label>Transaction Description</label>
            <div class="form-group">
                <textarea name="description" cols="124">{{$transaction->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Transaction Category</label>
                <select name="category_id" id="">
                    @foreach($categories as $category)
                        <option @if($category->id == $transaction->category_id) selected @endif value="{{$transaction->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </div>
        </form>
    </div>
@endsection
