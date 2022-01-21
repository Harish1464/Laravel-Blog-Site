@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('member_form')}}">Add Member</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Member Name</th>
                        <th>Designation</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Google Link</th>
                        <th>Twitter Link</th>
                        <th>Facebook Link</th>
                        <th>Linkedin Link</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($member_info)
                            @foreach($member_info as $member)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$member->member_name}}</td>
                                <td>{{$member->designation}}</td>
                                <td>{{$member->description}}</td>
                                <td>
                                  @isset($member->image)
                                  <a href="{{asset('../uploads/team/'.$member->image)}}" class="btn btn-primary btn-sm" data-toggle="lightbox">View Image</a>
                                  @else
                                  {{"-"}}
                                  @endisset
                                </td>
                                <td>{{$member->google_link}}</td>
                                <td>{{$member->twitter_link}}</td>
                                <td>{{$member->facebook_link}}</td>
                                <td>{{$member->linkedin_link}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_member{{$member->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_member', $member->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$member->id}}"  rel1="team/member/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_member', $member->id)}}" method="delete"></form>
                                </td>
                            </tr>


                            <div class="modal fade" id="view_member{{$member->id}}">
                              <div class="modal-dialog view_member{{$member->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Personal Details of <strong>{{$member->member_name}}</strong> </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if (!empty($member->member_image))
                                      <img src="{{asset('../uploads/member/'.$member->member_image)}}" width="80px" alt=" {{$member->title}}">
                                    @else
                                      <img src="{{asset('../uploads/default/default.jpg')}}" width="80px" class="text-center" alt="">                                      
                                    @endif
                                    <p><strong>Name : </strong>{{$member->member_name}}</p>
                                    <p><strong>Designation : </strong>{{$member->designation}}</p>
                                    <p><strong>Description : </strong>{{$member->description}}</p>
                                    <p><strong>Google : </strong>{{$member->google_link}}</p>
                                    <p><strong>Twitter : </strong>{{$member->twitter_link}}</p>
                                    <p><strong>Facebook : </strong>{{$member->facebook_link}}</p>
                                    <p><strong>Linkedin : </strong>{{$member->linkedin_link}}</p>
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