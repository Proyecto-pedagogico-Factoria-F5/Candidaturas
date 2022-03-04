@foreach ($schools as $school)
<div class="card col-lg-4 col-md-6 col-xs-12">
  <img class="card-img-top" src="{{ asset('storage').'/'.$school->imagen }}" alt="{{ $school->name }}" />
  <div class="card-body">
    <h5 class="card-title">{{ $school->provincia }}</h5>
  </div>
</div>
@endforeach