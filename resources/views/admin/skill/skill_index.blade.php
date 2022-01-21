@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('skill_form')}}">Add skill</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Skill Title</th>
                        <th>Skill Description</th>
                        <th>Skill Count (in %)</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @isset($skill_info)
                            @foreach($skill_info as $skill)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$skill->title}}</td>
                                <td>{{$skill->description}}</td>
                                <td>{{$skill->skill_count}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_skill{{$skill->id}}"><i class="fa fa-eye"></i> </button>
                                  <a href="{{route('edit_skill', $skill->id)}}" title="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                                  <a href="javascript:;" title="delete" class="btn btn-danger btn-sm" id="delete-btn" rel="{{$skill->id}}"  rel1="skill/delete"><i class="fa fa-trash"></i></a> 
                                  <form action="{{route('delete_skill', $skill->id)}}" method="delete"></form>
                                </td>
                            </tr>

                            <div class="modal fade" id="view_skill{{$skill->id}}">
                              <div class="modal-dialog view_skill{{$skill->id}}">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">{{$skill->title}} Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>Skill Title : </strong>{{$skill->title}}</p>
                                    <p><strong>Skill Description : </strong>{{$skill->description}}</p>
                                    <p><strong>Skill Count : </strong>{{$skill->skill_count}}</p>
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