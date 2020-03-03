

<div>
  <div>
    @if ($notEnoughImages)

    Not enough images in slider.  Populate images or remove slider include from pages.index.

    @else
    <div id="carousel-marketing-images" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-marketing-images" data-slide-to="0" class="active"></li>
        @foreach (range(1, $count) as $number)

        <li data-target="#carousel-marketing-images" data-slide-to="{{ $number }}"></li>

        @endforeach
        
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ $featuredImage->showImage($featuredImage, $imagePath) }}" alt="{{ $featuredImage->image_name }}">
          <div class="carousel-caption d-block w-100" >
            <h1></h1>
          </div>
        </div>
        @foreach ($activeImages as $image)

        <div class="carousel-item">
          <img src="{{ $image->showImage($image, $imagePath)}}" alt="{{ $image->image_name }}">
          <div class="carousel-caption d-block w-100" >
            <h1></h1>
          </div>
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carousel-marketing-images" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-marketing-images" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    @endif
  </div>
</div>