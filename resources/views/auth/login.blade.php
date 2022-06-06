<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    <div id="..." class="container mt-3 mb-5">
        <div class="mt-4 mb-4">
            <div class="row">
                <h1>Sign in</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                class="@error('email') is-invalid @else is-valid @enderror">
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input id="password" name="password" type="password"
                    class="@error('password') is-invalid @else is-valid @enderror">
            </div>
            <div class="form-group mt-4">
                <input type="submit" value="Send">
            </div>
        </form>
    </div>

    @include('shared.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
