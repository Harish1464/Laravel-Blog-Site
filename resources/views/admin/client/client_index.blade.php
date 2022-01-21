@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('client_form')}}">Add client</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name Of Client</th>
                        <th>Logo</th>
                        <th>Link</th>                        
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($client_info)
                            @foreach($client_info as $client)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$client->name}}</td>
                                <td>
                                  @isset($client->logo)
                                  <a href="{{asset('../uploads/clients/'.$client->logo)}}" class="btn btn-primary btn-sm" data-toggle="lightbox">View Logo</a>
                                  @else
                                  {{"-"}}
                                  @endisset
                                </td>
                                <td>{{$client->link}}</td>
                                <td>{{$client->description}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_client{{$client->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_client', $client->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$client->id}}"  rel1="client/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_client', $client->id)}}" method="delete"></form>
                                </td>
                            </tr>

                            <div class="modal fade" id="view_client{{$client->id}}">
                              <div class="modal-dialog view_client{{$client->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{$client->name}} Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if (!empty($client->logo))
                                      <img src="{{asset('../uploads/clients/'.$client->logo)}}" width="80px" alt=" {{$client->title}}">
                                    @else
                                      <img src="{{asset('../uploads/default/default.jpg')}}" width="80px" class="text-center" alt="">                                      
                                    @endif
                                    <p><strong> Title : </strong>{{$client->name}}</p>
                                    <p><strong> Link : </strong>{{$client->link}}</p>
                                    <p><strong> Description : </strong>{{$client->description}}</p>
                                    <p><strong> Logo : </strong>{{$client->logo}}</p>
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