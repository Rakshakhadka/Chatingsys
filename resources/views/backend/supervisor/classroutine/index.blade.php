@extends('backend.main')
@section('content')
<div class="box">
    <div class="box-header">
        <a href="classroutine/create" class="btn btn-primary">ADD</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sn</th>
          <th>Supervisor Name</th>
          <th>Class Name</th>
          <th>Day</th>
          <th>Time</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($classroutine as $r )
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$r->supervisor_name}}</td>
                <td>{{$r->class_name}}</td>
                <td>{{$r->day}}</td>
                <td>{{$r->time}}</td>
                <td><a href="/supervisor/classroutine/{{$r->id}}/edit" class="badge bg-blue">Edit</a>
                    <form action="/supervisor/classroutine/{{$r->id}}" method="POST">
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
