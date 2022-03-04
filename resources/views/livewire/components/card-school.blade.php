
  @foreach ($schools as $school)
    <div class="cards-container">
      <div id="card">
        <img class="card-img-top" src="{{ asset('storage').'/'.$school->imagen }}" alt="{{ $school->name }}" />
        <h1 class="card-title">{{ $school->provincia }}</h1>
      </div>
    </div>
  @endforeach