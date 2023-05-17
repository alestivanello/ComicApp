@extends('layouts.app')
@section('content')
    <div class="page-heading"> <span> {{ $response['title'] }}</span> </div>
    <div class="container__comics">
        @foreach ($response['comics'] as $item)
            <x-comic :comic="$item" />
        @endforeach
    </div>
    @if ($response['hasPagination'])
        <x-pagination :pagination="$response['pagination']" />
    @endif
@endsection
@section('scripts')
    <script defer>
        const items = document.getElementsByClassName('item');
        const next = document.getElementsByClassName('next');
        const back = document.getElementsByClassName('back');

        Array.from(items).forEach(function(item) {
            item.addEventListener('click', function() {
                const pageNumber = this.innerText;
                window.location.href = `?page=${pageNumber}`;
            });
        });

        Array.from(next).forEach(function(item) {
            item.addEventListener('click', function() {
                const activeElement = document.querySelector('.active.item');
                const pageNumber = activeElement.innerText;
                window.location.href = `?page=${Number(pageNumber) + 1}`;
            });
        });

        Array.from(back).forEach(function(item) {
            item.addEventListener('click', function() {
                const activeElement = document.querySelector('.active.item');
                const pageNumber = activeElement.innerText;
                window.location.href = `?page=${Number(pageNumber) - 1}`;
            });
        });
    </script>
@endsection
