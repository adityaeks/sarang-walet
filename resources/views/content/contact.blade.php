@extends('layouts.main')

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

            <a href="{{ route('contact.create') }}" class="btn btn-lg bg-gradient-success mb-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</a>

            <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding data -->
                            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf            
            
                                <div class="form-group">
                                    <label class="font-weight-bold">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Judul Post">
                                    <!-- error message untuk name -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Masukkan Judul Post">
                                    <!-- error message untuk phone -->
                                    @error('phone')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Judul Post">
                                    <!-- error message untuk email -->
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="message...">{{ old('message') }}</textarea>
                                    <!-- error message untuk message -->
                                    @error('message')
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
                            <th class="fs-4" scope="col">Name</th>
                            <th class="fs-4" scope="col">Phone</th>
                            <th class="fs-4" scope="col">Email</th>
                            <th class="fs-4" scope="col">Message</th>
                            <th class="fs-4" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $item)
                            <tr>
                                <th class="fs-5" scope="row">{{ $loop->iteration }}</th>
                                <th class="fs-5" scope="row">{{ $item->name }}</th>                                
                                <th class="fs-5" scope="row">{{ $item->phone }}</th>                                
                                <th class="fs-5" scope="row">{{ $item->email }}</th>                                
                                <th class="fs-5" scope="row">{{ $item->message }}</th>                                
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
                                                        <form action="{{ route('contact.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                                
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Name</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item->name) }}">
                                                                <!-- error message untuk name -->
                                                                @error('name')
                                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Phone</label>
                                                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $item->phone) }}">
                                                                <!-- error message untuk phone -->
                                                                @error('phone')
                                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Email</label>
                                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $item->email) }}">
                                                                <!-- error message untuk email -->
                                                                @error('email')
                                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Message</label>
                                                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4">{{ old('message', $item->message) }}</textarea>
                                                                <!-- error message untuk message -->
                                                                @error('message')
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
                                
                                        <form  onsubmit="return confirm('Are you sure want to delete it ?');" action="{{ route('contact.delete', $item->id) }}" method="post"">    
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