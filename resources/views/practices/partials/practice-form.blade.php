<form action="{{ 
    isset($practice) ?
    route('practices.update', $practice->id) : route('practices.store')
}}" method="POST" enctype="multipart/form-data">
    @csrf
    @isset($practice)
        @method('PUT')
    @endisset

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $practice->name ?? '' }}">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $practice->email ?? '' }}">
    </div>

    <div>
        <label for="fields_of_practice">Fields of Practice:</label>
        <select name="fields_of_practice[]" id="fields_of_practice" multiple>
            @foreach($fieldsOfPractice as $fieldOfPractice)
                <option value="{{ $fieldOfPractice->id }}"
                    @isset($practice)
                        @if(in_array($fieldOfPractice->id, $practice->fieldsOfPractice->pluck('id')->toArray())) 
                            selected 
                        @endif
                    @endisset
                >{{ $fieldOfPractice->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="website_url">Website URL:</label>
        <input type="text" name="website_url" id="website_url" value="{{ $practice->website_url ?? '' }}">
    </div>

    <div>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        @isset($practice->images)
            <img src="{{ $practice->images->first()->url }}" alt="Current Image" style="width: 100px; height: auto;">
        @endisset
    </div>

    <button type="submit">Submit</button>
</form>

@include('layouts.partials.errors')