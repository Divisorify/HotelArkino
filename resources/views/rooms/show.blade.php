<!doctype html>
<html lang="en">

@include('shared.header')

<body>

  @include('shared.nav')

  <div class="card text-center mb-5 mt-5 mx-auto" style="width: 80%;">
    <div class="card-header">
      {{$room->type}} ({{$room->persons}})
    </div>
    <img src={{asset('storage/img/room'.$room->id.'.jpg')}} class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Beds {{$room->beds}}</h5>
      <p class="card-text">Area {{$room->area}} m<sup>2</sup></p>
      <a href="{{route('rooms.index')}}" class="btn btn-primary">Go back</a>
    </div>
    <div class="card-footer text-muted">
      Beds: {{$room->beds}}
    </div>
  </div>


  @include('shared.footer')
</body>

</html>