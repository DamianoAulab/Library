<x-main>
    <x-slot name="title">Presto.it | Categorie</x-slot>

    <div class="col-12">
        <div class="row">
 @forelse ($category->announcements as $announcement)
     <div class="col-12 col-md-4 my-2">
        <div class="card shadow" style="width: 18rem">
        <img src="https://unsplash.it/500" class="card-img-top p-3 rounded" alt="">
        <div class="card-body">
            <h5 class="card-title">{{$announcement->title}}</h5>
            <p class="card-text">{{$announcement->body}}</p>
            <a href="" class="btn btn-primary shadow">Visualizza</a>
            <p class="card-footer my-2">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>        
        </div>
     </div>
</div>
 @empty
 <div class="col-12">
    <p> non sono presenti annunci</p>
    <p> pucclicane uno: <a href="{{route('announcements.create')}}" class="btn btn-success shadow">Nuovo Annuncio</a></p>
 </div>
     
 @endforelse
        </div>
    </div>
   
</x-main>