@extends('admin')
@section('dashapace')



        <div class="card-header font-weight-bold">
            All Prescription
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th scope="col"> id</th>
                    <th scope="col">customer name</th>
                    <th scope="col"> Date</th>
                    <th scope="col">customer phone</th>
                    <th scope="col">Prescription Staus</th>
                    <th scope="col">Prescription Address</th>
                    <th scope="col">Action</th>
                </thead>

                <tbody>
                    <tr>
                        @forelse ($allprecriptions as $precriptions)
                    <tr>
                        <td>{{ $precriptions->id }}</td>
                        <td>{{ $precriptions->name }}</td>
                        <td>{{ $precriptions->date }}</td>
                        <td>{{ $precriptions->mobile }}</td>
                        <td>{{ $precriptions->status }}</td>
                        <td>{{ $precriptions->address }}</td>
                        <td>
                            @if($precriptions->status=='quatation send')
                            <span class="badge badge-warning">waiting</span>
                            @elseif($precriptions->status=="accepted")
                            <a class="btn btn-info" href="/qatationview/{{$precriptions->id}}">view</a>
                            @elseif($precriptions->status=="pennding")
                            <a class="btn btn-success" href="/qatationaccept/{{$precriptions->id}}">Accept</a>
                            <a class="btn btn-danger" href="/qatationreject/{{$precriptions->id}}">Reject</a>
                            @else
                            <a class="btn btn-success" href="/qatationaccept/{{$precriptions->id}}">Accept</a>
                           @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="text-danger text-center font-weight-bold">No Data Record</td>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection