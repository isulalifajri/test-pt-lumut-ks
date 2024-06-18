@extends('layout.app')

@section('content')
    <h3 class="my-3">Halaman Users</h3>

    <!-- START DATA -->
    <div class="card">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3>List Data User</h3>
            <a href="{{ route('tambah-data') }}" class="btn btn-primary">Tambah Data</a>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Username</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Role</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $paginate => $item)
                        <tr>
                            <td>{{ $users->firstItem() + $paginate  }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <span class="badge {{ $item->role == 'admin' ? 'bg-primary' : 'bg-info'  }}">{{ $item->role }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('users.detail', $item->id)  }}" class="btn btn-warning btn-sm">Detail</a>
                                    <a href="{{ route('users.edit', $item->id)  }}" class="btn btn-info btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" style="text-align: center"><h3> Tidak ada data dalam Tabel</h3></td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END DATA -->

@endsection

