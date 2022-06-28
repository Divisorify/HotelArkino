<!doctype html>
<html lang="en">

@include('shared.header')

<body>
@include('shared.nav')
    <div class="container">
        @if (Route::is('offers.edit'))
        <h1 class="mt-5 text-center">Update Offer</h1>
        <form class='container mb-3' method="POST" action="{{ route('offers.update', $offer->id) }}">
                @csrf
                @method('PUT')
        
        @elseif (Route::is('offers.create'))
            <h1 class="my-5">Add offer</h1>
            <form class='container mb-3' method="POST" action="{{ route('offers.store') }}">
                @csrf
                
        @endif
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input @isset($offer) value={{ $offer->email }} @endisset id="email" name="email"
                    type="text" class="form-control @error('email') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="roomtype" class="col-sm-2 col-form-label">Room Type</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option value="1">Classic</option>
                  <option value="2">Studio</option>
                  <option value="3">Superior</option>
                  <option value="4">Master</option>
                  <option value="5">Family</option>
                  <option value="6">Presidental</option>
                </select>
                    <input @isset($offer) value={{ $offer->roomtype }} @endisset id="roomtype" name="roomtype"
                    type="text" class="form-select @error('roomtype') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="residents" class="col-sm-2 col-form-label">Residents</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                    <input @isset($offer) value={{ $offer->residents }} @endisset id="residents" name="residents"
                    type="number" class="form-control @error('residents') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="check_in" class="col-sm-2 col-form-label">Check_in</label>
                <div class="col-sm-10">
                    <input @isset($offer) value={{ $offer->check_in }} @endisset id="check_in" class="form-control datepicker"
                        name="check_in" class="form-control @error('check_in') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="check_out" class="col-sm-2 col-form-label">Check_out</label>
                <div class="col-sm-10">
                    <input @isset($offer) value={{ $offer->check_out }} @endisset id="check_out" name="check_out" class="form-control datepicker"
                        class="form-control @error('check_out') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-10">
                    <input @isset($offer) value={{ $offer->comment }} @endisset id="comment" name="comment"
                        type="text" class="form-control @error('comment') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">Invalid value!</div>
                </div>
            </div>

            <input class="btn btn-primary" type="submit" value="Send">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
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

<script type="text/javascript">
var disableDates = ["2022-7-13", "2022-6-25","2022-6-27"];

for (let i = 0; i < 1; i++) { 

}
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: new Date(),
    beforeShowDay: function(date){
        dmy = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" +  date.getDate();
        if(disableDates.indexOf(dmy) != -1){
            return false;
        }
        else{
            return true;
        }
    }
});
</script>

</html>
