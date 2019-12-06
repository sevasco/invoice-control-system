@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg" href="/invoice/create"> Create new invoice</a>
            <br></br>
        </div>
    </div>

    <div>
        <table id="data-table" class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>Invoice No.</th>
                <th>Create Date</th>
                <th>Customer Name</th>
                <th>Invoice Total</th>
                <th>Print</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
    </div>



    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td> Hola !</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
