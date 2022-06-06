<!doctype html>
<html lang="en">

@include('shared.header')

<body>

    @include('shared.nav')

    <div class="container">
        <h1 class="mt-5 text-center">Update Room</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form class='container my-5' method="POST" action="{{ route('rooms.update', $room->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="type">Type</label>
                <input value={{ $room->type }} id="type" type="type" type="text"
                    class="@error('type') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid type!</div>
            </div>
            <div class="form-group mb-2">
                <label for="persons">Persons</label>
                <input value={{ $room->persons }} id="persons" name="persons" type="text"
                    class="@error('persons') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="beds">Beds</label>
                <input value={{ $room->beds }} id="beds" name="beds" type="text"
                    class="@error('beds') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="area">Powierzchnia</label>
                <input value={{ $room->area }} id="area" name="area" type="text"
                    class="@error('area') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input value={{ $room->price }} id="price" name="price"
                    type="text" class="@error('price') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <input type="submit" value="Send">
        </form>

    </div>
    @include('shared.footer')
</body>

</html>
