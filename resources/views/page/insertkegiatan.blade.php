@extends('page.template')
@section('home')
<div class="row">
  @include('include.menus')
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Kegiatan</h3>
      </div>
        <div class="card-body">
          @include('include.errors')
          @if($skondisi == "save")
          <form action="{{ route('insert.kegiatan.action', ['save']) }}" method="POST" enctype="multipart/form-data">
          @elseif($skondisi == "update")
          <form action="{{ route('insert.kegiatan.action.id', ['update', $id]) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
          @elseif($skondisi == "delete")
          <form action="{{ route('insert.kegiatan.action.id', ['delete', $id]) }}" method="POST" enctype="multipart/form-data">
              @method("DELETE")
          @endif
            @csrf
            @if($skondisi == "save")
            
          <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>Pilih Mitra<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select class="form-control select2" name="id_data" id="id_data" style="width: 100%;">
                    <option selected="selected">[Pilih]</option>
                  @foreach($vv as $dv)
                    {{-- @if(@count((array) $dv->kegiatan) < 1) --}}
                    <option value="{!! $dv->mitra !!}">{!! $dv->mitra !!}</option>
                    {{-- @endif --}}
                  @endforeach
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Nomor dokument<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="no_document" id="level_file" class="form-control" >
                    <option value="">[Pilih]</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Status<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="status_kegiatan" id="" class="form-control">
                    <option value="">[Pilih]</option>
                    <option value="0">Draf</option>
                    <option value="1" >Publish</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Judul Kegiatan<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Judul Kegiatan" name="judul">
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Ruang Lingkup<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="ruang_lingkup" id="ruang_lingkup" onchange="myFunction()" class="form-control">
                    <option value="">[Pilih]</option>
                    <option value="0">Pendidikan</option>
                    <option value="1">Penelitian</option>
                    <option value="2">Pengabdian</option>
                    <option value="99">Lainnya</option>
                  </select>
                </div>
            </div>
          </div>
          <p id="demo"></p>
         
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Waktu dan Durasi<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <textarea class="summernote" name="waktu_durasi">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Manfaat bagi PT/PS<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <textarea class="summernote" name="manfaat">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Link Bukti Kegiatan<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="bukti_kegiatan" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="https://...">
                </div>
            </div>
          </div>
          @elseif($skondisi == "update" || $skondisi == "delete")
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label>Pilih No Dokumen</label>
              </div>
              <div class="col-md-9">
                <select class="form-control select2" name="id_data" style="width: 100%;">
                  <option >[Pilih]</option>
                @foreach($v as $dv)
                  <option value="{{ $dv->id_data }}" {{ $i->id_data == $dv->id_data ? "selected=selected" : "" }}>{{ $dv->no_doc }}</option>
                @endforeach
                </select>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-3">
                <label for="exampleInputBorderWidth2">Status</label>
              </div>
              <div class="col-md-9">
                <select name="status_kegiatan" id="" class="form-control">
                  <option value="">[Pilih]</option>
                  <option value="0" {{ $i->status_kegiatan == 0 ? "selected=selected" : "" }}>Draf</option>
                  <option value="1" {{ $i->status_kegiatan == 1 ? "selected=selected" : "" }}>Publish</option>
                </select>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-3">
                <label for="exampleInputBorderWidth2">Judul Kegiatan</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Judul Kegiatan" name="judul" value="{{ $i->judul }}">
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-3">
                <label for="exampleInputBorderWidth2">Waktu dan Durasi</label>
              </div>
              <div class="col-md-9">
                <textarea class="summernote" name="waktu_durasi">
                  {{ $i->waktu_durasi }}
                </textarea>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-3">
                <label for="exampleInputBorderWidth2">Manfaat bagi PT/PS</label>
              </div>
              <div class="col-md-9">
                <textarea class="summernote" name="manfaat">
                  {{ $i->manfaat }}
                </textarea>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-3">
                <label for="exampleInputBorderWidth2">Link Bukti Kegiatan</label>
              </div>
              <div class="col-md-9">
                <input type="text" name="bukti_kegiatan" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="https://..." value="{{ $i->bukti_kegiatan }}">
              </div>
          </div>
        </div>
        @endif
          <div class="form-group">
            <span class="merah">*) Wajib diisi</span><br><br>
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
<script type='text/javascript'>
function myFunction() {
  var x = document.getElementById("ruang_lingkup").value;
  if(x == 99){
    document.getElementById("demo").innerHTML = '<div class="form-group">' +
            '<div class="row">' +
                '<div class="col-md-3">' +
                  '<label for="exampleInputBorderWidth2"><span class="merah">*</span></label>' +
                '</div>' +
                '<div class="col-md-9">' +
                  '<input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Lainnya" name="lainnya" required>' +
                '</div>' +
           ' </div>' +
          '</div>';
  }else{
    document.getElementById("demo").innerHTML = "";
  }
}

  $(document).ready(function(){

    // Department Change
    $('#id_data').change(function(){

       // Department id
       var id = $(this).val();
       console.log(id);

       // Empty the dropdown
      //  $('#sel_emp').find('option').not(':first').remove();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $("#level_file").html(""); 

      //  AJAX request 
       $.ajax({
         url: '{{ url("search-level") }}/'+id,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
           console.log(response);
           if(response != null){
             len = response.length;
           }

           if(len > 0){
             // Read data and create <option >
             for(var i=0; i<len; i++){

               var id = response[i].id_data;
               var name = response[i].no_doc;
               var name1 = response[i].no_doc_1;

               var option = "<option value='"+id+"'>"+name+" dan "+ name1 +"</option>"; 
              //  console.log(option);
              
               $("#level_file").append(option); 
             }
           }

         }
      });
    });

  });

  </script>
@endsection