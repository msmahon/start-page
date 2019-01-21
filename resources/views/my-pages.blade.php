@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($pages as $page)
            <div class="col-md-4">
                <page-card :data="{{$page}}"></page-card>
            </div>
        @endforeach
    </div>
</div>
@endsection
