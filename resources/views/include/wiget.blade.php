<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <a href="{{ route("searchData", "LOL") }}" style="color:black">
        <div class="info-box shadow">
          <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">LOL</span>
            <span class="info-box-number">{{ WigetApp::countLOL() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <a href="{{ route("searchData", "LOA") }}" style="color:black">
        <div class="info-box shadow">
          <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">LOA</span>
            <span class="info-box-number">{{ WigetApp::countLOA() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <a href="{{ route("searchData", "MOU") }}" style="color:black">
        <div class="info-box shadow">
          <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">MOU</span>
            <span class="info-box-number">{{ WigetApp::countMOU() }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box shadow">
        <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">KEGIATAN</span>
          <span class="info-box-number">{{ WigetApp::countKegiatan() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>