@extends('wallet.html.index')
@section('content')
    <div class="form-group">
        <form method="post" action="" class="form-group" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category Name" required>
            </div>
            <div class="form-group">
                <label>Category Type</label>
                <select name="type" id="">
                    <option value="in">In</option>
                    <option value="out">Out</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="ADD" class="btn btn-primary">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </div>
        </form>
    </div>
@endsection
