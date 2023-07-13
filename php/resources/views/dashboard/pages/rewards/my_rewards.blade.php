@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Reward Name</th>
                    <th>Description</th>
                    <th>Point Cost</th>
                    <th>Date Rewarded</th>
                    <th>Date Redeemed</th>
                </tr>
            </thead>
            <tbody>

                <?php $rewards = \DB::table('rewards')
                    ->join('user_rewards', 'rewards.id', '=', 'user_rewards.reward_id')
                    ->where('user_rewards.user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->select('user_rewards.*', 'rewards.name', 'rewards.description', 'rewards.point_cost')
                    ->paginate(20);
                ?>

                @foreach ($rewards as $reward)
                    <tr>
                        <td>
                            {{ $reward->name }}
                        </td>
                        <td>
                            {{ $reward->description }}
                        </td>
                        <td>
                            {{ $reward->point_cost }}
                        </td>
                        <td>
                            {{ $reward->created_at }}
                        </td>
                        <td>
                            {{ $reward->date_redeemed ?? 'Not redeemed' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $rewards->links() !!}
    </div>
@endsection
