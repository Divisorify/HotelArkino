<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container my-5">
        @if (Route::is('roomtypes.create'))
            <h1 class="my-5">Add roomtype</h1>
            <form class='container mb-3' method="POST" action="{{ route('roomtypes.store') }}">
                @csrf
        @endif

        @if (Route::is('roomtypes.edit'))
            <h1 class="my-5">Edit roomtype</h1>
            <form class='container mb-3' method="POST" action="{{ route('roomtypes.update', $roomtype->id) }}">
                @csrf
                @method('PUT')
        @endif
        <div class="row mb-3">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->type }} @endisset id="type" name="type" type="text"
                    class="form-control @error('type') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect type!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="persons" class="col-sm-2 col-form-label">Persons</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->persons }} @endisset id="persons" name="persons" type="text"
                    class="form-control @error('persons') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="beds" class="col-sm-2 col-form-label">Beds</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->beds }} @endisset id="beds" name="beds" type="text"
                    class="form-control @error('beds') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->description }} @endisset id="description" name="description" type="text"
                    class="form-control @error('description') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->price }} @endisset id="price" name="price" type="text"
                    class="form-control @error('price') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect value!</div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="room_id" class="col-sm-2 col-form-label">Room ID</label>
            <div class="col-sm-10">
                <input @isset($roomtype) value={{ $roomtype->room_id }} @endisset id="room_id" name="room_id" type="text"
                    class="form-control @error('room_id') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Incorrect value!</div>
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
