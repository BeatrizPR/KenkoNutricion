<!DOCTYPE html>
<html>

<head>
    <?php require_once 'Views/header.php';

        require_once './vendor/autoload.php';
    ?>
    <script src='<?php echo constant('URL'); ?>/public/js/ramdonFood.js'></script>
</head>

<body>
    <!-- --------MENU SUPERIOR--------- -->
    <?php
    session_start();

    if (isset($_SESSION['usr'])) :
        require_once "Views/navbarLogged.php";
    else :
        require_once "Views/navbar.php";
    endif;

    ?>
    <!--  -------TERMINA EL NAV--------  -->

    <!-- ----------HEADER  -PORTADA PRESENTACIÓN------------- -->

    <div class="jumbotron">
        <div class="container">
            <h1>Nutrición</h1>
            <p>Proyecto web sobre nutrición para mejorar la alimentación y vida saludable.</p>
        </div>
    </div>
    <header>

    </header>
    <!-- -------------MAIN--------------- -->
    <!--<div class="container"> -->
    <div class="container mx-auto">
        <main id="centerMain">

            <span class="clearfix"></span>

            <br>
            <!-------  METER AQUI UN BUSCADOR DE ALIMENTOSSS      ------>
            <br>
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2 class="titulo">¿No sabes que comer hoy?</h2><br />
                    <h6 id="foodShow" class="mx-auto d-block"></h6>
                    <br />
                </div>
                <div class=" mx-auto">
                    <div class="col">
                      	<img id="photo"  class="rounded mx-auto d-block randomImage" >
                        <br><br>
                        <button type="button" class="btn btn-outline-secundary mx-auto d-block" onclick="getRandomToEat()">Pulsa para tener una comida al azar</button>
                        <br>
                    </div>
                    <br>
                    <hr>
                    
                    <div class="col-lg-12 text-center">
                        <h3 class="titulo">Ejemplos de menus semanales</h3>
                    </div>
                    <p>Desayunos elegir entre los alimentos dados:</p>

                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr class="menuGreen">
                                <th scope="col"></th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miércoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                                <th scope="col">Sábado</th>
                                <th scope="col">Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Desayuno</th>
                                <td colspan="7">Café o Vaso de leche. Una fruta y 40 g. de pan o de cereales o galletas y jamón cocido o queso blanco.</td>
                            </tr>
                            <tr>
                                <th scope="row">Almuerzo</th>
                                <td>1ºBrócoli con calabaza y cebolla salteada<br> 2ºLomo de cerdo a la plancha con guarnición de arroz integral</td>
                                <td>1ºEnsalada de tomate y pepino con albahaca fresca<br>2ºConejo con ajo y perejil y patata panadera al horno </td>
                                <td>1ºMenestra de Verduras con patata hervida<br>2ºBacalao con perejil a la plancha</td>
                                <td>1ºEnsalada de espinacas con zanahoria, pimiento rojo y rábanos con pasta hervida<br>2ºAtún a la plancha con ajo y perejil  </td>
                                <td>1ºGuiso de pollo con patata cocida  y verdura  (tomate natura, zanahoria, cebolla, pimiento verde y calabacín)</td>
                                <td>1ºEnsalada de canónigos, pepino con tomate al horno con lentejas hervidas<br>2ºFilete de ternera a la plancha</td>
                                <td>1ºTallarines de calabacín con tomate y zanahoria<br>2ºPollo al horno con guarnición de garbanzos hervidos</td>
                            </tr>
                            <tr>
                                <th scope="row">Cena</th>
                                <td>Ensalada de kale con tomate cherry, aguacate, zanahoria huevo duro y queso fresco y pan tostado</td>
                                <td>1ºCalabacín y berenjena a la plancha<br>2ºSepia troceada a la plancha con ajo y limón con guarnición de cuscús hervido</td>
                                <td>Ensalada de brotes de lechuga¸ cebolla,  con 1 lata de atún y pavo en lonchas y espirales de pasta integrales hervidos </td>
                                <td>1ºCol de Bruselas con zanahoria al horno<br>2ºHuevo Frito con quínoa hervida</td>
                                <td>1ºEnsalada de patata con pimiento verde y tomate<br>2ºMerluza a la plancha con ajo y perejil</td>
                                <td>1ºChampiñones salteados con cebolla<br>2ºRevuelto de gambas con ajos tiernos y tostada de pan</td>
                                <td>Lenguado al horno con escalibada y guarnición de patata panadera con orégano</td>
                            </tr>
                            <tr>
                                <td colspan="8">*Desayuno, media mañana y merienda. Elegir alimentos </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="col-lg-12 text-center">
                        <h3 class="titulo">Menu vegetariano</h3>
                    </div>
                    <p>Desayunos elegir entre los alimentos dados:</p>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr class="menuGreen">
                                <th scope="col"></th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miércoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                                <th scope="col">Sábado</th>
                                <th scope="col">Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Desayuno</th>
                                <td colspan="7">Café o Vaso de leche. Una fruta y 40 g. de pan o de cereales o galletas y tofu o almendras.</td>
                            </tr>
                            <tr>
                                <th scope="row">Almuerzo</th>
                                <td>Ensalada verde con garbanzos (canónigos, garbanzos hervidos, ½ aguacate, espárragos blancos, queso fresco desnatado, zanahoria cruda, pimiento rojo y pipas de calabaza) aliñado con zumo de limón.<br> Y yogur desnatado.</td>
                                <td>Salteado de verduras (judías verdes, pimiento rojo, pimiento verde, setas shitake y cebolla) con tofu.<br>1 rebanada de pan integral<br>Kefir desnatado. </td>
                                <td>1º Crema de verduras (calabacín, puerro, calabaza y cebolla) con semillas de sésamo. <br>2ºHamburguesas de alubias y avena y yogur desnatado.</td>
                                <td>Ensalada de frutas (hojas de rúcula, ½ manzana, ¼  de mango, 1 tomate mediano, 3 nueces, 2 cucharas soperas de remolacha) con salsa de yogur. <br>Tempeh con salsa de tomate y 1 pieza de fruta.  </td>
                                <td>Lentejas con arroz y verduras (pimiento rojo, zanahoria y cebolla) con semillas de cáñamo.<br>Yogur Desnatado con 1 cucharada de postre de semillas de chía. </td>
                                <td>Ensalada de espinacas (espinacas, tomate, piñones, almendras, champiñones y queso fresco ) con cuscús y garbanzos hervidos aliñado con zumo de limón. <br>Y una pieza de fruta. </td>
                                <td>Brócoli  con zanahoria hervida. <br>Seitán salteado quínoa hervida con ajo y guindilla y yogur desnatado. </td>
                            </tr>
                            <tr>
                                <th scope="row">Cena</th>
                                <td>1ºEnsalada mixta (brotes de lechuga, 6 almendras, tomates, pepinillos y rábanos y pan tostado integral) con soja texturizada y albahaca.Para hacer la soja texturizada, primero debe hidratarse con agua o caldo. Utiliza de líquido 2,5 veces el peso de proteína de soja. Si es caliente se hidrata más rápido. Puedes añadir al líquido, salsa de soja o especias. Necesita 20-30 minutos para hidratar. Una vez hidratada, escurre el agua sobrante para utilizarla.Y una pieza de fruta</td>
                                <td>Escalibada (pimiento, cebolla y berenjena) <br>Tortilla (1 o 2 huevos) con espárragos trigueros<br>2 Rebanada de pan integral y Yogur desnatado. </td>
                                <td>Ensalada de patata y huevo (1 patata mediana hervida, 1 huevo duro, queso fresco 0%, tomate, pimiento verde y  rojo y avellanas) y 1 pieza de fruta. </td>
                                <td>Palitos de zanahoria al horno con hummus de remolacha y semillas de sésamo.<br>2 rebanadas de pan integral y yogur desnatado. <br> </td>
                                <td>Ensalada griega (pepino, 1 tomate grande, cebolla, 1 pimiento verde,  queso fresco 0%, y orégano). <br>Albóndigas vegetarianas y una pieza de fruta. </td>
                                <td>Sopa de miso y verduras. <br>Calabacín relleno con tofu al horno.<br>1 rebanada de pan integral y yogur desnatado </td>
                                <td>Alubias salteadas con berenjena y piñones  con pimentón dulce.<br>Tortilla (1 o 2 huevos) con ajos tiernos y una pieza de fruta. </td>
                            </tr>
                            <tr>
                                <td colspan="8">*Desayuno, media mañana y merienda. Elegir alimentos </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="col-lg-12 text-center">
                    <h3 class="titulo">Menu sin lactosa</h3>
                    </div>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr class="menuGreen">
                                <th scope="col"></th>
                                <th scope="col">Lunes</th>
                                <th scope="col">Martes</th>
                                <th scope="col">Miércoles</th>
                                <th scope="col">Jueves</th>
                                <th scope="col">Viernes</th>
                                <th scope="col">Sábado</th>
                                <th scope="col">Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Desayuno</th>
                                <td>Bebida de soja enriquecida en calcio y pan integral con rodajas de manzana y membrillo.</td>
                                <td>Yogur de soja enriquecido en calcio con pera, arándanos y copos de avena.</td>
                                <td>Zumo de naranja natural y pan integral y pasta de sésamo con miel.</td>
                                <td>Bebida de soja enriquecida en calcio y pan integral con tomate y aguacate.</td>
                                <td>Macedonia de plátano, kiwi, 100ml de zumo de naranja y copos de avena.</td>
                                <td>Zumo de naranja y pan integral con tomate y jamón serrano.</td>
                                <td>Bol de yogur de soja enriquecido en calcio con cereales integrales, almendras y trozos de pera.</td>
                            </tr>
                            <tr>
                                <th scope="row">Almuerzo</th>
                                <td>1ºLentejas con zanahoria, puerro, cebolla y patata.<br>2ºCalamar a la plancha y kiwi. </td>
                                <td>Macarrones con champiñones, carne picada, salsa de tomate y orégano.<br>Naranja</td>
                                <td>1ºPuré de acelgas (acelga, zanahoria, patata, aceite y sal). <br>2ºSalmón al papillote con manzana, aceite y sal y arroz salvaje.Mandarinas. </td>
                                <td>1ºEnsalada de tomate y dados de tofu y almendras.<br>2ºPollo guisado con zanahoria, champiñón y patata.Pera. </td>
                                <td>1ºGuisantes con cebolla y jamón.<br>2ºGarbanzos con espinacas y arroz.Yogur de soja. </td>
                                <td>1ºSopa de caldo (de carne y verduras), con fideos.<br>2ºPechuga de pavo con pisto de cebolla, pimiento rojo y verde y tomate. Macedonia de frutas. </td>
                                <td>1ºBerenjena, calabacín y alcachofas a la brasa.<br>2ºPaella de marisco. Macedonia de zumo de naranja, kiwi y granada.</td>
                            </tr>
                            <tr>
                                <th scope="row">Cena</th>
                                <td>1ºPuré de calabaza, calabacín, patata y aceite.<br>2ºTortilla de cebolla y yogur de soja. </td>
                                <td>1ºSopa de pescado con arroz.<br>2ºMerluza horno (con majado de ajo, limón, perejil y aceite).<br> Y nueces con miel.  </td>
                                <td>Menestra con patata y huevo duro.<br>Pan integral con tomate y anchoas.
                                <br>Frambuesas.</td>
                                <td>1ºPuré de calabaza.<br>2ºPescadilla hervida y patata. Servir con aceite y vinagre.Arándanos  </td>
                                <td>1ºEnsalada de endivias a la plancha y ventresca de atún.<br>2ºHuevo revuelto con ajetes y setas.Pan integral. Kiwi. </td>
                                <td>Ensalada de lechuga, tomate, pimiento, cebolla tierna, aguacate, nueces, lentejas, y maíz dulce. Yogur de soja. <br> </td>
                                <td>1ºEscalibada.<br>2ºChicharro al horno con tomate, patata y vino blanco. Manzana asada. </td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <br>

                    <a href="<?php echo constant('URL').'pdfgenerator'?>" target="_blanck"><button class="btn m-3">Descargar menus en pdf</button></a>

                   

                </div>
            </div>
            <br><br>
            <br>
        </main>

    </div>
    <?php require_once 'Views/footer.php'  ?>

</body>

</html>