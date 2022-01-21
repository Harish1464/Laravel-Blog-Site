@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('gallery_form')}}">Add Gallery</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Gallery Title</th>
                        <th>Gallery Image</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($gallery_info)
                            @foreach($gallery_info as $gallery)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$gallery->title}}</td>
                                <td>
                                  @foreach((explode(", ",$gallery->image)) as $item)
                                  <dd>{{$item}}</dd>	
                                  @endforeach	
                              </td>
                              <a href="{{asset('../uploads/gallery/'.$gallery->gallery_image)}}" class="btn btn-primary btn-sm" data-toggle="lightbox"> <img src="{{asset('../uploads/gallery/'.$gallery->gallery_image)}}" class="img-fluid"></a>
                              <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_gallery{{$gallery->id}}"><i class="fa fa-eye"></i> </button>
                                  {{-- <a href="{{route('edit_gallery', $gallery->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>  --}}
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$gallery->id}}"  rel1="gallery/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_gallery', $gallery->id)}}" method="delete"></form>
                                </td>
                            </tr>
                            @endforeach

                        @endif
                  </tbody>
                </table>
                <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="row">
                        @isset($gallery_info)
                            @foreach($gallery_info as $gallery)
                              @foreach((explode(", ",$gallery->image)) as $item)
                                <a href="{{asset('../uploads/gallery/'.$item)}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                                    <img src="{{asset('../uploads/gallery/'.$item)}}" class="img-fluid">
                                </a>
                              @endforeach	
                            @endforeach

                            @endif
                      </div>
                  </div>
              </div>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

@endsection

@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).on('click', '#delete-btn', function (event) {
     event.preventDefault();
     var yes_no = confirm("Are you sure you want to delete this data?");
     if(yes_no){
       $(this).parent().find('form').submit();
     }
   });
</script>


@endsection
