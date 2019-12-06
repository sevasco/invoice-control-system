@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">New invoice</h1>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="/customers" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Type a title">
                </div>
            </form>
        </div>
    </div>


    <div>
        <div>
            <button class="btn btn-primary btn-lg" type="submit">Save</button>
            <a class="btn btn-secondary btn-lg float-right" href="/customers">Back</a>
        </div>
    </div>



@endsection
