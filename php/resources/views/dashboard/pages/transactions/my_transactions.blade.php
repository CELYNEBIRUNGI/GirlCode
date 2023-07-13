@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Transaction Amount</th>
                    <th>Date created</th>
                </tr>
            </thead>
            <tbody>

                <?php $transactions = \DB::table('transactions')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                ?>

                @foreach ($transactions as $tip)
                    <tr>
                        <td>
                            {{ $tip->transaction_type }}
                        </td>
                        <td>
                            UGX {{ $tip->amount }}
                        </td>
                        <td>
                            {{ $tip->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $transactions->links() !!}
    </div>
@endsection
