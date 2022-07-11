<!doctype html>
<html lang="en">

@include('shared.header')

<body>

    @include('shared.nav')

    <div class="container">
        <h1 class="mt-5 text-center">Update Roomtype</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form class='container my-5' method="POST" action="{{ route('roomtypes.update', $roomtype->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <input value={{ $roomtype->type }} id="type" name="type" type="text"
                        class="form-control @error('type') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Incorrect type!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="persons" class="col-sm-2 col-form-label">Persons</label>
                <div class="col-sm-10">
                    <input value={{ $roomtype->persons }} id="persons" name="persons" type="text"
                        class="form-control @error('persons') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Incorrect value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="beds" class="col-sm-2 col-form-label">Beds</label>
                <div class="col-sm-10">
                    <input value={{ $roomtype->beds }} id="beds" name="beds" type="text"
                        class="form-control @error('beds') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Incorrect value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input value={{ $roomtype->description }} id="description" name="description" type="text"
                        class="form-control @error('description') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Incorrect value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input value={{ $roomtype->price }} id="price" name="price" type="text"
                        class="form-control @error('price') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Incorrect value!</div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Send">
        </form>
    </div>

    @include('shared.footer')
</body>

</html>
