<div class="btn-group btn-group-sm">
    <a href="{{ route('items.edit', $item) }}" class="btn btn-info">{{ __('Edit') }}</a>
    <button type="submit" class="btn btn-danger" form="deleteSeller{{ $item->id }}" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
    <form action="{{ route('items.destroy', $item) }}" method="post" id="deleteSeller{{ $item->id }}">
        @csrf
        @method('DELETE')
    </form>
</div>

