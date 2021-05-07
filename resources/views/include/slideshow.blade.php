<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach(WigetApp::dataSlideShow() as $key => $v)
        @if($key == 0)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
        @else
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" ></li>
        @endif
      @endforeach
    </ol>
    <div class="carousel-inner">
      @foreach(WigetApp::dataSlideShow() as $key => $v)
        @if($key == 0)
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset("/slideshow/".$v->file) }}" alt="{{ $v->title }}">
      </div>
        @else
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset("/slideshow/".$v->file) }}" alt="{{ $v->title }}">
      </div>
        @endif
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-custom-icon" aria-hidden="true">
        <i class="fas fa-chevron-left"></i>
      </span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-custom-icon" aria-hidden="true">
        <i class="fas fa-chevron-right"></i>
      </span>
      <span class="sr-only">Next</span>
    </a>
  </div>