@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg" href="/invoices/create"> Create new invoice</a>
            <br></br>
        </div>
    </div>

    <div>
        <table id="invoices" class="table table-condensed table-striped">
            <thead>

                <tr>

                </tr>

            </thead>
        </table>
    </div>




@endsection
