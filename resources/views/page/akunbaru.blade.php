@extends('page.template')
@section('home')
<div class="row">
  @include('include.menus')
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Akun baru</h3>
      </div>
        <div class="card-body">
          @include('include.errors')
          @if($skondisi == "save")
          <form action="{{ route('insert.akun.baru.action', ['save']) }}" method="POST" enctype="multipart/form-data">
          @elseif($skondisi == "update")
          <form action="{{ route('insert.akun.baru.action.id', ['update', $id]) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
          @elseif($skondisi == "delete")
          <form action="{{ route('insert.akun.baru.action.id', ['delete', $id]) }}" method="POST" enctype="multipart/form-data">
              @method("DELETE")
          @endif
            @csrf
            @if($skondisi == "save")
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Name" name="name" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Username</label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter username" name="username" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Email</label>
                </div>
                <div class="col-md-9">
                  <input type="email" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Password" name="password" required>
                </div>
            </div>
       
        @elseif($skondisi == "update" || $skondisi == "delete")
        <div class="form-group">
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
            </div>
        @endif
          <div class="form-group">
            @if($skondisi == "save")
            <input type="submit" class="btn btn-primary" value="Submit">
            @elseif($skondisi == "update")
            <input type="submit" class="btn btn-success" value="Update">
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