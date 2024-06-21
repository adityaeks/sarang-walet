@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('danger') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::has('info'))
                <div class="alert alert-info alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('info') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <a href="{{ route('home.create') }}" class="btn btn-lg bg-gradient-success mb-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</a>

            <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding data -->
                            <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="font-weight-bold">GAMBAR</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    <!-- error message untuk name -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Judul Post">
                                    <!-- error message untuk name -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive table-bordered">
                <table class="table" id="alldata">
                    <thead class="text-center text-dark">
                        <tr>
                            <th class="fs-4" scope="col">No</th>
                            <th class="fs-4" scope="col">Image</th>
                            <th class="fs-4" scope="col">Name</th>
                            <th class="fs-4" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $item)
                            <tr>
                                <th class="fs-5" scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">
                                    <img src="{{ asset('/storage/images/home/'.$item->image) }}" class="rounded" style="width: 16%">
                                </th>
                                <th class="fs-5" scope="row">{{ $item->name }}</t5>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-lg bg-gradient-warning mx-2" data-bs-toggle="modal" data-bs-target="#editDataModal{{ $item->id }}">Edit</button>

                                        <!-- Edit Data Modal -->
                                        <div class="modal fade" id="editDataModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form for editing data -->
                                                        <form action="{{ route('home.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Image</label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Name</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item->name) }}" placeholder="Masukkan Judul Post">
                                                                <!-- error message untuk name -->
                                                                @error('name')
                                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form  onsubmit="return confirm('Are you sure want to delete it ?');" action="{{ route('home.delete', $item->id) }}" method="post"">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-lg bg-gradient-danger" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
