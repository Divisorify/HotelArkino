<!doctype html>
<html lang="en">

@include('shared.header')

<body>

  @include('shared.nav')

  <br>
  <div class="container">

    <!--Karty-->
    <h3>Room</h3>
    <br>
    <div class="row align-items-stretch">

      <div class="col col-12 col-sm-6 mb-5 col-lg-3">
        <div class="card  h-100">
          <img src={{asset('storage/img/room2'.$trip->id.'.jpg')}} class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$trip->name}}</h5>
            <p class="card-text">{{$trip->description}}</p>
          </div>
        </div>
      </div>
    </div>
    <!--Cennik-->
    <br>
    <div class="container my-5">
      <div class="d-flex flex-column flex-md-row justify-md-content-between align-items-stretch">
        <div class="w-100">
          <div class="align-self-stretch me-3 text-center">
            <h4>O naszych wycieczkach...</h4>
            <p>Film ze zdjęciami z podróży naszych klientów. Być może Państwa zdjęcia z wyprawy trafią tu za niedługo!
            </p>
          </div>
          <div style="height: 300px !important;" class="embed-responsive embed-responsive-16by9 h-75 me-md-4 mb-5 mb-md-0">
            <iframe class="embed-responsive-item h-100 w-100" src="https://www.youtube.com/embed/t7ZpJ7wWlZI"></iframe>
          </div>
        </div>
        <div class="w-100">
          <!--FORM-->
          <form class="d-flex flex-column">
            <h4>Ask for an offert</h4>
            <div class="form-group">
              <label for="exampleFormControlInput1">Adres email</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Ofert</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Restaurant</option>
                <option>Apartments</option>
                <option>Conference</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2">Persons</label>
              <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Comment</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-primary align-self-stretch align-self-md-end mt-4">Wyślij</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('shared.footer')

</body>

</html>