<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container mb-5">
        <h1>Choose your room</h1>
        @can('is-admin')
        <div class="row">
            <a class="btn-primary btn my-5 block ml-5" style="width: 10rem"
                href="{{ route('rooms.create') }}">Add new room</a>
        </div>
        @endcan
        
        
            <!-- <script>
            $('.datepicker').datepicker({
                disable: [
                [2015,3,3],
                [2015,3,12],
                [2015,3,20]
                ]
            })
            </script>
        
        <div class="card bg-dark text-white">
            <img src="..." class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">Last updated 3 mins ago</p>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

        <section class="container">
            <h2 class="py-2">Datepicker in Bootstrap 5</h2>
            <form class="row">
                <label for="date" class="col-1 col-form-label">Date</label>
                <div class="col-5">
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" id="date"/>
                    <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                        <i class="fa fa-calendar"></i>
                    </span>
                    </span>
                </div>
                </div>
            </form>
        </section>

        <div class="md-form md-outline input-with-post-icon datepicker">
            <input placeholder="Select date" type="text" id="example" class="form-control">
            <label for="example">Try me...</label>
            <i class="fas fa-calendar input-prefix" tabindex=0></i>
        </div> -->
            
        <table class="table table-striped">
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
                @forelse ($rooms as $room)
                <!-- <div class="card">
                    <h5 class="card-header">{{$room->type}}</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div> -->
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
                                <!-- @method('DELETE') -->
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign in...</a>
                        </li> -->
                        @endif
                    </tr>
                @empty
                    <p style="color: #CC4E50; font-weight: 700; font-size: 20px">No records</p>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('shared.footer')
</body>

</html>
