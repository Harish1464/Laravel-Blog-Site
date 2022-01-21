@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('service_form')}}">Add service</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Service Title</th>
                        <th>Service Description</th>
                        <th>Service Icon</th>
                        <th>Item Title</th>
                        <th>Features</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($service_info)
                            @foreach($service_info as $service)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$service->service_title}}</td>
                                <td>{{$service->description}}</td>
                                <td>
                                  <a href="{{asset('../uploads/services/'.$service->service_icon)}}" class="btn btn-primary btn-sm" data-toggle="lightbox">View Icon</a>
                                </td>
                                <td>{{$service->item_title}}</td>
                                <td>{{$service->features}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_service{{$service->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_service', $service->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$service->id}}"  rel1="service/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_service', $service->id)}}" method="delete"></form>
                                </td>
                            </tr>

                            <div class="modal fade" id="view_service{{$service->id}}">
                              <div class="modal-dialog view_service{{$service->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{$service->service_title}} Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if (!empty($service->service_icon))
                                      <img src="{{asset('../uploads/services/'.$service->service_icon)}}" width="80px" alt=" {{$service->title}}">
                                    @else
                                      <img src="{{asset('../uploads/default/default.jpg')}}" width="80px" class="text-center" alt="">                                      
                                    @endif
                                    <p><strong>Service Title : </strong>{{$service->service_title}}</p>
                                    <p><strong>Service Description : </strong>{{$service->description}}</p>
                                    <p><strong>Service Description : </strong>{{$service->item_title}}</p>
                                    <p><strong>Service Description : </strong>{{$service->features}}</p>
                                    <p><strong>Service Image : </strong>{{$service->service_icon}}</p>
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