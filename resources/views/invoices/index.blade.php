@extends ('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg float-right"
               href="{{ route('invoices.create') }}"> {{ __('Create new Invoice')}}</a>
            <a class="btn btn-outline-info btn-lg" href="{{ route('home') }}">{{ __('Go Home') }}</a>
            <br></br>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead class="table-dark text-center">
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Issued at') }}</th>
                    <th>{{ __('Expired at') }}</th>
                    <th>{{ __('Received_at') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Total') }}</th>
                    <th>{{ __('Seller') }}</th>
                    <th>{{ __('Customer') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->number }}</td>
                        <td>{{ $invoice->issued_at }}</td>
                        <td>{{ $invoice->expired_at }}</td>
                        <td>{{ $invoice->received_at }}</td>
                        <td>{{ $invoice->description }}</td>
                        <td>${{ number_format($invoice->total, 2) }}</td>
                        <td>{{ $invoice->seller->name }}</td>
                        <td>{{ $invoice->customer->name }}</td>
                        <td><h5>
                                @if($invoice->status_id == '1')<span
                                    class="badge badge-secondary">{{ __('Issued') }}</span>@endif
                                @if($invoice->status_id == '3')<span
                                    class="badge badge-danger">{{ __('Expired') }}</span>@endif
                                @if($invoice->status_id == '4')<span
                                    class="badge badge-success">{{ __('Voided') }}</span>@endif
                                @if($invoice->status_id == '2')<span
                                    class="badge badge-light">{{ __('Cancelled') }}</span>@endif
                            </h5></td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link"
                                   title="{{ __('Show Details') }}">
                                    <i class="fas fa-eye" style="color:black"></i>
                                </a>
                                <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link"
                                   title="{{ __('Edit Invoice') }}">
                                    <i class="fas fa-edit" style="color:black"></i>
                                </a>

                                <button type="button" class="btn btn-link text-danger"
                                        data-route="{{ route('invoices.destroy', $invoice) }}"
                                        data-toggle="modal" data-target="#confirmDeleteModal"
                                        title="{{ __('Delete Invoice') }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            {{ $invoices->links() }}
        </ul>

        <!-- Import form -->
        <div class="card-footer justify-content-lg-start">
            <form action="{{ route('invoices.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h5><strong>Import Excel File</strong></h5>
                <input type="file" name="file" class="form-control-file">
                <br>
                <button class="btn btn-success"><i class="fas fa-file-excel"></i> {{ __('Import') }}</button>
            </form>
        </div>
    </div>
@endsection
