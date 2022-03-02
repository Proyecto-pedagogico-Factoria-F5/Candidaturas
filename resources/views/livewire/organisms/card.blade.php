<div>
    <div class="card">
     
        <img src={{ image }} alt={{ name }}>
        <h1>{{ name }}</h1>

        @foreach ($infos as $info)
            <h2>{{ location }}</h2>
            <p>{{ description }}</p>   
        @endforeach

    </div>
</div>

