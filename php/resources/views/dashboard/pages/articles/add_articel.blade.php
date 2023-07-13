@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <form action="{{ url('/add-article') }}" method="POST">
            @csrf
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="">
                </div>
            </div>
            <br>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Add Article</button>
        </form>
    </div>
@endsection
