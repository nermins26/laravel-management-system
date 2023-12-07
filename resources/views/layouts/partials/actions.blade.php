<td>
    <a href="{{ route($route . '.show', $data->id) }}">View</a>
    <a href="{{ route($route . '.edit', $data->id) }}">Edit</a>
    <a href="{{ route($route . '.destroy', $data->id) }}"
       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->id }}').submit();">
        Delete
    </a>
    <form id="delete-form-{{ $data->id }}" action="{{ route($route . '.destroy', $data->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>
