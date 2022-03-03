@foreach ($schools as $school)
<div>
    <div id="card" class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card">
        <h1 class="name">{{ $school->location }}</h1>
    </div>
</div>
@endforeach  