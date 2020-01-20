@extends ('layouts.app')

@section ('title', 'Trainers')

@section ('content')
    @include('common.success')
    <div class="row">
        @foreach($trainers as $trainer)
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                    <div class="card-body">
                    <img style="height: 150px; object-fit:cover; width: 150px; background-color:#EFEFEF; margin: 20px;", class="card-img-top rounded-circle mx-auto d-block" src="images/{{$trainer->avatar}}" alt="">
                        <h5 class="card-title">{{$trainer->name}}</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a href="{{route('trainers.show', ['id' => $trainer->id, 'slug' => $trainer->slug])}}" class="btn btn-primary">
                            Learn more
                        </a>
                    </div>
                </div>                
            </div>
        @endforeach
    </div>

@endsection