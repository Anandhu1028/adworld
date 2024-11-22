@extends('layouts.admin')

@section('body')
<div class="ps-md-4 pe-md-3 px-2 py-3 page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body card-main-three">
                    <h5 class="m-4">Add Event </h5>
                    <form class="form-floating" action="{{route('awards_update',['id'=>$awards->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <span class="form-floating">
                                <input type="text" class="form-control" value="{{$awards->headline}}" id="TextInput" placeholder="Name" name="headline" required>
                                <label class="" for="TextInput">Headline</label>
                            </span>
                        </div>
                        <div class="mb-4">
                            <span class="form-floating">

                                <textarea class="form-control" id="TextInput" placeholder="" value="{{$awards->description}}" name="description" required cols="30" rows="50">{{$awards->description}}</textarea>
                                <label class="" for="TextInput">Description</label>
                            </span>
                        </div>
                        <div class="mb-4">
                            <span class="form-floating">
                                <input type="file" class="form-control" id="TextInput" placeholder="img" value="{{$awards->img}}" name="img" >
                                <label class="" for="TextInput">Image</label>
                                <img src="{{$awards->img}}" alt="" width='100px'>
                            </span>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/admin/awards" class="btn btn-outline-secondary ms-2">Cancel</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
