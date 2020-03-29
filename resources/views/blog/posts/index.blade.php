@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($items as $item)
            <div class="col-md-1">
              {{$item->id}}
            </div>
            <div class="col-md-9">
                {{$item->title}}
            </div>
            <div class="col-md-2">
                {{$item->created_at}}
            </div>
            @endforeach
        </div>
    </div>
@endsection

