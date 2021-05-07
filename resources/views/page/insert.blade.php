@extends('page.template')
@section('home')
<div class="row">
  @include('include.menus')
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header" >
        <h3 class="card-title">Data</h3>
      </div>
        <div class="card-body">
          @include('include.errors')
          @if($skondisi == "save")
          <form action="{{ route('insert.data.action', ['save']) }}" method="POST" enctype="multipart/form-data">
          @elseif($skondisi == "update")
          <form action="{{ route('insert.data.action.id', ['update', $id]) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
          @elseif($skondisi == "delete")
          <form action="{{ route('insert.data.action.id', ['delete', $id]) }}" method="POST" enctype="multipart/form-data">
              @method("DELETE")
          @endif
            @csrf
           @if($skondisi != "update")
           <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Jenis Dokumen<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="jenis_doc" id="" class="form-control" required>
                    <option value="">[Pilih]</option>
                    <option value="0">LOL</option>
                    <option value="1">LOA</option>
                    <option value="2">MOU</option>
                  </select>
                </div>
            </div>
          </div>
          {{-- <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Jenis File<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="level_file" id="" class="form-control" required>
                    <option value="">[Pilih]</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
            </div>
          </div> --}}
          @endif
          @if($skondisi == "save")
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Status<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="status_data" id="" class="form-control" required>
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
                  <label for="exampleInputBorderWidth2">Nomor Dokumen<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="no_doc" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Nomor Document 1" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2"><span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="no_doc_1" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Enter Nomor Document 2" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Mitra<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  {{-- <textarea class="form-control" name="mitra">
                  </textarea> --}}
                  <input type="text" class="form-control" name="mitra" placeholder="Enter Mitra" required>
                </div>
            </div>
          </div>
        
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Tahun Tandatangan<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  @php($tahunkurang = date('Y', strtotime('-10 year', strtotime(date("Y")))))
                  @php($tahuntambah = date('Y', strtotime('+10 year', strtotime(date("Y")))))
                  <select name="tahun_tanda_tangan" id="" class="form-control" required>
                    <option value="">[Pilih]</option>
                    @for($tt = $tahunkurang; $tt <= $tahuntambah; $tt++)
                      <option value="{{ $tt }}">{{ $tt }}</option>
                    @endfor
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Tahun Akhir<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="tahun_akhir" id="" class="form-control" required>
                    <option value="">[Pilih]</option>
                    @for($tt = $tahunkurang; $tt <= $tahuntambah; $tt++)
                      <option value="{{ $tt }}">{{ $tt }}</option>
                    @endfor
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Tingkat Kerja<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <select name="tingkatan_kerja" id="" class="form-control" required>
                    <option value="">[Pilih]</option>
                    <option value="0">Internasional</option>
                    <option value="1">Nasional</option>
                    <option value="2">Lokal</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Bentuk Kerjasama<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <textarea class="summernote" name="bentuk_kerjasama">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">File data<span class="merah">*</span></label>
                </div>
                <div class="col-md-9">
                  <input type="file" name="file_data" required>
                </div>
            </div>
          </div>
          @elseif($skondisi == "update" || $skondisi == "delete")
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Status</label>
                </div>
                <div class="col-md-9">
                  <select name="status_data" id="" class="form-control">
                    <option value="">[Pilih]</option>
                    <option value="0" {{ $i->status_data == 0 ? "selected=selected" : "" }}>Draf</option>
                    <option value="1" {{ $i->status_data == 1 ? "selected=selected" : "" }}>Publish</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Nomor Dokumen</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="no_doc" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" value="{{ $i->no_doc }}" placeholder="Enter Nomor Document 1">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2"></label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="no_doc" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" value="{{ $i->no_doc_1 }}" placeholder="Enter Nomor Document 2">
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Mitra</label>
                </div>
                <div class="col-md-9">
                  {{-- <textarea class="form-control" name="mitra">
                    {{ $i->mitra }}
                  </textarea> --}}
                  <input type="text" class="form-control" name="mitra" value="{{ $i->mitra }}">
                </div>
            </div>
          </div>
         
         
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Tingkat Kerja</label>
                </div>
                <div class="col-md-9">
                  <select name="tingkatan_kerja" id="" class="form-control">
                    <option value="">[Pilih]</option>
                    <option value="0"  {{ $i->tingkatan_kerja == 0 ? "selected=selected" : "" }}>Internasional</option>
                    <option value="1"  {{ $i->tingkatan_kerja == 1 ? "selected=selected" : "" }}>Nasional</option>
                    <option value="2"  {{ $i->tingkatan_kerja == 2 ? "selected=selected" : "" }}>Lokal</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">Bentuk Kerjasama</label>
                </div>
                <div class="col-md-9">
                  <textarea class="summernote" name="bentuk_kerjasama">
                    {{ $i->bentuk_kerjasama }}
                  </textarea>
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                  <label for="exampleInputBorderWidth2">File data</label>
                </div>
                <div class="col-md-9">
                  <input type="file" name="file_data">
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
@endsection