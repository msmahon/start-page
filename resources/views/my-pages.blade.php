@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Your Pages</div>
        <ul class="list-group list-group-flush">
            @foreach ($pages as $page)
                <page-item :data="{{$page}}"></page-item>
            @endforeach
        </ul>
    </div>
    <a href="/pages/create" class="ml-3 mt-3" style="display: block;">+ New Page</a>
</div>
@endsection
