<div>
  @foreach ($schools as $school)
    <div id="card" class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card">
      <h1 class="name">{{ $school->provincia }}</h1>
    </div>
  @endforeach  
</div>