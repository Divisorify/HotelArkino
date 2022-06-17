<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    
    <!-- <div class="row">
                @forelse ($rooms as $room)
                    <div class="card mb-3" style="max-width: 740px;">
                        <div class="row g-2">
                            <div class="col-6">
                                <img src={{asset('storage/img/room'.$room->id.'.jpg')}} class="card-img-top" alt="...">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title">{{$room->type}}</h5>
                                    <p class="card-text">Beds: {{$room->beds}}</p>
                                    <p class="card-text">Residents: {{$room->persons}}</p>
                                    <p class="card-text">Area: {{$room->area}} m<sup>2</sup></p>
                                    <a href="{{route('rooms.index')}}" class="btn btn-danger">Reserve</a>
                                </div>
                            </div>
                        <div class="card-footer text-muted">
                        Price: {{$room->price}} PLN/day
                        </div>
                        </div>
                    </div>
                @endforeach
    </div> -->

    <div class="container">
        <h1>Choose your room</h1>
        @can('is-admin')
        <div class="row">
            <a class="btn-primary btn my-5 block ml-5" style="width: 10rem"
                href="{{ route('rooms.create') }}">Add new room</a>
        </div>
        @endcan
        
        <div class="container">
            <div class="row" style="max-width: 1620px">
                    <div class="col">
                        <label for="date" class="form-label">Check-in Date</label>
                        <div class="input-group date" id="datepicker" class="datepicker">
                            <input type="text" class="form-control datepicker" id="datepicker"/></input>
                            <span class="input-group-append">
                            <!-- <span class="input-group-text bg-light d-block"> -->
                                <!-- <i class="fa fa-calendar"></i> -->
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <label for="date" class="form-label">Check-out Date</label>
                        <div class="input-group date" id="datepicker" class="datepicker">
                            <input type="text" class="form-control datepicker" id="datepicker"/></input>
                            <span class="input-group-append">
                                <!-- <i class="fa fa-calendar"></i> -->
                            </span>
                        </div>
                    </div>
                <!-- <div class="col mb-3">
                    <form class="row" style="max-width: 220px">
                        <label for="exampleResidents" class="form-label">Residents</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </form>
                </div> -->
            </div>
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
                                    <h5 class="card-title">{{$room->type}}</h5>
                                    <p class="card-text">Beds: {{$room->beds}}</p>
                                    <p class="card-text">Residents: {{$room->persons}}</p>
                                    <p class="card-text">Area: {{$room->area}} m<sup>2</sup></p>
                                    <a href="{{route('rooms.index')}}" class="btn btn-danger">Reserve</a>
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

        <!--<table class="table table-striped">
            <div class="row-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room type</th>
                        <th scope="col">Persons</th>
                        <th scope="col">Beds</th>
                        <th scope="col">Area</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row g-2">
                        @forelse ($rooms as $room)
                            <tr>
                                <th scope="row"><a href="{{ route('rooms.show', $room->id) }}">{{ $room->id }}</a>
                                </th>
                                <td>{{ $room->type }}</td>
                                <td>{{ $room->persons }}</td>
                                <td>{{ $room->beds }}</td>
                                <td>{{ $room->area }} m<sup>2</sup></td>
                                <td>{{ $room->price }} PLN/day</td>
                                @can('is-admin')
                                <td><a href="{{ route('rooms.edit', $room->id) }}">Edit</a></td>
                                @endcan

                                @can('is-admin')
                                <td>
                                    <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                                @endcan

                                @if (Auth::check())
                                <td>
                                    <form method="POST" action="{{ route('login', $room->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" href="{{ route('login') }}">Reserve</button>
                                    </form>
                                </td>
                                @else
                                <td>
                                    <form method="POST" action="{{ route('login', $room->id) }}">
                                        @csrf
                                        
                                        <button class="btn btn-danger"  href="{{ route('login') }}">Reserve</button>
                                    </form>
                                </td>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Sign in...</a>
                                </li>
                                @endif
                            </tr>
                        @empty
                            <p style="color: #CC4E50; font-weight: 700; font-size: 20px">No records</p>
                        @endforelse
                    </div>
                </tbody>
            </div>  
        </table>-->
    </div>
    @include('shared.footer')
</body>

<script type="text/javascript">
var disableDates = ["9-11-2019", "14-11-2019", "15-11-2019","27-6-2022"];
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
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
