@extends('admin.master.index')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Categories</h4>
        <div class="card">
            <h5 class="card-header">
                Categories
                <a href="{{route('admin.categories.create')}}" class="btn btn-success float-end">
                    <i class="bx bx-plus"></i>
                </a>
            </h5>
            <div class="table-responsive text-nowrap" style="min-height: 500px">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Number Of Products</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($categories as $index=>$category)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$category->name}}</strong></td>
                            <td>
                               <span> {{$category->fashions->count()}}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{route('admin.categories.edit', $category->id)}}">
                                            <i class="bx bx-edit-alt me-1"></i>Edit
                                        </a>
                                        <a class="dropdown-item btn-del"
                                           data-action="{{route('admin.categories.destroy', $category->id)}}"
                                           data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4" class="text-center">No Data Found.</th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
