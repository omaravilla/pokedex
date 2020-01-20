@extends ('layouts.app')

@section ('title', 'Trainers Create')

@section ('content')
    @include('common.errors')
    @include('common.success')

    <form method="POST" class="form-group" enctype="multipart/form-data">
        @csrf
        @include('trainers.form')
        <button type="submit" class="btn btn-primary mt-2">
            Save
        </button>
    </form>

@endsection