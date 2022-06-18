<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container">
        <!-- <h1>Choose your room</h1> -->
        @can('is-admin')
        <div class="row">
            <a class="btn-primary btn my-5 block ml-5" style="width: 10rem"
                href="{{ route('rooms.create') }}">Add new room</a>
        </div>
        @endcan

        
        <div class="container">
            <h1>Make Reservation</h1>

            <form class='container my-3' method="POST" action="{{ route('reservations.store') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" class="@error('email') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
                <div class="form-group mb-2">
                    <label for="room_id">Room ID</label>
                    <input id="room_id" name="room_id" type="text" class="@error('room_id') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
                <div class="form-group mb-2">
                    <label for="check_in">Check_in</label>
                    <input id="check_in" name="check_in" class="form-control datepicker"
                        class="@error('check_in') is-invalid @else is-valid @enderror">
                    <!-- <div class="invalid-feedback">Invalid value!</div> -->
                </div>
                <div class="form-group mb-2">
                    <label for="check_out">Check_out</label>
                    <input id="check_out" name="check_out" class="form-control datepicker" class="@error('check_out') is-invalid @else is-valid @enderror">
                    <!-- <div class="invalid-feedback">Invalid value!</div> -->
                </div>
                <input type="submit" value="Reserve">
            </form>
        </div>

        <h3>Available rooms</h3>
        <div class="row">
            <div class="col">
                @forelse ($rooms as $room)
                    <div class="card mb-3" style="max-width: 740px;">
                        <div class="row g-2">
                            <div class="col-6">
                                <img src={{asset('storage/img/room'.$room->id.'.jpg')}} class="card-img-top" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">{{$room->type}} RoomID = {{$room->id}}</h5>
                                    <p class="card-text">Beds: {{$room->beds}}</p>
                                    <p class="card-text">Residents: {{$room->persons}}</p>
                                    <p class="card-text">Area: {{$room->area}} m<sup>2</sup></p>
                                    <!-- <a href="{{route('reservations.create')}}" class="btn btn-danger">Reserve</a> -->
                                </div>
                            </div>
                        <div class="card-footer text-muted">
                        Price: {{$room->price}} PLN/day
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@include('shared.footer')
</body>

<script type="text/javascript">
var disableDates = ["9-11-2019", "14-11-2019", "15-11-2019","27-6-2022"];
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: new Date(),
    beforeShowDay: function(date){
        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
        if(disableDates.indexOf(dmy) != -1){
            return false;
        }
        else{
            return true;
        }
    }
});
</script>

</html>
