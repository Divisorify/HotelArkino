<!doctype html>
<html lang="en">

@include('shared.header')

<body>
@include('shared.nav')
    <div class="container">
        @if (Route::is('reservations.create'))
            <h1 class="my-5">Add reservation</h1>
            <form class='container mb-3' method="POST" action="{{ route('reservations.store') }}">
                @csrf
            @elseif(Route::is('reservations.edit'))
                <h1 class="my-5">Edit reservation</h1>
                <form class='container mb-3' method="POST" action="{{ route('reservations.update', $reservations->email) }}">
                    @csrf
                    @method('PUT')
                @else
        @endif
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input @isset($reservations) value={{ $reservations->email }} @endisset id="email" name="email"
                type="text" class="form-control @error('email') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="room_id" class="col-sm-2 col-form-label">RoomID</label>
            <div class="col-sm-10">
                <input @isset($reservations) value={{ $reservations->room_id }} @endisset id="room_id" name="room_id"
                    type="text" class="form-control @error('room_id') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="check_in" class="col-sm-2 col-form-label">Check_in</label>
            <div class="col-sm-10">
                <input @isset(reservations) value={{ $reservations->check_in }} @endisset id="check_in"
                    name="check_in" type="date"
                    class="form-control @error('check_in') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="check_out" class="col-sm-2 col-form-label">Check_out</label>
            <div class="col-sm-10">
                <input @isset($reservations) value={{ $reservations->check_out }} @endisset id="check_out" name="check_out"
                    type="text" class="form-control @error('check_out) is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Send">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @include('shared.footer')
</body>

</html>
