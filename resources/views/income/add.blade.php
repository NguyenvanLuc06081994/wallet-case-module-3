@extends('wallet.html.index')
@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Money In</label>
            <input type="number" class="form-control" name="money" placeholder="Money in" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" >
                @foreach($categories as $key => $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control" name="date" value="" required>
        </div>
        <label>Note</label>
        <div class="form-group">
            <textarea name="note" cols="118"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>

@endsection
