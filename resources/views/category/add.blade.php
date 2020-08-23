
@extends('wallet.html.index')
@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Money In</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name" required>
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>

@endsection
