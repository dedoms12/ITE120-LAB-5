<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>
<body style="background-image: url('{{ asset('images/backgroundweather.png') }}');">
<div class="content-wthree">
    <h1>Weather Application</h1>

    <form method="GET" action="{{ url('/') }}">
        @csrf
        <label for="city">Enter City:</label>
        <input type="text" id="city" name="city" required>
        <button type="submit">Get Weather</button>
    </form>

    @if(isset($weatherData['main']))
    <p>City: {{ $weatherData['name'] }}</p>
    <p>Temperature: {{ number_format($weatherData['main']['temp'] - 273.15, 2) }} &#8451;</p>
    <p>Weather:
        @if(isset($weatherConditionCode))
        <i class="wi wi-owm-{{ $weatherConditionCode }}"></i>
        @else
        <i class="wi wi-na"></i>
        @endif
        {{ $weatherData['weather'][0]['description'] }}
    </p>
    @endif

</div>
</body>

</html>