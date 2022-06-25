<!doctype html>
<html lang="en">

@include('shared.header')

<body>

    @include('shared.nav')
    <div class="container">
        <h1>Add Room</h1>

        <form class='container my-5' method="POST" action="{{ route('rooms.store') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="type">Type</label>
                <input id="type" name="type" type="text" class="@error('type') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="persons">Persons</label>
                <input id="persons" name="persons" type="text" class="@error('persons') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="beds">Beds</label>
                <input id="beds" name="beds" type="text"
                    class="@error('beds') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="area">Area</label>
                <input id="area" name="area" type="text" class="@error('area') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input id="price" name="price" type="text"
                    class="@error('price') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">Invalid value!</div>
            </div>
            <input type="submit" value="Send">
        </form>

    </div>
    @include('shared.footer')
</body>

</html>
