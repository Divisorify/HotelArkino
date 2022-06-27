<!doctype html>
<html lang="en">

@include('shared.header')

<body>

  @include('shared.nav')

  @can('is-admin')
    <table class="table table-striped my-4">
        <div class="row-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Residents</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
                <div class="row g-2">
                    @forelse ($offers as $offer)
                        <tr>
                            <th scope="row">{{ $offer->id }}</a>
                            </th>
                            <td>{{ $offer->email }}</td>
                            <td>{{ $offer->roomtype }}</td>
                            <td>{{ $offer->residents }}</td>
                            <td>{{ $offer->check_in }}</td>
                            <td>{{ $offer->check_out }}</td>
                            <td>{{ $offer->comment }}</td>
                            @can('is-admin')
                            <td><a href="{{ route('offers.edit', $offer->id) }}">Edit</a></td>
                            @endcan

                            @can('is-admin')
                            <td>
                                <form method="POST" action="{{ route('offers.destroy', $offer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <p style="color: #CC4E50; font-weight: 700; font-size: 20px">You have no offers yet.</p>
                    @endforelse
    </table>
    @endcan

  @include('shared.footer')

</body>

</html>