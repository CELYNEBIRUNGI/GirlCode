@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <a href="{{ url('/account-add-goal') }}" class="btn btn-info">Add Goal</a>
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Goal Target Amount (UGX) </th>
                    <th>Current Progress (UGX) </th>
                    <th>Completion Status</th>
                    <th>Date created</th>
                </tr>
            </thead>
            <tbody>

                <?php $goals = \DB::table('goals')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
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
                            {{ $goal->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $goals->links() !!}
    </div>
@endsection
