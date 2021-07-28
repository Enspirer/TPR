<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css'>

<label for="photo" class="form-label mb-0 required">{{$fm_caption}}</label>

<div class="row">
    <div class="col-md-12" data-bs-toggle="modal" data-bs-target="#file_manager{{$fm_name}}">
        <div class="" style="padding: 10px;text-align:center;border-style: dashed;border-width: 1px;border-color: grey">
            <br>
            <i class="fa fa-plus"></i> <br><br>
            Upload
        </div>
    </div>
</div>

@push('dialog_modal')
<div class="modal fade bd-example-modal-lg" id="file_manager{{$fm_name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image Selector - {{$fm_caption}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Media Select</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
                        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
                        <!-- Change /upload-target to your upload address -->
                        <form action="/upload-target" class="dropzone"></form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            @foreach(\App\Models\FileManager::where('user_id',auth()->user()->id)->get() as $files)
                                <div class="col-md-4">
                                    {{$files->file_name}}

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Select</button>
            </div>
        </div>
    </div>
</div>

@endpush
