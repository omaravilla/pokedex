@extends ('layouts.app')

@section ('title', 'Trainer')

@section ('content')
    @include('common.success')

    <img style="height: 300px; object-fit:Cover; width: 300px; background-color:#EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
    <div class="text-center">
        <h4 class="card-title">{{$trainer->name}}</h4>
        <p>
            Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
        </p>
        <a href="{{route('trainer.edit', ['id' => $trainer->id, 'slug' => $trainer->slug])}}" class="btn btn-primary">
            Edit
        </a>
        <form method="DELETE" class="form-group" action="{{route('trainer.destroy', ['id' => $trainer->id])}}" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger mt-2">
                Delete trainer
            </button>
        </form>
    </div>
    <modal-button></modal-button>
    <create-form-pokemon></create-form-pokemon>
@endsection
