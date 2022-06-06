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
                        <!-- <td>
                            <form method="POST" action="{{ route('login', $room->id) }}">
                                @csrf
                                
                                <button class="btn btn-danger"  href="{{ route('login') }}">Reserve</button>
                            </form>
                        </td> -->
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
