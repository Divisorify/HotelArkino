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
                <button type="button" class="btn btn-primary" onClick="window.location.reload();">Search for available rooms</button>
            </form>
        </div>

        @foreach($reservations as $reservation)
        <!-- <div id="reserved_room">{{ $reservation->room_id }}</div>
        <div id="reserved_check_in" class="status">{{ $reservation->check_in }}</div>
        <div id="reserved_check_out">{{ $reservation->check_out }}</div> -->
        @section('scripts')
        <script type="text/javascript">
        var reserved_check_in = document.getElementById("reserved_check_in");
        var reserved_check_out = document.getElementById("reserved_check_out");
        var statuses = document.getElementsByClassName("status");
        var arrayLength = statuses.length;
        //document.write(arrayLength);
        for (var i = 0; i < arrayLength; i++) {
            statuses[i] = statuses[i].innerHTML;
            statuses[i] = statuses[i].substr(statuses.length-7);
            document.write(statuses[i]);
        }
        // disableDates.push(reserved_check_in.innerHTML)
        // disableDates.push(reserved_check_out.innerHTML)
        // document.write(reserved_check_in.innerHTML)

        //document.write(reserved_check_in.innerHTML.replace(/-/g, ''));
        reserved_check_in = reserved_check_in.innerHTML.replace(/-/g, '');
        reserved_check_out = reserved_check_out.innerHTML.replace(/-/g, '');

        reserved_check_in = parseInt(reserved_check_in, 10);
        reserved_check_out = parseInt(reserved_check_out, 10);
        document.write('/n'+reserved_check_in);
        document.write(reserved_check_out);

        var check_in = document.getElementById("check_in").value;
        var check_out = document.getElementById("check_out").value;
        

        check_in = check_in.replace(/-/g, '');
        check_out = check_out.replace(/-/g, '');
        check_in = parseInt(check_in,10);
        check_out = parseInt(check_out,10);
        document.write(check_in)
        document.write(check_out)
        

        document.write(check_in > reserved_check_out)
        if (((check_in < reserved_check_in) && (check_out < reserved_check_in)) || ((check_in > reserved_check_out) && (check_out > reserved_check_out))) {
        document.write("Zapraszamy")
        $("#tohide").hide();
        }else{
            document.write("Zajęte")
        }
        </script>
        @show
        @endforeach

        <h3>Available rooms</h3>
        <div class="row" id="tohide">
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
                                    <a href="{{route('reservations.create', $room->id)}}" class="btn btn-danger">Reserve</a>
                                    @can('is-admin')
                                    <a class="btn-primary btn block ml-5" style="width: 10rem"
                                        href="{{ route('rooms.edit', $room->id) }}">Edit room</a>
                                    @endcan
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
var disableDates = ["2022-7-13", "2022-6-25","2022-6-27"];

for (let i = 0; i < 1; i++) { 

}
document.write(disableDates)


$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: new Date(),
    beforeShowDay: function(date){
        dmy = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" +  date.getDate();
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
