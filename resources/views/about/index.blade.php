<!doctype html>
<html lang="en">

@include('shared.header')

<body>

  @include('shared.nav')

  <!--Karuzela-->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>
        
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src={{asset('storage/img/work.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Feel free!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/room3.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Relax!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/hotel.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Rest!</h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src={{asset('storage/img/receptionists.jpg')}} class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Call us!</h3>
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


  <br>
  

  @include('shared.footer')

</body>

</html>
