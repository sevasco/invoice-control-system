 <div class="btn-group btn-group-sm">
        <a href="{{ route('sellers.edit', $seller) }}" class="btn btn-info">{{ __('Edit') }}</a>
        <button type="submit" class="btn btn-danger" form="deleteSeller{{ $seller->id }}" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
        <form action="{{ route('sellers.destroy', $seller) }}" method="post" id="deleteSeller{{ $seller->id }}">
            @csrf
            @method('DELETE')
        </form>
 </div>
