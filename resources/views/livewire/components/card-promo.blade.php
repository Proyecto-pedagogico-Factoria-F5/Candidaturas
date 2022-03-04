<div >
  @foreach ($promos as $promo)
  <div class="cards-container">
    <div id="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title">{{ $promo->ubicación }}</h2>
        <p class="card-text">{{ $promo->fecha_de_inicio }}</p>
        <p class="card-text">{{ $promo->duración }}</p>
      </div>
      <div class="card-body">
        <h1 href="#" class="card-link">{{ $promo->nombre_promo }}</h1>
      </div>
    </div>
  </div>
  @endforeach  
</div>

{{-- style="width: 18rem;" --}}