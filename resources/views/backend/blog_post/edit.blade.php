@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">


    <div class="row">
        <div class="col">
            <div class="card">
                
                <div class="card-body">
                    <form action="{{route('admin.blog_post.update')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}

                        <div class="row">
                            
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input name="title" value="{{$blog_post->title}}" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-control" required>
                                @foreach($BlogCategory as $blogCategorys)
                                    <option value="{{$blogCategorys->id}}" {{$blog_post->category_id == $blogCategorys->id ? "selected" : "" }}>{{$blogCategorys->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label>Article <span class="text-danger">*</span></label>
                            <textarea type="text" id="editor" class="form-control" name="body" rows="6">{!!$blog_post->body!!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image <span class="text-danger">*</span></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="feature_image" value="{{$blog_post->feature_image}}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label>Order <span class="text-danger">*</span></label>
                            <input name="order" type="number" value="{{$blog_post->order}}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $blog_post->status == "1" ? "selected" : "" }} >Enable</option>
                                <option value="0" {{ $blog_post->status == "0" ? "selected" : "" }} >Disable</option>
                            </select>
                        </div>

                        <div class="mt-3 text-right mt-4">
                            <input name="id" type="text" hidden class="form-control" value="{{$blog_post->id}}">
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                        </div>

                    </form>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


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
