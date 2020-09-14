<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicio</title>
    <link rel="manifest" href="/manifest.json"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" >
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    
</head>
<body>

@auth
<div id="app" >
        <v-app>
            
        </v-app>
    </div>
    @endauth
    @if(auth()->guest())
    <div id="login" >
        <v-app>
            
        </v-app>
    </div>
    @endif
</body>

<script src="{{ mix('js/app.js') }}"></script>
</html>