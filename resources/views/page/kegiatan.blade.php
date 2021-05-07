@extends('page.template')
@section('home')
<div class="card card-primary" >
  <div class="card-header" >
    <h3 class="card-title">Data Kegiatan No Dokument {{ $i->no_doc }} <span class="merah">dan</span> {!! $i->no_doc_1 !!}</h3>
  </div>
    <div class="card-body">
      <table id="example1" class="table  table-striped" style="mar">
        <thead>
        <tr>
          <th></th>
          <th>Judul</th>
          <th>Ruang Lingkup</th>
          <th>Waktu Kegiatan</th>
          <th>Manfaat</th>
          <th>File</th>
        </tr>
        </thead>
        <tbody>
            @foreach($i->kegiatan as $key => $dv)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{!! $dv->judul !!}</td>
                <td>
                  @if($dv->ruang_lingkup == 0)
                  Pendidikan
                  @elseif($dv->ruang_lingkup == 1)
                  Penelitian
                  @elseif($dv->ruang_lingkup == 2)
                  Pengabdian
                  @elseif($dv->ruang_lingkup == 99)
                  {!! $dv->lainnya !!}
                  @endif
                </td>
                <td>{!! $dv->waktu_durasi !!}</td>
                <td>{!! $dv->manfaat !!}</td>
                <td><a href="{{ url($dv->bukti_kegiatan) }}" target="_blank">File</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th></th>
          <th>Judul</th>
          <th>Waktu Kegiatan</th>
          <th>Manfaat</th>
          <th>File</th>
        </tr>
        </tfoot>
      </table>
    </div>
  </div>

@endsection