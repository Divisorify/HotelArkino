<!doctype html>
<html lang="en">

@include('shared.header')

<body>

  @include('shared.nav')

  <!--Karuzela-->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="max-width: 1200px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>
        
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src={{asset('storage/img/breakfast.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Delicious!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/food.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Tasty!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/food2.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Flavorful!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/grapes.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Delectable!</h3>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="row">
        <div class="card mb-3" id="restaurantcards">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('storage/img/breakfast.jpg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Breakfast</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Add to my reservation</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="restaurantcards">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('storage/img/food.jpg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Dinner</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Add to my reservation</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="card mb-3" id="restaurantcards">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('storage/img/food2.jpg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Supper</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Add to my reservation</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" id="restaurantcards">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset('storage/img/grapes.jpg')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Dessert</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Add to my reservation</a>
              </div>
            </div>
          </div>
        </div>
      </div>

  @include('shared.footer')

</body>

</html>
