<div class="pagination">
    @if ($pagination['current'] !== 1)
        <div class="back arrow left">&lt;</div>
    @endif
    @for ($i = $pagination['current']; $i <= $pagination['pages_quantity']; $i++)
        @if ($i <= $pagination['current'] + 5)
            <a @if ($i == $pagination['current']) class="active item" @else class="item" @endif>
                {{ $i }}
            </a>
        @endif
    @endfor

    @if ($pagination['pages_quantity'] > 5)
        <div class="arrow right next">&gt;</div>
    @endif
</div>
