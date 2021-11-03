<div class="container px-4 px-lg-5 mt-2">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @php
        $i=0
      @endphp
      @foreach($sliders as $slider)
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}" class="{{ $slider->trending == 1 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{$i}}"></button>
      @php
        $i++;
      @endphp
      @endforeach
    </div>
    <div class="carousel-inner">
      @foreach($sliders as $slider)
      <div class="carousel-item {{ $slider->trending == 1 ? 'active' : '' }}">
        <a href="{{ $slider->link }}">
          <img class="w-100" src="{{ asset('assets/uploads/slider/'.$slider->image) }}" >
          <div class="carousel-caption d-none d-md-block slider-text">
        </a>
          <h5>{{ $slider->title }}</h5>
          <p>{{ $slider->description }}</p><span class="badge bg-danger">{{ $slider->price }} DH</span><br>
        </div>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>