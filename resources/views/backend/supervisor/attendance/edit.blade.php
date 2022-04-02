@extends('backend.main')
@section('content')
  <div class="box box-primary">
            <div class="box-header with-border">
                <a href="/supervisor/attendance" class="btn btn-primary">Back</a>
              <h3 class="box-title">Role</h3>
              @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
          @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/supervisor/attendance/{{$attendance->id}}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$attendance->name}}" id="exampleInputEmail1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Roll No.</label>
                    <input type="number" class="form-control" name="roll" value="{{$attendance->roll}}" id="exampleInputEmail1" placeholder="Roll No.">
                  </div>
                  <div class="form-group">
                      <select name="status" id="">
                          <option value="1">Present</option>
                          <option value="0">Absent</option>
                      </select>
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
