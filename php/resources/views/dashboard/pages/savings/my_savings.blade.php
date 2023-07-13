@extends('dashboard.layouts.main')

@section('content')
    <div class="container">

        <table class="table bg-light p-4">

            <tbody>
                <tr>
                    <td>Account Name</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td>{{ $my_savings->account_type }}</td>
                </tr>
                <tr>
                    <td>Account Balanace</td>
                    <td>UGX {{ $my_savings->account_balance }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
