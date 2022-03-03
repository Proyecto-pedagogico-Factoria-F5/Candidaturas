@foreach ($promos as $promo)
<div>
    <div id="card" class="card" style="width: 18rem;">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title">{{ $promo->location }}</h2>
        <p class="card-text">{{ $promo->date }}</p>
        <p class="card-text">{{ $promo->hours }}</p>
      </div>
      <div class="card-body">
        <h1 href="#" class="card-link">{{ $promo->name }}</h1>
      </div>
    </div>
</div>
@endforeach  