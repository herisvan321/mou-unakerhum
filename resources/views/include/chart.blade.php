{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-7">
            <div class="card card-primary" >
                {{-- <div class="card-header" >
                  <h3 class="card-title">Chart Line</h3>
                </div> --}}
                  <div class="card-body">
                    <div id="line_chart" style="min-height: 350px;"></div>
                  </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-primary" >
                {{-- <div class="card-header" >
                  <h3 class="card-title">Chart Pie</h3>
                </div> --}}
                  <div class="card-body">
                    <div id="donutchart" style="min-height: 350px;"></div>
                  </div>
            </div>
        </div>
        @if($search != "LOL" && $search != "LOA" && $search != "MOU")
        <div class="col-md-7">
        <div class="card card-primary" >
            {{-- <div class="card-header" >
              <h3 class="card-title">Chart Line</h3>
            </div> --}}
              <div class="card-body">
                <div id="data_tingkat_kerjasama" style="min-height: 350px;"></div>
              </div>
        </div>
    </div>
        <div class="col-md-5">
          <div class="card card-primary" >
              {{-- <div class="card-header" >
                <h3 class="card-title">Chart Pie</h3>
              </div> --}}
                <div class="card-body">
                  <div id="tingkatan_kerja" style="min-height: 350px;"></div>
                </div>
          </div>
      </div>
      
        <div class="col-md-12">
            <div class="card card-primary" >
                {{-- <div class="card-header" >
                  <h3 class="card-title">Chart Bar</h3>
                </div> --}}
                  <div class="card-body">
                    <div id="columnchart_material" style="min-height: 500px;"></div>
                  </div>
            </div>
        </div>
        @endif
    </div>
{{-- </div> --}}
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChartline);

    function drawChartline() {
      var dataline = google.visualization.arrayToDataTable(<?= json_encode($arrchart); ?>);

      var optionsline = {
        title: 'Data kerjasama 5 tahun terakhir <?= "$search" ?>' ,
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

      chart.draw(dataline, optionsline);
    }

    google.charts.setOnLoadCallback(drawChartpie);
      function drawChartpie() {
        var data = google.visualization.arrayToDataTable(<?= json_encode($arrpie); ?>);

        var optionspie = {
          title: 'Data kerjasama 5 tahun terakhir <?= "$search" ?>',
          pieHole: 0.5,
          is3D: true,
        // title: 'Indian Language Use',
        //   legend: 'none',
        //   pieSliceText: 'label',
        //   slices: {  1: {offset: 0.2},
        //             12: {offset: 0.3},
        //             14: {offset: 0.4},
        //             15: {offset: 0.5},
        //   },


        };

        var chartpie = new google.visualization.PieChart(document.getElementById('donutchart'));
        chartpie.draw(data, optionspie);
      }

      google.charts.setOnLoadCallback(tingkatan_kerja);
      function tingkatan_kerja() {
        var data = google.visualization.arrayToDataTable(<?= json_encode($tingkatan_kerja); ?>);

        var optionspie = {
          title: 'Data kerjasama tingkatan kerja 5 tahun terakhir',
          pieHole: 0.4,
          is3D: true,

        };

        var chartpie = new google.visualization.PieChart(document.getElementById('tingkatan_kerja'));
        chartpie.draw(data, optionspie);
      }

      google.charts.setOnLoadCallback(drawChartbar);

      function drawChartbar() {
        var databar = google.visualization.arrayToDataTable(<?= json_encode($arrchart); ?>);

        var optionsbar = {
          chart: {
            title: 'Data kerjasama 5 tahun terakhir',
            subtitle: 'LOL, LOA, and MOU',
          }
        };
        var chartbar = new google.charts.Bar(document.getElementById('columnchart_material'));

        chartbar.draw(databar, google.charts.Bar.convertOptions(optionsbar));
      }
      google.charts.setOnLoadCallback(databar_tingkatan_kerja);

      function databar_tingkatan_kerja() {
        var databar = google.visualization.arrayToDataTable(<?= json_encode($arrtingkatkerjasama); ?>);

        var optionsbar = {
          chart: {
            title: 'Data kerjasama 5 tahun terakhir ',
            subtitle: 'Internasional, Nasional, and Lokal',
          }
        };

        var chartbar = new google.charts.Bar(document.getElementById('data_tingkat_kerjasama'));

        chartbar.draw(databar, google.charts.Bar.convertOptions(optionsbar));
      }

      


  </script>