<!DOCTYPE html>
<html>
    <head>
        <x-headComponent/>
        @yield("head-content")
    </head>
    <body>
        <x-navigation :loggedin="false"/>
        @yield("content")
        <x-footer />

        <x-scripts />
        @yield("scripts-content")
    </body>
</html>