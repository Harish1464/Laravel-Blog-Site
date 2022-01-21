@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('feature_form')}}">Add Feature</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Feature Title</th>
                        <th>Feature Image</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($feature_info)
                            @foreach($feature_info as $feature)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$feature->title}}</td>
                                <td>
                                  <a href="{{asset('../uploads/features/'.$feature->feature_image)}}" class="btn btn-primary btn-sm" data-toggle="lightbox"> View Image</a>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_features{{$feature->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_feature', $feature->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="{{route('about_form')}}" title="delete" id="delete-btn" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_feature', $feature->id)}}" method="delete"></form>
                                </td>
                            </tr>

                            <div class="modal fade" id="view_features{{$feature->id}}">
                              <div class="modal-dialog view_features{{$feature->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{$feature->title}} - Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if (!empty($feature->feature_image))
                                      <img src="{{asset('../uploads/features/'.$feature->feature_image)}}" width="80px" alt=" {{$feature->title}}">
                                    @else
                                    <img src="{{asset('../uploads/default/default.jpg')}}" width="80px" class="text-center" alt="">                                      
                                    @endif
                                    <p><strong>Feature's Title : </strong>{{$feature->title}}</p>
                                    <p><strong>Feature's Image : </strong>{{$feature->feature_image}}</p>
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