@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        @if (Auth::user()->user_role == 2)
            <a href="{{ url('/account-add-financial-tip') }}" class="btn btn-info btn-sm">Add Financial Tip</a>
        @endif
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Tip Title</th>
                    <th>Tip Content</th>
                    <th>Date created</th>
                </tr>
            </thead>
            <tbody>

                <?php $financial_tips = \DB::table('financial_tips')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                ?>

                @foreach ($financial_tips as $tip)
                    <tr>
                        <td>
                            {{ $tip->title }}
                        </td>
                        <td>
                            {{ $tip->content }}
                        </td>
                        <td>
                            {{ $tip->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $financial_tips->links() !!}
    </div>
@endsection
