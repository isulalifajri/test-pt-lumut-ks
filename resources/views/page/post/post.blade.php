@extends('layout.app')

@section('content')
    <h3 class="my-3">Halaman Post</h3>

    <!-- START DATA -->
    <div class="card">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3>List Data Post</h3>
            <a href="{{ route('tambah-post') }}" class="btn btn-primary">Tambah Data</a>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Author</th>
                            <th class="col-md-2">Title</th>
                            <th class="col-md-2">Content</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $paginate => $item)
                        <tr>
                            <td>{{ $posts->firstItem() + $paginate  }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td>
                                @php
                                    $user = Auth::user();
                                @endphp

                                @if ($user && ($user->role == 'admin' || $user->id == $item->user_id))
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy.post', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @else
                                 <button class="btn btn-info">For User Athor Not Update Or Delete</button>
                                @endif
                                {{-- <div class="d-flex gap-1">
                                    <a href="{{ route('posts.edit', $item->id)  }}" class="btn btn-info btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy.post', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div> --}}
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

