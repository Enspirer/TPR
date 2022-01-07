@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <form action="{{route('admin.help.update')}}" method="post">
                        {{csrf_field()}}
                        
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input name="title" type="text" class="form-control" value="{{$help->title}}" required>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="3" required>{{$help->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input name="order" type="number" value="{{$help->order}}" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $help->status == "1" ? "selected" : "" }} >Enable</option>
                                <option value="0" {{ $help->status == "0" ? "selected" : "" }} >Disable</option>
                            </select>
                        </div>
                        <div class="mt-3 text-right mt-4">
                            <input type="hidden" name="hidden_id" value="{{$help->id}}">
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


@endsection
