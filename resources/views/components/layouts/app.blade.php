<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Books' }}</title>

        <style>
            :root {
                --dark: darkslategray;
                --bright: whitesmoke;
            }

            * {
                background-color: var(--dark);
                color: var(--bright);
            }

            .books {
                display: flex;
                flex-direction: column;
                gap: 20px;
                align-content: center;
            }

            .book {

            }

            .book > div {

            }

            input, select {
                padding: 5px;
                border: 1px var(--bright) solid;
                border-radius: 4px;
            }

            input[type="submit"] {
                background: var(--bright);
                color: var(--dark);
            }

            .books > form {
                border: 1px var(--bright) solid;
                padding: 20px;
            }

            .books > form, .book > form {
                display: flex;
                flex-direction: row;
                gap: 10px;
                flex-wrap: wrap;
                justify-content: center;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
