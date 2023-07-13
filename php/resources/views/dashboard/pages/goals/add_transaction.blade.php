@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <form action="{{ url('/add-transaction') }}" method="POST">
            @csrf
            <div class="col-md-5">
                <div class="form-group">
                    <input type="hidden" name="goal_id" value="{{ $calc->goal_id }}">
                    <input type="hidden" name="calc_id" value="{{ $calc->id }}">
                    <label for="">Transaction Amount</label>
                    <input type="number" name="transaction_amount" class="form-control" required placeholder="E.g 20000">
                </div>

            </div>
            <br>
            <div class="col-md-5">
                <select name="transaction_type" class="form-control">
                    <option value="DEPOSIT">DEPOSIT</option>
                    <option value="WITHDRAW">WITHDRAW</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Complete Transaction</button>
        </form>
    </div>
@endsection
