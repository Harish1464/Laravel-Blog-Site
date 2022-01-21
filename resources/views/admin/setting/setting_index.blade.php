@extends('layouts.admin')
@section('main-content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <a class="btn btn-warning text-center" href="{{route('setting_create')}}">Edit Site Setting</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Site Title</th>
                        <th>Site Logo</th>
                        <th>Office Address</th>
                        <th>Office Contact</th>
                        <th>Facebook Link</th>
                        <th>Twitter Link</th>
                        <th>Linkedin Link</th>
                        <th>Dribble Link</th>
                        <th>Github Link</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if(@isset($site_settings))
                                <tr>
                                    <td>{{$site_settings->site_title}}</td>
                                    <td>
                                      @isset($site_settings->site_logo)
                                      <a href="{{asset('../uploads/service/'.$site_settings->site_logo)}}" class="btn btn-primary btn-sm" data-toggle="lightbox">View Logo</a>
                                      @else
                                      {{"-"}}
                                      @endisset
                                    </td>
                                    <td>{{$site_settings->office_address}}</td>
                                    <td>{{$site_settings->office_contact}}</td>
                                    <td>{{$site_settings->facebook_link}}</td>
                                    <td>{{$site_settings->twitter_link}}</td>
                                    <td>{{$site_settings->linkedin_link}}</td>
                                    <td>{{$site_settings->dribble_link}}</td>
                                    <td>{{$site_settings->github_link}}</td>
                                    <td>edit|View</td>
                                </tr>
                    @else
                        <tr>Sorry ! we can't find any data in the database.</tr>
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