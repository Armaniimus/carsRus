<!DOCTYPE html>
<html lang="nl" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{appdir}/view/css/grid-v1.3.1.css">
        <link rel="stylesheet" href="{appdir}/view/css/master.css">
    </head>
    <body>
        <header>
            <nav>
                <ul class="row nav">
                    <li class="float"><a href="{appdir}">Home</a></li>
                    <li class="float"><a href="{appdir}/main/browse">Browse</a></li>
                    <li class="float"><a href="{appdir}/main/toevoegen">Klant toevoegen</a></li>
                    <li class="float-r">
                        <form class="" action="{appdir}/main/zoek" method="post">
                            <input type="text" name="search" value="" placeholder="Zoek klant">
                            <input class="zoekKnop" type="submit" name="" value="Zoek">
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="row adresLine">
                <div class="bedrijfAdres col-s-8">
                    <p>Garage bedrijf Cars-R-us</p>
                    <p>Populierendreef 3</p>
                    <p>4334CE Houten</p>
                </div>

                <div class="col-s-4">
                    <h1>CarsRus</h1>
                </div>
            </div>
            {main}
        </main>
        <footer></footer>
        <script src="{appdir}/view/javascript/javaScript.js"></script>
    </body>
</html>
