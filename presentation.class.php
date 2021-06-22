<?php
include_once 'business.class.php';
class View
{
    public static function  start($title, $dir)
    {
        $html = "<!DOCTYPE html>
                <html lang = es>
                    <head>
                        <meta charset=\"utf-8\">
                        <meta name='viewport' content='width=device-width'>
                        <link rel=\"stylesheet\" type=\"text/css\" href=${dir}estilos.css>
                        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
                        <link name=Oswald href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
                        <link href='https://fonts.googleapis.com/css2?family=Indie+Flower&amp;display=swap' rel='stylesheet' type='text/css'>
                        <link href=\"https://fonts.googleapis.com/css2?family=Lato&amp;display=swap\" rel=\"stylesheet\">
                        <link rel=\"stylesheet\" href=\"${dir}estiloImpresora.css\" type='text/css' media=\"print\">
                        <title>$title</title>
                    </head>

                    <body>";
        User::session_start();
        echo $html;
    }

    public static function navigation()
    {
        echo '<nav>';
        echo '</nav>';
    }

    public static function end()
    {
        echo
        '</body>
                </html>';
    }
}
?>

<?php
class footer{
    public static function print(){
        echo "<div class='footer'>
            <footer class=\"footer\">
                <p>Author: Aleksander Borysov Ravelo, Kiliam David Martín García, Marco Nehuen Hernández Abba, César José Delgado Suárez
                </p>
                <p><a href=\"mailto:aleksander.borysov101@alu.ulpgc.es\">aleksander.borysov101@alu.ulpgc.es</a></p>
            </footer></div>";
    }
}
?>

<?php
class header
{
    public static function print($dir)
    {
        $titulo = "<div class=\"header\">
                <div class=\"titulo\">
                    <h1>Clínica <span class=\"titlecolor\">WebSalud</span></h1>
                    <img src=\"../img/equipo.jpg\" alt=\"Nuestro equipo\" id=\"equipo\">
                </div>";
        echo $titulo;

        $medio = "<div class=\"medio\">
                    <div class=\"medioSub1\">
                        <h2>Donde sí importas</h2>
                    </div>
                    <div class=\"medioSub2\">
                        ";
        echo $medio;
        if (isset($_SESSION['user'])) {
            echo "<a href='{$dir}login/logout.php' class='login'> <h4>Log out</h4></a>";
        } else {
            echo "<a href='{$dir}login/login.php' class='login'> <h4>Login</h4></a>";
        }

        

        if (isset($_SESSION['user'])) {
            echo "<a href='{$dir}panelUsuario/panelUsuario.php' class='panelUsuario'> <h4>Panel personal</h4></a>";
            echo "<a href=\"{$dir}index.php\" class=\"volver\"> <h4>Volver</h4> </a></div></div></div>";
        } else {
            echo "<a href=\"{$dir}index.php\" class=\"volver\"> <h4>Volver</h4> </a></div></div></div>";
        }
    }
}
