@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                

                <div class="card-body">
                    <form action="{{route('admin.help.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input name="title" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input name="order" type="number" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                        <div class="mt-3 text-right mt-4">
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create New</button>
                        </div>
                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


@endsection
