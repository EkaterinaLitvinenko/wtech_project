<!DOCTYPE html>
<html lang="sk">
    <head>
        <x-headComponent/>
        @yield("head-content")
    </head>
    <body>
        @yield("body-content")

        <x-scripts />
        @yield("scripts-content")
    </body>
</html>