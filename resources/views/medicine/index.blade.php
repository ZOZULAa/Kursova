@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div>
        <a href="{{ route('medicine.create') }}">
            <button type="button" class="my-3 btn btn-outline-dark">Add</button>
        </a>
    </div>
    
    <form action="{{ route('medicine') }}" method="GET" class="mt-2 mb-3">
        <select class="form-control" name="category_id" onchange="this.form.submit()">
            <option value=''>Всі</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{($categ ?? '') == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                @endforeach
        </select>
    </form>
    <div class="mb-5 ">
    @if (count($medicines ?? []) > 0)
        <table id="medicineTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $medicine->title }}</td>
                        <td>{{ $medicine->category->title ?? 'N/A' }}</td>
                        <td>{{ $medicine->price }}</td>
                        <td>{{ $medicine->count }}</td>
                        <td>
                            <a href="{{ route('medicine.show', $medicine->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('medicine.edit', $medicine->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('medicine.delete', $medicine->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No results found.</p>
    @endif
    </div>
@endsection



@section('script')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready( function () {
        $('#medicineTable').DataTable();
    } );
</script>
@endsection