@extends('admin.main')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
            <tr>{{ $category->id }}</tr>
            <tr>{{ $category->name }}</tr>
            <tr>{{ $category->description }}</tr>
            <tr>{{ $category->created_at }}</tr>
            <tr>{{ $category->updated_at }}</tr>
            <tr></tr>
        @endforeach
        <tr></tr>
    </tbody>
</table>
@endsection
