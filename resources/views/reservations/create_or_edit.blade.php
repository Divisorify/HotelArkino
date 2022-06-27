<!doctype html>
<html lang="en">

@include('shared.header')

<body>
@include('shared.nav')
    <div class="container">
        @if (Route::is('reservations.edit'))
        <h1 class="mt-5 text-center" >Update Reservation</h1>
        <form class='container mb-3' method="POST" action="{{ route('reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if (Route::is('reservations.create'))
            <h1 class="my-5">Add reservation</h1>
            <form class='container mb-3' method="POST" action="{{ route('reservations.store') }}">
                @csrf
        @endif

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input @isset($reservation) value={{ $reservation->email }} @endisset id="email" name="email"
                type="text" class="form-control @error('email') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="room_id" class="col-sm-2 col-form-label">RoomID</label>
            <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option value="1">1 - Classic</option>
                <option value="2">2 - Studio</option>
                <option value="3">3 - Superior</option>
                <option value="4">4 - Master</option>
                <option value="5">5 - Family</option>
                <option value="6">6 - Presidental</option>
            </select>
                <input @isset($reservation) value={{ $reservation->room_id }} @endisset id="room_id" name="room_id"
                    type="text" class="form-control @error('room_id') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="check_in" class="col-sm-2 col-form-label">Check_in</label>
            <div class="col-sm-10">
                <input @isset($reservation) value={{ $reservation->check_in }} @endisset id="check_in"
                    name="check_in" type="date"
                    class="form-control @error('check_in') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="check_out" class="col-sm-2 col-form-label">Check_out</label>
            <div class="col-sm-10">
                <input @isset($reservation) value={{ $reservation->check_out }} @endisset id="check_out" name="check_out"
                    type="date" class="form-control @error('check_out') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Send">
        </form>
    </div>
    @include('shared.footer')
</body>

</html>
