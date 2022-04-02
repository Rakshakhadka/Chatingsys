@extends('backend.main')
@section('content')
  <div class="box box-primary">
            <div class="box-header with-border">
                <a href="/supervisor/assignment" class="btn btn-primary">Back</a>
              <h3 class="box-title">Assignment</h3>
              @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
          @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/supervisor/assignment/{{$assignment->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject Name</label>
                    <input type="text" class="form-control" name="subject_name" value="{{$assignment->subject_name}}" id="exampleInputEmail1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="image" value="{{$assignment->image}}" id="exampleInputEmail1" placeholder="Image">
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
