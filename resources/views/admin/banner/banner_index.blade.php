@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('banner_form')}}">Add Banner</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Banner Title</th>
                        <th>Banner Image</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($banner_info)
                            @foreach($banner_info as $banner)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$banner->title}}</td>
                                <td>
                                  <a href="{{asset('../uploads/banner/'.$banner->banner_image)}}" class="btn btn-primary btn-sm" data-toggle="lightbox">View Image</a>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_banner{{$banner->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_banner', $banner->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$banner->id}}"  rel1="banner/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_banner', $banner->id)}}" method="delete"></form>
                                </td>
                            </tr>

                            <div class="modal fade" id="view_banner{{$banner->id}}">
                              <div class="modal-dialog view_banner{{$banner->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{$banner->title}} Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if (!empty($banner->banner_image))
                                        <img src="{{asset('../uploads/banner/'.$banner->banner_image)}}" width="80px" alt=" {{$banner->title}}">
                                    @else
                                      <img src="{{asset('../uploads/default/default.jpg')}}" width="80px" class="text-center" alt="">                                      
                                    @endif
                                    <p><strong>Banner Title : </strong>{{$banner->title}}</p>
                                    <p><strong>Banner Description : </strong>{{$banner->description}}</p>
                                    <p><strong>Banner Image : </strong>{{$banner->banner_image}}</p>
                                  </div>
                                  
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            @endforeach

                        @endif
                  </tbody>
                </table>
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