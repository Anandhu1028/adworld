@extends('layouts.admin')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="ps-md-4 pe-md-3 px-2 py-3 page-body">
    <div class="row g-0">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="m-0">Home</h6>
                    <div class="form-check form-switch table-toggle-one">
                        {{-- <a href="{{ route('service_add',['id' => 7])}}" class="btn btn-primary">Contents</a> --}}
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalLive">Add image</button>

                    </div>
                </div>
                <div class="modal fade" id="exampleModalLive" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLiveLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="uploadForm" action="{{ route('gallery_store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <span class="form-floating">
                                            <input type="file" class="form-control" id="imageInput" name="image" accept="image/*" required>
                                            <label for="imageInput">Image</label>
                                        </span>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                
                <div class="card-body table-main-one">
                    <div class="table-responsive">
                        <table class="myDataTable table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i < count($gallery); $i++)
                                @php
                                    $item = $gallery[$i];
                                @endphp
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td><img src="{{$item->image}}" alt="" style="width:100px;height:100px;"></td>
                                    <td>
                                        <a href="{{ route('gallery_delete',['id' => $item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <script>
                    document.getElementById('uploadForm').addEventListener('submit', function(event) {
                        const fileInput = document.getElementById('imageInput');
                        const file = fileInput.files[0];
                        if (file && file.size > 1 * 1024 * 1024) { // Check if file size is greater than 1MB
                            alert('File size exceeds 1MB. Please choose a smaller file.');
                            event.preventDefault(); // Prevent form submission
                        }
                    });
                </script>
                
</div>
@endsection
