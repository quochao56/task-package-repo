@extends('admin.main')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('. $menu->id.', \'/admin/menus/destroy\')" >
                <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
