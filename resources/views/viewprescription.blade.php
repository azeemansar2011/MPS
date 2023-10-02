@extends('admin')
@section('dashapace')

<div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Uploaded Prescriptions</span>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-5 border">
                    <table class="mx-auto">
                        <tr>
                            <td colspan="5" class="text-center"><a href="{{ asset($prescription[0]->img1) }}"
                                    target="_blank"><img src="{{  asset($prescription[0]->img1) }}" alt=""
                                        width="200" height="200" class="borderd"></a></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset($prescription[0]->img2) }}" target="_blank"><img
                                        src="{{ asset($prescription[0]->img2) }}" alt="" width="120"
                                        height="110"></a>
                            </td>
                            <td>
                                <a href="{{ asset($prescription[0]->img3) }}" target="_blank"><img
                                        src="{{ asset($prescription[0]->img3) }}" alt="" width="120"
                                        height="110"></a>
                            </td>
                            <td>
                                <a href="{{ asset($prescription[0]->img4) }}" target="_blank"><img
                                        src="{{ asset($prescription[0]->img4) }}" alt="" width="120"
                                        height="110"></a>
                            </td>
                            <td>
                                <a href="{{ asset($prescription[0]->img5) }}" target="_blank"><img
                                        src="{{ asset($prescription[0]->img5) }}" alt="" width="120"
                                        height="110"></a>
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="col-12 col-lg-7">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Drugs</th>
                                <th>Quanity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i=1; @endphp
                            @php $total=0; @endphp
                            @forelse ($quataionlist as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td class="text-right">{{$row->price}} x {{$row->quanity}}</td>
                                <td class="text-right">{{$row->price*$row->quanity}}</td>
                                @php $total+=$row->price*$row->quanity ; @endphp
                            </tr>
                          @empty
                            <tr>
                                <td colspan="3" class="text-danger text-center">No Medicins</td>
                            </tr>
                          @endforelse
                            <tr>

                                <td colspan="2" class="text-center">
                                    Total
                                </td>
                                <td class="text-right">
                                    {{$total}}.00
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="/addquatation" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-6 col-form-label text-right">Drug</label>
                            <div class="col-6">
                                <select class="form-control " name="medicine_id"  >
                                    <option value="" selected disabled>-Select Drugs Name-</option>
                                    @foreach ($medicines as $medicine)
                                        <option  value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-6 col-form-label text-right">Quantity</label>
                            <div class="col-6">
                                <input type="number" class="form-control @error('quanity') is-invalid @enderror"
                                    id="inputPassword3" placeholder="Quantity" name="quanity">

                                @error('quanity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="text" hidden name='prescription_id' value="{{$prescription[0]->id}}">
                       
                     
                        

                        <div class="text-right">
                            <button class="btn btn-success" type="submit">Add</button>
                        </div>

                        <hr>
                    </form>
                    <div class="text-right">
                        <a href="/sendquataion/{{$prescription[0]->id}}/{{$total}}" class="btn btn-primary">Send Quotation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection