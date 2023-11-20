<form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group">

        <a href="{{ route('vehicle.show', $vehicle->id) }}" class="btn btn-default btn-xs">
            <i class="bi bi-eye"></i>
        </a>
        <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-default btn-xs">
            <i class="bi bi-pencil-fill"></i>
        </a>
        <button type="submit" class="btn btn-default btn-xs" onclick="return confirm('Are you sure?')">
            <i class="bi bi-trash"></i>
        </button>
    </div>
</form>