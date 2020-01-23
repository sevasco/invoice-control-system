 <div class="btn-group btn-group-sm">
        <a href="{{ route('sellers.edit', $seller) }}" class="btn btn-info">{{ __('Edit') }}</a>
        <button type="submit" class="btn btn-danger" form="deleteSeller{{ $seller->id }}">{{ __('Delete') }}</button>
        <form action="{{ route('sellers.destroy', $seller) }}" method="post" id="deleteSeller{{ $seller->id }}">
            @csrf
            @method('DELETE')
        </form>
 </div>
