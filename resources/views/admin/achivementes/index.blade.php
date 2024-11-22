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
                        <a href="" class="btn btn-primary">Contents</a>
                        {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalLive">Add image</button> --}}

                    </div>
                </div>
                <div class="card-body table-main-one">
                    <div class="table-responsive" >
                        <table class="table mb-0 align-middle myDataTable table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                 
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($achievements as $index=>$achivement )
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$achivement->type}}</td>
                                        <td>
                                            <a href="{{route('achievement_show',['id'=>$achivement->id])}}" class="btn btn-warning">Open</a>
                                            <a href="{{route('achievement_all_delete',['id'=>$achivement->id])}}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                @foreach ($achievements as $index=>$achivement )
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$achivement->type}}</td>
                                    <td>{{$achivement->description}}</td>
                                    
                                    
                                    
                                    <td>
                                        <a href="{{route('achievement_show',['id'=>$achivement->id])}}" class="btn btn-warning">Open</a>
                                        <a href="{{route('achievement_all_delete',['id'=>$achivement->id])}}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <form action="{{route('achievement_store')}}" method="POST">
                                        @csrf
                                        <td></td>
                                        <td><div class="w-50">
                                            <span class="">
                                                <input type="text" class="form-control" id="TextInput" placeholder="Name" name="name" required>
                                            </span>
                                        </div></td>
                                        <td><button type="submit" class="btn btn-primary">Add</button></td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
