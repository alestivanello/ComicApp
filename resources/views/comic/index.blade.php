@extends('layouts.app')
@section('content')
    @foreach ($response['comics'] as $item)
        <div class="detail_page">
            <div class="image">
                <img src="{{ $item->image }}">
            </div>
            <div class="details">
                <button id="add-to-fav" data-comic="{{ $item->id }}" class="button button-primary"> Add to my favourites
                </button>
                <div class="title">
                    <h1>{{ $item->title }}</h1>
                </div>
                <div class="creators">
                    <ol>
                        <span> Creators </span>
                        @foreach ($item->creatorNames as $name)
                            <li>{{ $name }}</pli>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script defer>
        document.getElementById('add-to-fav').addEventListener('click', function() {
            const comicId = this.getAttribute('data-comic');
            const body = new URLSearchParams();
            body.append('id', comicId);

            fetch('{{ route('comic.markAsFavourite') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: body.toString()
                })
                .then(function(response) {
                    if (response.ok) {
                        console.log('Request succeeded:', response);
                        window.location.href = '{{ route('comic.seeFavs') }}';
                    } else {
                        console.log('Request failed:', response.status);
                        const errorModal = document.createElement('div');
                        errorModal.classList.add('error-modal'); 

                        const errorMessage = document.createElement('p');
                        errorMessage.textContent = 'Already added to favs!';
                        errorModal.appendChild(errorMessage);

                        const closeButton = document.createElement('button');
                        closeButton.classList.add('button'); 
                         closeButton.classList.add('button-primary');
                        closeButton.textContent = 'Ok';
                        closeButton.addEventListener('click', () => {
                            errorModal.remove();
                        });
                        errorModal.appendChild(closeButton);

                        document.body.appendChild(errorModal);

                    }
                })
                .catch(function(error) {
                    console.log('Error:', error);
                });
        });
    </script>
@endsection
