@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-7 p-3">
            @if (Str::contains($dish->photo, 'upload'))
                <img id="dish_img" src="{{ asset('storage/' .$dish->photo)}}" class="card-img-top rounded" alt="...">
            @else
                <img id="dish_img" src="{{$dish->photo}}" alt="">
            @endif
        </div>
        <div class="col-5">
            <div>
                <h2 class="fs-1 fw-bold text-white pb-4">{{$dish->name}}</h2>
            </div>
            <div>
                <div class="fs-6 py-3">
                    <h4>Descrizione</h4>
                    <p class="fst-italic">{{$dish->description}}</p>
                </div>
                <div class="fs-6 py-3">
                    <h4>Ingredienti</h4>
                    <p class="fst-italic">{{$dish->ingredients}}</p>
                </div>
                <div class="fs-6 py-3">
                    <h4>Prezzo</h4>
                    <p class="fst-italic">€{{$dish->price}}</p>
                </div>
                <div id="azioni">
                        <a href="{{route('admin.dishes.edit', $dish)}}"
                            class="mx-1 btn btn-warning text-decoration-none actions">
                            <span><i class="fa-solid fa-pencil"></i> Modifica</span>
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger actions" data-bs-toggle="modal"
                            data-bs-target="#modal{{$dish->slug}}">
                            <i class="fa-solid fa-trash-can"></i> Elimina
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$dish->slug}}" tabindex="-1"
                            aria-labelledby="modalTitle-{{$dish->slug}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sicuro di voler eliminare dal menù
                                        "<strong>{{$dish->name}}</strong>"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{route('admin.dishes.destroy', $dish->slug)}}" method="post"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Cancella</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal -->
            </div>
            </div>
        </div>
    </div>
</div>
@endsection