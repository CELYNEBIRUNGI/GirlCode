@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php $nots = \DB::table('notifications')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                ?>

                @foreach ($nots as $not)
                    <tr>
                        <td>
                            {{ $not->title }}
                        </td>
                        <td>
                            {{ $not->content }}
                        </td>
                        <td>
                            {{ $not->created_at }}
                        </td>
                        <td>
                            @if ($not->status_flag)
                                <a href="#">Seen</a>
                            @else
                                <a href="{{ url("/mark_as_read/$not->id") }}">Mark as read</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $nots->links() !!}
    </div>
@endsection
