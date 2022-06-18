<!doctype html>
<html lang="en">

@include('shared.header')

<body>

    @include('shared.nav')
    <div class="container">
        <h1>Make Reservation</h1>

        <form class='container my-5' method="POST" action="{{ route('reservations.store') }}">
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
                <input id="check_in" name="check_in" type="date"
                    class="@error('check_in') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="check_out">Check_out</label>
                <input id="check_out" name="check_out" type="date" class="@error('check_out') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <input type="submit" value="Send">
        </form>

    </div>
    @include('shared.footer')
</body>

</html>
