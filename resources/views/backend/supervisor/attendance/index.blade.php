@extends('backend.main')
@section('content')
<div class="box">
    <div class="box-header">
        <a href="attendance/create" class="btn btn-primary">ADD</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sn</th>
          <th>Name</th>
          <th>Roll No</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($attendance as $r )
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$r->name}}</td>
                <td>{{$r->roll}}</td>
                @if ($r->status==1)
                    <td>Present</td>
                @else
                <td>Absent</td>
                @endif
                <td><a href="/supervisor/attendance/{{$r->id}}/edit" class="badge bg-blue">Edit</a>
                    <form action="/supervisor/attendance/{{$r->id}}" method="POST">
                        {{method_field('DELETE')}}
                        @csrf
                        <button type="submit" class="badge bg-red mt-0 border-0">Delete</button>
                    </form>
              </tr>
            @endforeach
        </tbody>

      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
