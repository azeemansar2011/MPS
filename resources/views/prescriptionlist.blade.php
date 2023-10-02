@extends('master')
@section('dashapace')

<div class="card">
        <div class="card-header font-weight-bold">
            New Prescription
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th scope="col">Prescription id</th>
                    <th scope="col">Prescription Date</th>
                    <th scope="col">Prescription Note</th>
                    <th scope="col">Prescription Staus</th>
                    <th scope="col">Prescription Address</th>
                    <th scope="col">Action</th>
                </thead>

                <tbody>
                    <tr>
                        @forelse ($precriptions as $precription)
                    <tr>
                        <td>{{ $precription->id }}</td>
                        <td>{{ $precription->date }}</td>
                        <td>{{ $precription->note }}</td>
                        <td>{{ $precription->status }}</td>
                        <td>{{ $precription->address }}</td>
                        <td >
                            <a href="#" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="prescriptionlistdelete/{{$precription->id}}" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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