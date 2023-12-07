<form action="{{ 
    isset($fieldOfPractice) ?
    route('fields-of-practice.update', $fieldOfPractice->id) : route('fields-of-practice.store')
}}" method="POST">
    @csrf
    @if(isset($fieldOfPractice))
        @method('put')
    @endif

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ isset($fieldOfPractice) ? $fieldOfPractice->name : '' }}">
    </div>

    <button type="submit">Submit</button>
</form>

@include('layouts.partials.errors')
