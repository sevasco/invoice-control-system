<div class="btn-group btn-group-sm">
    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-info">{{ __('Edit') }}</a>
    <button type="submit" class="btn btn-danger" form="deleteSeller{{ $invoice->id }}">{{ __('Delete') }}</button>
    <form action="{{ route('invoices.destroy', $invoice) }}" method="post" id="deleteSeller{{ $invoice->id }}">
        @csrf
        @method('DELETE')
    </form>
</div>

