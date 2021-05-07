@extends('page.template')
@section('home')
<div class="row">
  @include('include.menus')
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Slide Show</h3>
      </div>
        <div class="card-body">
          @include('include.errors')
          @if($skondisi == "save")
          <form action="{{ route('insert.slide.show.action', ['save']) }}" method="POST" enctype="multipart/form-data">
          @elseif($skondisi == "update")
          <form action="{{ route('insert.slide.show.action.id', ['update', $id]) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
          @elseif($skondisi == "delete")
          <form action="{{ route('insert.slide.show.action.id', ['delete', $id]) }}" method="POST" enctype="multipart/form-data">
              @method("DELETE")
          @endif
            @csrf
            @if($skondisi == "save")
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Title</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Name" name="title" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Slide Show</label>
                </div>
                <div class="col-md-9">
                  <input type="file" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter username" name="file_data" required>
                </div>
                <p>Resolusi wajib 900x350 px</p>
            </div>
          </div>
         
        @elseif($skondisi == "update" || $skondisi == "delete")
        {{-- <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Name" value="{{ $i->name }}" name="name" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Password" name="password">
                </div>
            </div> --}}
        @endif
       
          <div class="form-group">
            @if(@count($cekdata) < 3)
                @if($skondisi == "save")
                <input type="submit" class="btn btn-primary" value="Submit">
                @elseif($skondisi == "update")
                <input type="submit" class="btn btn-success" value="Update">
            @endif
            @elseif($skondisi == "delete")
            <input type="submit" class="btn btn-danger" value="Delete">
            @endif
            <input type="reset" class="btn btn-default">
          </div>
         
            </form>
        </div>
      </div>
    
  </div>
</div>
@endsection