@extends('layout.admin')

@section('main')
    <div class="container-fluid">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">{{ __('button.create') }}</a>
    </div>
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        @foreach($posts->getUrlRange($posts->currentPage() - 4, $posts->currentPage() + 4) as $page => $url)
                            @if($page > 0 && $page <= $posts->lastPage())
                                <li class="page-item {{ $posts->currentPage() == $page ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
{{--                                <a href="{{ $url }}" class="feed-pag-item {{ $posts->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>--}}
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">Дата</th>
                            <th>Заголовок</th>
                            <th>Автор</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-nowrap">{{ $post->created_at }}</td>
                                <td>{{ $post->title }}</td>
                                <td class="text-nowrap">{{ $post->user->full_name }}</td>
                                <td class="text-nowrap" style="width: .1%">
                                    <a class="btn btn-primary" href="{{ route('admin.blog.edit', ['id' => $post->id]) }}">{{ __('button.edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
