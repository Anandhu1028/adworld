@extends('layouts.admin')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="px-2 py-3 ps-md-4 pe-md-3 page-body">
    <div class="row g-0">
        <div class="col-12">
            <div class="mb-3 card">
                <div class="card-header">
                    <h6 class="m-0">Home</h6>
                    <div class="form-check form-switch table-toggle-one">
                        <a href="{{route('awards_create')}}" class="btn btn-primary">Add</a>
                        {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalLive">Add image</button> --}}

                    </div>
                </div>
                <div class="card-body table-main-one ">
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle myDataTable table-hover "  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Heading</th>
                                    <th>description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($awards as $index=>$award )
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$award->headline}}</td>
                                        <td>{{$award->description}}</td>
                                        <td><img src="{{$award->img}}" alt="" width="151px"></td>
                                        <td>
                                            <a href="{{route('awards_edit',['id'=>$award->id])}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('awards_delete',['id'=>$award->id])}}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
