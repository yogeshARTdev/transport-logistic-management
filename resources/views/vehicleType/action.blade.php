<form action="{{ route('vehicletype.destroy', $VehicleType->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group">
        <button type="submit" class="btn btn-default btn-xs" onclick="return confirm('Are you sure?')">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</form>