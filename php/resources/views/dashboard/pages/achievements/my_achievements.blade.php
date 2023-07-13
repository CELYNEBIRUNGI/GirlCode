@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Archievement Name </th>
                    <th>Description</th>
                    <th>Date earned</th>
                    {{-- <th>Date created</th> --}}
                </tr>
            </thead>
            <tbody>

                <?php $achievements = \DB::table('achievements')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                ?>

                @foreach ($achievements as $achievement)
                    <tr>
                        <td>
                            {{ $achievement->name }}
                        </td>
                        <td>
                            {{ $achievement->description }}
                        </td>
                        <td>
                            {{ $achievement->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $achievements->links() !!}
    </div>
@endsection
