@extends('admin')
@section('dashapace')
    <div class="col-8 mt-3 mx-auto">
        <div class="card">

            <div class="card-header">
                <span class="font-weight-bold">Precription</span>
                
            </div>

            <div class="card-body">
                <form action="/addmedicine" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Medicine Name</label>
                        <input type="text" class="form-control" required name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" required name="price" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">submit</button>
                        <button type="reset" class="btn btn-danger">reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8 card-body">
            <table class="table">
                <thead class="table-dark">
                    <th scope="col"> id</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Amout</th>
                    <th scope="col">Action</th>
                    
                </thead>

                <tbody>
                    <tr>
                        @forelse ($medicines as $medicine)
                    <tr>
                    <td>{{ $medicine->id }}</td>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->price }}</td>
                        <td> 
                            <a class="btn btn-success" href="#">update</a>
                            <a class="btn btn-danger" href="#">delete</a>
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="text-danger text-center font-weight-bold">No Data Record</td>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>


@endsection
