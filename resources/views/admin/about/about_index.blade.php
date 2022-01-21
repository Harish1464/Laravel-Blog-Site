@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('about_form')}}">Edit Content</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>About Title</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                       @if($about)
                          <tr>
                              <td>{{1}}</td>
                              <td>{{$about->title}}</td>
                              <td>{{$about->description}}</td>
                              <td>{{$about->author}}</td>
                              <td>
                                <a href="{{route('about_form')}}" class="btn btn-primary btn-sm">Edit</a> 
                              </td>
                          </tr>
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

@endsection