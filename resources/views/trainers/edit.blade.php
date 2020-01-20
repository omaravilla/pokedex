@extends ('layouts.app')

@section ('title', 'Trainer Edit')

@section ('content')

    <form method="POST" class="form-group" action="{{route('trainer.edit.submit', ['id' => $trainer->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('trainers.form', ['trainer' => $trainer])
        <button type="submit" class="btn btn-primary mt-2">
            Save
        </button>
    </form>

@endsection