<form action="{{ route('goods.destroy', $good->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group">
    
        <a href="{{ route('goods.edit', $good->id) }}" class="btn btn-default btn-xs">
            <i class="bi bi-pencil-fill"></i>
        </a>
        <button type="submit" class="btn btn-default btn-xs" onclick="return confirm('Are you sure?')">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</form>