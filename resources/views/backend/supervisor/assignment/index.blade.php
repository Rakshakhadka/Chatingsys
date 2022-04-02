@extends('backend.main')
@section('content')
<div class="box">
    <div class="box-header">
        <a href="assignment/create" class="btn btn-primary">ADD</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sn</th>
          <th>Subject Name</th>
          <th>Image</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($assignment as $r )
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$r->subject_name}}</td>
                <td><img src="{{asset($r->image)}}" alt="" height="100px" width="100px"></td>
                <td><a href="/supervisor/assignment/{{$r->id}}/edit" class="badge bg-blue">Edit</a>
                    <form action="/supervisor/assignment/{{$r->id}}" method="POST">
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
