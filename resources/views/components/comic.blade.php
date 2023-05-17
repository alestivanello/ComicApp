<a href="/detail?id={{ $comic->id }}">
    <div class="card image-fit"
        style="--card-image: url('{{ $comic->image }}'); background-image: url('{{ $comic->image }}'); @if (!$comic->image) background-color: red; @endif">
        <span class="title"> {{ $comic->title }}</span>
    </div>
</a>
