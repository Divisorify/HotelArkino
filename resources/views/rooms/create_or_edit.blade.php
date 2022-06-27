<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container my-5">
        @if (Route::is('rooms.create'))
            <h1 class="my-5">Add room</h1>
            <form class='container mb-3' method="POST" action="{{ route('rooms.store') }}">
                @csrf
        @endif

        @if (Route::is('rooms.edit'))
            <h1 class="my-5">Edit room</h1>
            <form class='container mb-3' method="POST" action="{{ route('rooms.update', $room->id) }}">
                @csrf
                @method('PUT')
        @endif

            <div class="row mb-3">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <input @isset($room) value={{ $room->type }} @endisset id="type" name="type"
                        type="text" class="form-control @error('type') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="persons" class="col-sm-2 col-form-label">Persons</label>
                <div class="col-sm-10">
                    <input @isset($room) value={{ $room->persons }} @endisset id="persons" name="persons"
                        type="text" class="form-control @error('persons') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="beds" class="col-sm-2 col-form-label">Beds</label>
                <div class="col-sm-10">
                    <input @isset($room) value={{ $room->beds }} @endisset id="beds"
                        name="beds" type="text"
                        class="form-control @error('beds') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="area" class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-10">
                    <input @isset($room) value={{ $room->area }} @endisset id="area" name="area"
                        type="text" class="form-control @error('area') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input @isset($room) value={{ $room->price }} @endisset id="price"
                        name="price" type="text"
                        class="form-control @error('price') is-invalid @else is-valid @enderror">
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
