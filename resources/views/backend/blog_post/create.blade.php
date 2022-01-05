@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="{{url('css/vendors.css')}}">

<form action="{{route('admin.blog_post.store')}}" enctype="multipart/form-data" method="post">
{{csrf_field()}}
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                   
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input name="title" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-control" required>
                                @foreach($BlogCategory as $blogCategorys)
                                    <option value="{{$blogCategorys->id}}">{{$blogCategorys->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label>Article <span class="text-danger">*</span></label>
                            <textarea type="text" id="editor" class="form-control" name="body" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Image <span class="text-danger">*</span></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="feature_image" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
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
                </div>
            </div><!--card-->
        </div><!--col-->

    </div>
</form>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

    
</script>

    
@endsection
