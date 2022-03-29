@foreach ($promos as $promo)
 
  <div class="card col-lg-4 col-md-6 col-xs-12">
    <a href="{{ url('/candidaturas') }}">
      <img class="card-img-top" src="{{ asset('storage').'/'.$promo->image }}" alt="{{ $promo->name }}">
      <div class="card-main">
        <h5 class="card-title">{{ $promo->nombre_promo }}</h2>
      </div>
      <div class="card-body"> 
        <h5 class="card-subtitle">{{ $promo->location }}</h5>
        <div class="card-description"> 
          <p class="card-text">{{ $promo->fecha_de_inicio }}</p>
          <p class="card-text">{{ $promo->duration }}</p>
        </div> 
      </div>
    </a>
  </div>

@endforeach  

