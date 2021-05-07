<div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3"><h3 class="card-title">Dashboard</h3></li>
      <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Kerjasama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Kegiatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Akun</a>
      </li>
     
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
        <table id="" class="table  table-striped example1">
          <thead>
          <tr>
            <th></th>
            <th>Document</th>
            <th>Mitra</th>
            <th>Masa Berlaku</th>
            <th>Tingkat</th>
            <th>Bentuk Kerjasama</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach($i as $key => $data1)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>
              <button class="btn btn-primary">
                @if($data1->jenis_doc == 0)
                LOL
                @elseif($data1->jenis_doc == 1)
                LOA
                @elseif($data1->jenis_doc == 2)
                MOU
                @endif
              </button> <br>
              {!! $data1->no_doc !!}
            </td>
            <td>
              {!! $data1->mitra !!}
            </td>
            <td>{!! "Tahun tandatangan ".$data1->tahun_tanda_tangan."<br>Tahun Berakhir ".$data1->tahun_berakhir  !!}</td>
         
            <td>
              @if($data1->tingkatan_kerja == 0)
              Internasional
              @elseif($data1->tingkatan_kerja == 1)
              Nasional
              @elseif($data1->tingkatan_kerja == 2)
              Lokal
              @endif
            </td>
            <td>{!! $data1->bentuk_kerjasama !!}</td>
            <td>
              @if($data1->status_data == 0)
              <span class="text-danger"><i>draf</i></span>
              @elseif($data1->status_data == 1)
              <span class="text-success"><i>publish</i></span>
              @endif
              <br>
              <a href="{{ route('insert.data.action.id', ['download', base64_encode($data1->id_data)]) }}" target="_blank">File</a><br> 
              <a href="{{ route('insert.data.action.id', ['show', base64_encode($data1->id_data)]) }}">Update</a> 
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Document</th>
              <th>Mitra</th>
              <th>Masa Berlaku</th>
              <th>Tingkat</th>
              <th>Bentuk Kerjasama</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
        <table class="table  table-striped example1">
          <thead>
          <tr>
            <th></th>
            <th>No Dokumen</th>
            <th>Mitra</th>
            <th>Judul</th>
            <th>Waktu dan Durasi</th>
            <th>Manfaat</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach($v as $key => $data2)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{!! $data2->isidata->no_doc !!}</td>
            <td>{!! $data2->isidata->mitra !!}</td>
            <td>{!! $data2->judul !!}</td>
            <td>{!! $data2->waktu_durasi !!}</td>
            <td>{!! $data2->manfaat !!}</td>
            <td>
              @if($data2->status_kegiatan == 0)
              <span class="text-danger"><i>draf</i></span>
              @elseif($data2->status_kegiatan == 1)
              <span class="text-success"><i>publish</i></span>
              @endif
              <br>
              <a href="{{ $data2->bukti_kegiatan }}" target="_blank">Bukti Kegiatan</a><br> 
              <a href="{{ route('insert.kegiatan.action.id', ['show', base64_encode($data2->id_kegiatan)]) }}">Update</a> 
            </td>
          </tr>
          @endforeach
         
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>Judul</th>
              <th>Waktu dan Durasi</th>
              <th>Manfaat</th>
              <th></th>
            </tr>
            </thead>
          </tfoot>
        </table>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
         <div class="container">
            <form action="{{ route('upAkun') }}" method="POST">
              @method("PUT")
              @csrf
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                      <label for="exampleInputBorderWidth2">Name</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Baru" value="{!! Auth::user()->name !!}">
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                      <label for="exampleInputBorderWidth2">Username</label>
                    </div>
                    <div class="col-md-10">
                      {!! Auth::user()->username !!}
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                      <label for="exampleInputBorderWidth2">Email</label>
                    </div>
                    <div class="col-md-10">
                      {!! Auth::user()->email !!}
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                      <label for="exampleInputBorderWidth2">Password</label>
                    </div>
                    <div class="col-md-4">
                      <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password Baru">
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
                <input type="reset" class="btn btn-default">
              </div>
            </form>
         </div> 
      </div>
    </div>
  </div>
  <!-- /.card -->