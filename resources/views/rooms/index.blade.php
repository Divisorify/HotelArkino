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
                @if (Auth::check())
                <input type="submit" value="Reserve">
                @endif
                <button type="button" class="btn btn-primary" onClick="window.location.reload();">Search for available rooms</button>
            </form>
        </div>

        @foreach($reservations as $reservation)
        <div class="reserved_room">{{ $reservation->room_id }}</div>
        <div class="reserved_check_in">{{ $reservation->check_in }}</div>
        <div class="reserved_check_out">{{ $reservation->check_out }}</div>
        @endforeach
        <script type="text/javascript">
        var reserved_room = document.getElementsByClassName("reserved_room");
        var reserved_check_in = document.getElementsByClassName("reserved_check_in");
        var reserved_check_out = document.getElementsByClassName("reserved_check_out");

        var check_in = document.getElementById("check_in");
        var check_out = document.getElementById("check_out");

        var i = 5;
        while(i>0){
            document.write(i);
            i--;
        }

        document.write(check_out.value);
        // document.write(statuses[8].innerHTML)

        var ReservedRoom = []
        for(var i=0; i<reserved_room.length; i++) ReservedRoom.push(reserved_room[i].textContent)
        var nameList = ReservedRoom.join()
        document.write(nameList)
        document.write('</br>')

        var ReservedIn = []
        for(var i=0; i<reserved_check_in.length; i++) ReservedIn.push(reserved_check_in[i].textContent)
        var nameList1 = ReservedIn.join()
        document.write(nameList1)
        document.write('</br>')

        var ReservedOut = []
        for(var i=0; i<reserved_check_out.length; i++) ReservedOut.push(reserved_check_out[i].textContent)
        var nameList2 = ReservedOut.join()
        document.write(nameList2)
        document.write('</br>')

        document.write(ReservedRoom[1]+', ')
        document.write(ReservedIn[1]+', ')
        document.write(ReservedOut[1]+', ')


        // var x = check_in.value.replace(/-/g, '');
        // var y = parseInt(ReservedOut[i].replace(/-/g, ''),10);
        // document.write(x+' ')
        // document.write(y+' ')
        // document.write(check_in.getDate == ReservedIn[1].getDate);
        // document.write(x > y);
        // document.write(check_in.getDate > ReservedOut[1].getDate);
        var check_ins = parseInt(check_in.value.replace(/-/g, ''),10);
        var check_outs = parseInt(check_out.value.replace(/-/g, ''),10);
        document.write(check_ins)
        var ilosc = reserved_room.length;
        var i = 0;
        var UnavailableRooms = [];
        while(ilosc>0){
            var ReservedIns = parseInt(ReservedIn[i].replace(/-/g, ''),10);
            var ReservedOuts = parseInt(ReservedOut[i].replace(/-/g, ''),10);
            var ReservedRooms = parseInt(ReservedRoom[i],10);
            document.write('</br>'+ReservedRooms+'\n');
            // document.write(check_ins>ReservedIns);
            document.write(i+'.');
                if (((check_ins < ReservedIns) && (check_outs < ReservedIns)) ||
                    ((check_ins > ReservedOuts) && (check_outs > ReservedOuts))) {
                document.write("Zapraszamy"+'\n');
                }else{
                    document.write("Zajęte"+'\n');
                    UnavailableRooms.push(ReservedRooms);
                }
                ilosc--;
                i++;
        }

        document.write('</br>'+UnavailableRooms);

        // elements = [1, 2, 9, 15].join(',')
        // $.post('{{ route('rooms.index') }}', {elements: elements})
        
        </script>

        <h3>Available rooms</h3>
        <div class="row">
        <pre id="target-id">Message</pre>
        <script>
            document.getElementById('target-id').innerHTML = UnavailableRooms;
        </script>
            <div class="col">
                @forelse ($rooms as $room)
                <?php
                echo "Hello World!";

                ?> 
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
                                    @if (Auth::check())
                                    <a href="{{route('reservations.create', $room->id)}}" class="btn btn-danger">Reserve</a>
                                    @endif
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
var disableDates = ["2022-7-13", "2022-7-5","2022-7-10"];

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
