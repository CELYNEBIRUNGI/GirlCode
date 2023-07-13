@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Goal Target Amount (UGX) </th>
                    <th>Current Progress (UGX) </th>
                    <th>Completion Status</th>
                    <th>Principle Amount</th>
                    <th>Date created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $goals = \DB::table('goals')
                    ->join('savings_calculators', 'savings_calculators.goal_id', '=', 'goals.id')
                    ->where('goals.user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->select('savings_calculators.*', 'goals.target_amount', 'goals.current_progress', 'goals.completion_status')
                    ->paginate(20);
                ?>

                @foreach ($goals as $goal)
                    <tr>
                        <td>
                            {{ $goal->target_amount }}
                        </td>
                        <td>
                            {{ $goal->current_progress }}
                        </td>
                        <td>
                            {{ $goal->completion_status }}
                        </td>
                        <td>
                            {{ $goal->principal_amount }}
                        </td>
                        <td>
                            {{ $goal->created_at }}
                        </td>
                        <td>
                            <a href="{{ url("/account-add-transaction/$goal->goal_id") }}"
                                class="btn btn-sm btn-info">Transact</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $goals->links() !!}
    </div>
@endsection
