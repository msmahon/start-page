@extends('layouts.app') 
@section('content')
<div class="container">
    <form action="/pages" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Page Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="theme">Theme</label>
            <select name="theme" id="theme" class="form-control">
                <option value="default">Default</option>
                <option value="cool">Cool</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Create Page</button>
        </div>
    </form>
</div>
@endsection