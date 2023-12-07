<form action="{{ 
    isset($employee) ?
    route('employees.update', $employee->id) : route('employees.store')
}}" method="POST">
    @csrf
    @isset($employee)
        @method('PUT')
    @endisset

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="{{ isset($employee) ? $employee->first_name : '' }}">
    </div>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="{{ isset($employee) ? $employee->last_name : '' }}">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ isset($employee) ? $employee->email : '' }}">
    </div>

    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ isset($employee) ? $employee->phone : '' }}">
    </div>

    <div>
        <label for="practice">Practice:</label>
        <select name="practice" id="practice">
            @foreach ($practices as $practice)
                <option value="{{ $practice->id }}" {{ isset($employee) && $employee->practice_id == $practice->id ? 'selected' : '' }}>
                    {{ $practice->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Submit</button>
</form>

@include('layouts.partials.errors')
