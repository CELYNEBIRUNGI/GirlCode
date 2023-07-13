@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <form action="{{ url('/add-goal') }}" method="POST">
            @csrf
            <div class="col-md-5">
                <div class="form-group">
                    <label for="">Target Amount</label>
                    <input type="number" name="target_amount" class="form-control" required placeholder="E.g 20000">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Add Goal</button>
        </form>
    </div>
@endsection
