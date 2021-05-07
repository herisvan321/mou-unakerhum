@extends('page.template')
@section('home')
@include('include.chart')
<div class="card card-primary" >
  <div class="card-header" >
    <h3 class="card-title">Data Kerjasama</h3>
  </div>
    <div class="card-body">
      <table id="example1" class="table  table-striped" style="mar">
        <thead>
        <tr>
          <th></th>
          <th>Mitra</th>
          <th>Masa Berlaku</th>
          <th>Tingkat</th>
          <th>Bentuk Kerjasama</th>
          <th>Document</th>
          <th>Kegiatan</th>
        </tr>
        </thead>
        <tbody>
        @foreach($i as $key => $v)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>
            {!! $v->mitra !!}
          </td>
          <td>{!! "Tahun tandatangan <b>".$v->tahun_tanda_tangan."</b><br>Tahun Berakhir <b>".$v->tahun_berakhir."</b>"  !!}</td>
         
          <td>
            @if($v->tingkatan_kerja == 0)
            Internasional
            @elseif($v->tingkatan_kerja == 1)
            Nasional
            @elseif($v->tingkatan_kerja == 2)
            Lokal
            @endif
          </td>
          <td>{!! $v->bentuk_kerjasama !!}</td>
          <td>
            @guest
            @if($kondisi->kondisi == 0)
            <a class="btn btn-primary" href="{{ route('download.file.kerjasama', [base64_encode($v->id_data)]) }}">
              
              @if($v->jenis_doc == 0)
              LOL
              @elseif($v->jenis_doc == 1)
              LOA
              @elseif($v->jenis_doc == 2)
              MOU
              @endif
            </a> 
            @else
            
            <a class="btn btn-primary" href="{{ route('insert.data.action.id', ['download', base64_encode($v->id_data)]) }}">
              
              @if($v->jenis_doc == 0)
              LOL
              @elseif($v->jenis_doc == 1)
              LOA
              @elseif($v->jenis_doc == 2)
              MOU
              @endif
            </a> 
            @endif
            @else
            <a class="btn btn-primary" href="{{ route('insert.data.action.id', ['download', base64_encode($v->id_data)]) }}">
              
              @if($v->jenis_doc == 0)
              LOL
              @elseif($v->jenis_doc == 1)
              LOA
              @elseif($v->jenis_doc == 2)
              MOU
              @endif
            </a> 
            @endguest
            <br>

            {!! $v->no_doc !!} <span class="merah">dan</span> {!! $v->no_doc_1 !!}
          </td>
          <td>
            @if(@count($v->kegiatan) > 0)
              <a href="{{ route("kegiatanIndex", [ base64_encode($v->id_data) ]) }}" target="_blank">File</a>
            @else
              <span class="text-danger">Kosong</span>
            @endif
          </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th></th>
          <th>Mitra</th>
          <th>Masa Berlaku</th>
          <th>Tingkat</th>
          <th>Bentuk Kerjasama</th>
          <th>Document</th>
          <th>Kegiatan</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>

@endsection