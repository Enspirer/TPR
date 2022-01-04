@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <form action="{{route('admin.blog_category.update')}}" method="post">
                        {{csrf_field()}}
                        <input name="id" type="text" hidden class="form-control" value="{{$blog_category->id}}">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input name="name" type="text" class="form-control" value="{{$blog_category->name}}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"  rows="3">{{$blog_category->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input name="order" type="number" value="{{$blog_category->order}}" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $blog_category->status == "1" ? "selected" : "" }} >Enable</option>
                                <option value="0" {{ $blog_category->status == "0" ? "selected" : "" }} >Disable</option>
                            </select>
                        </div>
                        <div class="mt-3 text-right mt-4">
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


@endsection
