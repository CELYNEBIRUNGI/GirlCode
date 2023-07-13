@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        @if (Auth::user()->user_role == 2)
            <a href="{{ url('/account-add-article') }}" class="btn btn-sm btn-info">Add Article</a>
        @endif
        <table class="table bg-light p-4">
            <thead>
                <tr>
                    <th>Article Title</th>
                    <th>Article Content</th>
                    <th>Date created</th>
                </tr>
            </thead>
            <tbody>

                <?php $articles = \DB::table('articles')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
                ?>

                @foreach ($articles as $art)
                    <tr>
                        <td>
                            {{ $art->title }}
                        </td>
                        <td>
                            {{ $art->content }}
                        </td>
                        <td>
                            {{ $art->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $articles->links() !!}
    </div>
@endsection
