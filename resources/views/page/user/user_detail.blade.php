@extends('layout.app')

@section('content')
    <h3 class="my-3">Halaman User Detail</h3>

    <!-- START DATA -->
    <div class="card bg-body shadow-sm">
        <div class="my-3 p-3 rounded">
            <h4>Detail User</h4>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex row">
                        <dt class="col-sm-2">Username :</dt>
                        <dd class="col-sm-9">{{ $user->username }}</dd>
                    </li>
                    <li class="list-group-item d-flex row">
                        <dt class="col-sm-2">Role :</dt>
                        <dd class="col-sm-9"><span class="text-dark bg-info px-1 rounded">{{ $user->role }}</span></dd>
                    </li>
                    <li class="list-group-item d-flex row">
                        <dt class="col-sm-2">Tanggal Register :</dt>
                        <dd class="col-sm-9"><span class="fw-bold">{{ $user->created_at }}</span></dd>
                    </li>
                  </ul>
            </div>
        </div>
    </div>
    <!-- END DATA -->

@endsection
