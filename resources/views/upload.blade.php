@extends('master')
@section('dashapace')
    <div class="col-8 mt-3 mx-auto">
        <div class="card">

            <div class="card-header">
                <span class="font-weight-bold">Precription</span>
                
            </div>

            <div class="card-body">
                <form action="/prescription" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control " value="{{Session::get('user')['id']}}" name="user_id" hidden>
                    </div>

                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="text" class="form-control" name="note">
                    </div>

                    <div class="form-group">
                        <label for="">Delivery Address</label>
                        <input type="text" class="form-control" required name="address" value="{{ Session::get('user')['address']}}">
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Upload Image - 01</label>
                                <input type="file" class="form-control" name="img1" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Upload Image - 02</label>
                                <input type="file" class="form-control" name="img2" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Upload Image - 03</label>
                                <input type="file" class="form-control "name="img3" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="">Upload Image - 04</label>
                                <input type="file" class="form-control "name="img4" required>            
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="">Upload Image - 05</label>
                                <input type="file" class="form-control"name="img5" required>
                                
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-success">submit</button>
                        <button type="reset" class="btn btn-danger">reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
