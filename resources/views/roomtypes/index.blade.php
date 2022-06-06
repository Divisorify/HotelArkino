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
            <img src={{asset('storage/img/room2.jpg')}} class="d-block w-100" alt="...">
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
  <div class="container">

    <!--Karty-->
    <h3>Rooms</h3>
    <br>
    <div class="row align-items-stretch">
      @forelse ($roomtypesCards as $roomtype)
      <div class="col col-12 col-sm-6 mb-5 col-lg-3">
        <div class="card  h-100">
          <img src={{asset('storage/img/room'.$roomtype->id.'.jpg')}} class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$roomtype->type}}</h5>
            <p class="card-text">{{$roomtype->description}}</p>
            <a href="{{route('roomtypes.show', $roomtype->id)}}" class="btn btn-primary">More details...</a>
          </div>
        </div>
      </div>
      @empty
      <p style="color: #CC4E50; font-weight: 700; font-size: 20px">There is no rooms!</p>
      @endforelse
    </div>

    <!--Cennik-->
    <br>
    <h4>Pricelist</h4>
    <div id="tabelka">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Room type</th>
            <th scope="col">Residents</th>
            <th scope="col">Beds</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($roomtypes as $roomtype)
          <tr>
            <th scope="row">{{$roomtype->id}}</th>
            <td>{{$roomtype->type}}</td>
            <td>{{$roomtype->persons}}</td>
            <td>{{$roomtype->beds}}</td>
            <td>{{$roomtype->description}}</td>
            <td>{{$roomtype->price}} PLN/day</td>
            @can('is-admin')
            <td><a href="{{route('roomtypes.edit', $roomtype->id)}}">Edit</a></td>
            @endcan
        </tr>
          </tr>
          @empty
          <p style="color: #CC4E50; font-weight: 700; font-size: 20px">No records</p>
          @endforelse
        </tbody>
      </table>
    </div>

    

    <div class="container mt-5" id="Other"> 
        <div class="row">
          <div class="col">
            <h1>About Arkino Hotel</h1>
            <p>Hotel placed in the subours of Rzeszów in beautiful town Świlcza</p>
            <div class="embed-responsive embed-responsive-16by9">
            <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=G-qsgUWqXaw"></iframe> -->
            </div>
          </div>
          <div class="col">
            <h1>Ask for an offer</h1>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
    
            <div class="mb-3">
              <label for="exampleRoomType" class="form-label">Room type</label>
            <select class="form-select" aria-label="Default select example">
              <option value="1">Classic</option>
              <option value="2">Studio</option>
              <option value="3">Superior</option>
              <option value="4">Master</option>
              <option value="5">Family</option>
              <option value="6">Presidental</option>
            </select>
          </div>
    
            <div class="mb-3">
              <label for="exampleResidents" class="form-label">Residents</label>
              <select class="form-select" aria-label="Default select example">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
          </div>
    
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary align-right" class="align-right">Send</button>
          </div>
        </div>
      </div>

  @include('shared.footer')

</body>

</html>
