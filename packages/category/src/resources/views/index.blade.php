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
            <tr>
                <a class="btn btn-primary btn-sm" href="/admin/category/edit/{{ $category->id }} "><i class="fas fa-edit"></i></a>

            </tr>
        @endforeach
        <tr></tr>
    </tbody>
</table>
@endsection

