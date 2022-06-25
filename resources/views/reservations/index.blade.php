<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    <h2>My reservations</h2>
    @can('is-admin')
        <div class="row">
            <a class="btn-primary btn my-5 block ml-5" style="width: 10rem"
                href="{{ route('reservations.create') }}">Add new reservation</a>
        </div>
    @endcan

    @can('is-admin')
    <h2>Hi Admin!</h2>
    <table class="table table-striped">
        <div class="row-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room</th>
                    <th scope="col">Email</th>
                    <th scope="col">Check_in</th>
                    <th scope="col">Check_out</th>
                </tr>
            </thead>
            <tbody>
                <div class="row g-2">
                    @forelse ($reservations as $reservation)
                        <tr>
                            <th scope="row">{{ $reservation->id }}</a>
                            </th>
                            <td>{{ $reservation->room_id }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->check_in }}</td>
                            <td>{{ $reservation->check_out }}</td>
                            @can('is-admin')
                            <td><a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a></td>
                            @endcan

                            @can('is-admin')
                            <td>
                                <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <p style="color: #CC4E50; font-weight: 700; font-size: 20px">You have no reservations yet.</p>
                    @endforelse
    </table>
    @endcan

    
    @if (Auth::user()->email == 'marta@email.com')
    <h2>Hi Marta!</h2>
    <table class="table table-striped">
        <div class="row-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room</th>
                    <th scope="col">Email</th>
                    <th scope="col">Check_in</th>
                    <th scope="col">Check_out</th>
                </tr>
            </thead>
            <tbody>
                <div class="row g-2">
                    @forelse ($reservations as $reservation)
                        <tr>
                            <th scope="row">{{ $reservation->id }}</a>
                            </th>
                            <td>{{ $reservation->room_id }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->check_in }}</td>
                            <td>{{ $reservation->check_out }}</td>
                            @can('is-admin')
                            <td><a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a></td>
                            @endcan

                            @can('is-admin')
                            <td>
                                <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <p style="color: #CC4E50; font-weight: 700; font-size: 20px">You have no reservations yet.</p>
                    @endforelse
    </table>
    @endif

    @if (Auth::user()->email == 'siuhun@email.com')
    <h2>Hi Siuhun!</h2>
    <table class="table table-striped">
        <div class="row-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room</th>
                    <th scope="col">Email</th>
                    <th scope="col">Check_in</th>
                    <th scope="col">Check_out</th>
                </tr>
            </thead>
            <tbody>
                <div class="row g-2">
                    @forelse ($reservations as $reservation)
                        <tr>
                            <th scope="row">{{ $reservation->id }}</a>
                            </th>
                            <td>{{ $reservation->room_id }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->check_in }}</td>
                            <td>{{ $reservation->check_out }}</td>
                            <!-- @can('is-admin')
                            <td><a href="{{ route('rooms.edit', $room->id) }}">Edit</a></td>
                            @endcan -->

                            <!-- @can('is-admin')
                            <td>
                                <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            @endcan -->
                        </tr>
                    @empty
                        <p style="color: #CC4E50; font-weight: 700; font-size: 20px">You have no reservations yet.</p>
                    @endforelse
    </table>
    @endif

@include('shared.footer')
</body>

</html>
