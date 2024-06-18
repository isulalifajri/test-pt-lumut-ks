@extends('layout.app')

@section('content')
    <div class="my-5">
        <div class="card col-sm-7 m-auto">
            <div class="card-header text-center">
                <h3>Tambah Post</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('store.post') }}" method="POST">
                    @csrf
                    <label for="title" class="form-label">Title:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label for="content" class="form-label">content:</label>
                    <div class="input-group mb-3">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10"> {{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

    
                    <button type="submit" class="btn btn-primary">Save</button>
                    
    
                </form>
            </div>
        </div>
        <!-- END FORM -->
    </div>

@endsection

