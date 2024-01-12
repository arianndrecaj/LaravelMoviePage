@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Movie Seat Booking</title>
</head>

<body>
    <div class="movie-container">
        <label>Select a movie</label>
        <select id="movie">
            <option value="10">Avengers Endgame ($10)</option>
            <option value="12">Joker ($12)</option>
            <option value="8">Toy Story 4 ($8)</option>
            <option value="9">The Lion King ($9)</option>
        </select>
    </div>

    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>N/A</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Selected</small>
        </li>
        <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
        </li>
    </ul>

    <div class="container">
        <div class="screen"></div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
        </div>
    </div>

    <p class="text">
        You have selected <span id="count">0</span> seats for a price of $<span id="price">0</span>
    </p>

    <script src="script.js" type="text/javascript"></script>
</body>

</html>


@endsection
@section('scripts')
<script>
    const container = document.querySelector('.container');
    const seats = document.querySelectorAll('.row .seat:not(.occupied)');
    const count = document.getElementById('count');
    const price = document.getElementById('price');

    const movieSelect = document.getElementById('movie');
    let ticketPrice = +movieSelect.value;

    const populateUI = () => {
        const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

        if (selectedSeats !== null && selectedSeats.length > 0) {
            seats.forEach((seat, index) => {
                if (selectedSeats.indexOf(index) > -1) {
                    seat.classList.add('selected');
                }
            });
        }

        const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');
        const selectedMoviePrice = localStorage.getItem('selectedMoviePrice');

        if (selectedMovieIndex !== null) {
            movieSelect.selectedIndex = selectedMovieIndex;
        }

        if (selectedMoviePrice !== null) {
            count.innerText = selectedSeats.length;
            price.innerText = selectedSeats.length * +selectedMoviePrice;
        }
    };

    populateUI();

    selectedMovie = (movieIndex, moviePrice) => {
        localStorage.setItem('selectedMovieIndex', movieIndex);
        localStorage.setItem('selectedMoviePrice', moviePrice);
    };

    const updateSelectedSeatsCount = () => {
        const selectedSeats = document.querySelectorAll('.row .selected');

        const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));

        localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

        const selectedSeatsCount = selectedSeats.length;

        count.innerText = selectedSeatsCount;
        price.innerText = selectedSeatsCount * ticketPrice;
    };

    // Seat select event
    container.addEventListener('click', e => {
        if (
            e.target.classList.contains('seat') &&
            !e.target.classList.contains('occupied')
        ) {
            e.target.classList.toggle('selected');

            updateSelectedSeatsCount();
        }
    });

    // Movie select event
    movieSelect.addEventListener('change', e => {
        ticketPrice = +e.target.value;
        selectedMovie(e.target.selectedIndex, e.target.value);

        updateSelectedSeatsCount();
    });
</script>
@endsection