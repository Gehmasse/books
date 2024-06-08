<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

            input, select, button {
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

            .books > form, .book > form, .book > div {
                display: flex;
                flex-direction: row;
                gap: 10px;
                flex-wrap: wrap;
                justify-content: center;
                border-radius: 10px;
            }

            .book > div > div {

            }
        </style>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
