@extends('admin_layouts.app')

@section('content')

    @php /** @var \App\Models\BlogPost $item */   @endphp
    <div class="container">
        @include('blog.admin.includes.result_messages')
        <form method="POST" action="{{route('blog.admin.posts.store', $item->id)}}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.posts.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.posts.includes.item_edit_add_col')
                </div>
            </div>
        </form>
        <br>


    </div>
@endsection
