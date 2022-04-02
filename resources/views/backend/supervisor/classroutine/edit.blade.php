@extends('backend.main')
@section('content')
  <div class="box box-primary">
            <div class="box-header with-border">
                <a href="/supervisor/classroutine" class="btn btn-primary">Back</a>
              <h3 class="box-title">Classroutine</h3>
              @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
          @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/supervisor/classroutine/{{$classroutine->id}}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Supervisor Name</label>
                    <input type="text" class="form-control" name="supervisor_name" value="{{$classroutine->supervisor_name}}" id="exampleInputEmail1" placeholder="Supervisor Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{$classroutine->class_name}}" id="exampleInputEmail1" placeholder="Class Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Day</label>
                    <input type="text" class="form-control" name="day" value="{{$classroutine->day}}" id="exampleInputEmail1" placeholder="Day">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control" name="time" value="{{$classroutine->time}}" id="exampleInputEmail1" placeholder="Time">
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
