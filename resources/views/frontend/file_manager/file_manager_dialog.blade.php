@if($multiple)
    <div class="form-group">
        <label class="form-label">{{$file_caption}}</label>
        <div class="row" id="img_list{{$file_input_name}}">
            <div class="col-md-3" id="select_img_{{$file_input_name}}">
                <div  type="text" class="" style="border-color: grey;color: grey; padding: 45px;text-align: center;border-style: dashed;border-width: 1px;">
                    <br>
                    <div class="" id="upload_content_{{$file_input_name}}">
                        <h3>Upload Image</h3>
                        <small>Upload Images</small>
                    </div>
                    <div class="" id="image_content_{{$file_input_name}}" style="display: none">
                        <input type="hidden" name="{{$file_input_name}}" id="image_{{$file_input_name}}">
                        <img src="" id="image_preview_{{$file_input_name}}" style="height: 200px;">
                    </div>
                </div>
            </div>
            @if($data)
                @foreach($data as $imgDat)
                    <div class="col-md-3" id="impack_{{$imgDat}}">
                        <a class="" onclick="delete_image('impack_{{$imgDat}}')" style="background-color: #e91e63;padding: 2px;padding-left: 5px;padding-right: 16px;color: white;border-radius: 0px 19px 0px 0px;padding-left: 20px;">X</a>

                        <div class="card">

                            <div class="" style="height: 200px;background-image: url('{{file_manager_get_url($imgDat)}}');background-repeat: no-repeat;background-size: cover;"></div>
                        </div>
                        <input type="hidden" value="{{$imgDat}}" name="{{$file_input_name}}[]">
                    </div>
                @endforeach
            @else

            @endif
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade  bd-example-modal-lg" id="file_manager_{{$file_input_name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">File Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
    </div>
@else
    <div class="form-group">
        <label class="form-label">{{$file_caption}}</label>
        <div id="select_img_{{$file_input_name}}" type="text" class="" style="border-color: grey;color: grey; padding: 10px;text-align: center;border-style: dashed;border-width: 1px;">


            @if($data)
                <div class="" id="upload_content_{{$file_input_name}}">
                </div>
                <div class="" id="image_content_{{$file_input_name}}" style="">
                    <input type="hidden" name="{{$file_input_name}}" value="{{$data}}" id="image_{{$file_input_name}}">
                    <img src="{{url('files/'.$data)}}" id="image_preview_{{$file_input_name}}" style="height: 200px;width: 200px;">
                </div>

            @else
                <br>
                <div class="" id="upload_content_{{$file_input_name}}">
                    <h3>Upload Image</h3>
                    <small>Upload Images</small>
                </div>
                <div class="" id="image_content_{{$file_input_name}}" style="display: none">
                    <input type="hidden" name="{{$file_input_name}}" id="image_{{$file_input_name}}">
                    <img src="" id="image_preview_{{$file_input_name}}" style="height: 200px;">
                </div>
            @endif



        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade  bd-example-modal-lg" id="file_manager_{{$file_input_name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">File Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
    </div>
@endif





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
            ajax: "{{route('frontend.user.getFileDetails')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'file', name: 'file',orderable: false, searchable: false},
                {data: 'file_name', name: 'file_name',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }


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