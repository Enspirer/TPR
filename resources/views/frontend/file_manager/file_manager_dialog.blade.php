
<label class="form-label">{{$file_caption}}</label>
    <div type="text" style="border-color: grey; color: grey; padding: 45px; text-align: center; border-style: dashed; border-width: 1px;" data-bs-toggle="modal" data-bs-target="#file_manager_{{$file_input_name}}">
        <div class="" id="upload_content_{{$file_input_name}}">
            <h5>Upload Images</h5>
        </div>
    </div>

    <!-- Modal -->



    <!-- Modal -->
    <div class="modal fade" id="file_manager_{{$file_input_name}}" tabindex="-1" aria-labelledby="file_manager_{{$file_input_name}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">File Manager</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- <form action="{{ route('frontend.file_store') }}" class="dropzone" id="my-awesome-dropzone"></form> -->
                </div>
                <div class="modal-body">
                    
                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-upload-tab" data-bs-toggle="pill" data-bs-target="#pills-upload" type="button" role="tab" aria-controls="pills-upload" aria-selected="true">Upload</button>
                            <form action="{{ route('frontend.file_store') }}" class="dropzone" id="my-awesome-dropzone"></form>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-library-tab" data-bs-toggle="pill" data-bs-target="#pills-library" type="button" role="tab" aria-controls="pills-library" aria-selected="false">Library</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('frontend.file_store') }}" class="dropzone" id="my-awesome-dropzone">
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-library" role="tabpanel" aria-labelledby="pills-library-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover" id="villadatatable_{{$file_input_name}}" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">File</th>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody style="" >

                                        </tbody>
                                    </table>
                                </div>
                            </div><!--row-->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>



<script>
    function delete_image(element_id) {
        $('#'+element_id).remove();
    }

    $("#select_img_{{$file_input_name}}").click(function(){
        distroy_table{{$file_input_name}}();
        load_tables{{$file_input_name}}();
        $('#file_manager_{{$file_input_name}}').modal('show');
        console.log('aaa');

    });

    $('#myModal_{{$file_input_name}}').on('hidden.bs.modal', function (e) {
        console.log('assssseeeaa');
    });

    @if($multiple)
    function select_item{{$file_input_name}}(id,url) {
        $("#img_list{{$file_input_name}}").append('' +
            '<div class="col-md-3" id="'+ id +'">' +
            '<a class="" onclick="delete_image('+ id +')" style="background-color: #e91e63;padding: 2px;padding-left: 5px;padding-right: 16px;color: white;border-radius: 0px 19px 0px 0px;padding-left: 20px;">X</a>' +

            '<div class="card">' +
            '<div class="" style="height: 200px;background-image: url(\''+ url +'\');background-repeat: no-repeat;background-size: cover;"></div>' +
            ' </div>' +
            '<input type="hidden" value="'+ id +'" name="{{$file_input_name}}[]">'+
            '</div>');
    }
    @else
    function select_item{{$file_input_name}}(id,url) {
        $('#file_manager_{{$file_input_name}}').modal('hide');
        $('#upload_content_{{$file_input_name}}').hide();
        $('#image_content_{{$file_input_name}}').show();
        $('#image_{{$file_input_name}}').val(id);
        $('#image_preview_{{$file_input_name}}').attr('src',url);
    }
    @endif



    function distroy_table{{$file_input_name}}() {
        var table = $('#villadatatable_{{$file_input_name}}').DataTable();
        table.destroy();
    }



    function load_tables{{$file_input_name}}() {
        var table = $('#villadatatable_{{$file_input_name}}').DataTable({
            processing: true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw" style="color: greenyellow"></i>'},
            responsive: true,
            autoWidth: true,
            scrollY: "300px",
            order: [[ 0, "desc" ]],
            bAutoWidth: false,
            scrollCollapse: true,
            ajax: "{{route('frontend.user.getFileDetails',$file_input_name)}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'file', name: 'file',orderable: false, searchable: false},
                {data: 'file_name', name: 'file_name',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    $(function () {
        load_tables{{$file_input_name}}()
    });

    function autoajust{{$file_input_name}}() {
        var table = $('#villadatatable_{{$file_input_name}}').DataTable();
        $('#villadatatable_{{$file_input_name}}').css( 'display', 'block' );
        table.columns.adjust().draw();
    }

    //    autoajust();

    //    $(function () {
    //        load_tables()
    //    });
</script>