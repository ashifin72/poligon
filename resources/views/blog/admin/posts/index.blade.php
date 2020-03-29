@extends('admin_layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary">Добавить Пост</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Автор</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $posts)
                                @php /** \App\Models\BlogPost $posts */   @endphp
                                <tr @if(!$posts->is_published) style="background:#cccccc" @endif>
                                    <td class="">
                                        {{$posts->id}}
                                    </td>
                                    <td class="">
                                        {{$posts->user->name}}
                                    </td>
                                    <td class="">
                                        {{$posts->category->title}}
                                    </td>
                                    <td class="">
                                        <a href="{{route('blog.admin.posts.edit', $posts->id)}}">{{$posts->title}}</a>

                                    </td>
                                    <td >
                                        {{$posts->published_at ? \Carbon\Carbon::parse($posts->published_at)->format('d.M H:i' ): ''}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
@endsection

