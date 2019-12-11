@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">New invoice</h1>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="/invoice" method="post">
                <div class="form-group">
                    <label for="title">Factura de Venta</label>
                    <input type="text" class="form-control" id="invoices" name="invoice no" placeholder="Type a invoice no.">
                </div>
            </form>
        </div>
    </div>


    <div>
        <div>
            <button class="btn btn-primary btn-lg" type="submit">Save</button>
            <a class="btn btn-secondary btn-lg float-right" href="/invoice">Back</a>
        </div>
    </div>



@endsection
