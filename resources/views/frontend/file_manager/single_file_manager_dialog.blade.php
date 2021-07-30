
<label class="form-label">{{$file_caption}}</label>
    <div type="text" class="box" style="border-color: grey; color: grey; padding: 35px; text-align: center; border-style: dashed; border-width: 1px;" data-bs-toggle="modal" data-bs-target="#file_manager_{{$file_input_name}}">
        <div id="upload_content_{{$file_input_name}}">
            <h5>Upload Images</h5>
        </div>
    </div>

    <div id="id_single">
        @foreach($data as $d)
            <p>{{ App\Models\FileManager::where('id', $d) -> first() -> id }}</p>
        @endforeach
    </div>
    <div class="upload_single mt-3 row">
        @foreach($data as $d)
            <div class="col-3 text-end">
                <img src="{{ url('images', App\Models\FileManager::where('id', $d) -> first() -> file_name) }}" style="height: 150px;" class="w-100"></img>
                <i class="bi bi-x close-image" style="position: relative; top: -9.5rem; color: white; font-size: 25px; cursor: pointer;"></i>
            </div>    
        @endforeach
    </div>

    <!-- Modal -->

    



    <!-- Modal -->
    <div class="modal fade" id="file_manager_{{$file_input_name}}" tabindex="-1" aria-labelledby="file_manager_{{$file_input_name}}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
            paging: false,
            searching: false,
            ajax: "{{route('frontend.user.getFileDetails',$file_input_name)}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'file', name: 'file',orderable: false, searchable: false},
                {data: 'file_name', name: 'file_name',orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function( oSettings ) {
                dropBox1();
            }
        });
    }

    $(function () {
        load_tables{{$file_input_name}}();
    });


    function autoajust{{$file_input_name}}() {
        var table = $('#villadatatable_{{$file_input_name}}').DataTable();
        $('#villadatatable_{{$file_input_name}}').css( 'display', 'block' );
        table.columns.adjust().draw();
    }

  


    $('#pills-library-tab').on('click', function() {
        var table = $('#villadatatable_{{$file_input_name}}').DataTable();
        table.ajax.reload(); 
    })


    $( document ).ready(function() {
        $('.close-image').off('click').on('click', function() {
            let id = $(this).parent().index();
            console.log(id);
            $('#id').find("p:nth-child("+(id + 1)+")").remove();
            $(this).parent().remove();
        })
    });

    function dropBox1() {
        var type = "<?php echo $multiple; ?>";

        if(type == 1) {
            $('.append').off('click').on('click', function(){
                let image = $(this).parents("tr").find('td:nth-child(2)').children().attr('src');
                let id = $(this).parents("tr").find('.sorting_1').text();
                $('.upload_single').append(`<div class="col-3 text-end"><img src="${image}" style="height: 150px;" class="w-100"></img> <i class="bi bi-x close-image" style="position: relative; top: -9.5rem; color: white; font-size: 25px; cursor: pointer;"></i></div>`);
                $('#id_single').append(`<p>${id}</p>`);
            });

            $('#file_manager_{{$file_input_name}}').on('hide.bs.modal', function (e) {
                $('.close-image').off('click').on('click', function() {
                    let id = $(this).parent().index();
                    $('#id').find("p:nth-child("+(id + 1)+")").remove();
                    $(this).parent().remove();
                })
            })
        }
        else {
            $('.append').off('click').on('click', function(){
                let image = $(this).parents("tr").find('td:nth-child(2)').children().attr('src');
                let id = $(this).parents("tr").find('.sorting_1').text();
                $('.upload_single').html(`<div class="col-3 text-end"><img src="${image}" style="height: 150px;" class="w-100"></img> <i class="bi bi-x close-image" style="position: relative; top: -9.5rem; color: white; font-size: 25px; cursor: pointer;"></i></div>`);
                $('#id_single').html(`<p>${id}</p>`);
                // $('.append').off('click');
            });   

            $('#file_manager_{{$file_input_name}}').on('hide.bs.modal', function (e) {
                $('.close-image').on('click', function() {
                    let id = $(this).parent().index();
                    $(this).parents('.upload_single').siblings('#id_single').empty();
                    $(this).parent().remove();
                })
            })
        }
    }

    // $('#file_manager_{{$file_input_name}}').on('hide.bs.modal', function (e) {
    //     $('.close-image').on('click', function() {
    //         // let id = $(this).parents('.upload').siblings('#id').text();
    //         let id = $(this).parent().index();
    //         console.log(id);
    //         $(this).parents('.upload').siblings('#id').remove();
    //         $(this).parent().remove();
            
    //     })
    // })



    
    
</script>

<!-- <div class="row">
    <div class="col-3">
        <img src="${image}" style="height: 150px;" class="w-100"></img>
    </div>
</div> -->

<!-- <i class="bi bi-x" style="position: absolute; top: -0.4rem; left: 6.1rem; color: white; font-size: 25px; cursor: pointer;"></i> -->

<!-- <img src="${image}" style="height: 120px; display:inline-block; margin: 5px"></img> -->