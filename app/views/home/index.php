<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MVC</title>
        <link rel="stylesheet" href="{{ ASSET_ROOT }}/css/global.css">
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="content">
            <header class="main">
                <h1>Bienvenido a la vista home/index</h1>
            </header>

            <p>El contenido inferior es el resultado de los parámetros recibidos desde la URL. Puedes enviar en el controlador y el modelo el nombre también.</p>

            <code>/home/index/[name]/[mood]</code>

            <p>{{ name }} es {{ mood }}</p>
        </div>
    </body>
</html>