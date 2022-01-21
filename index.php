<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media_qeuries.css">

    <title>AirAlert</title>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php
    require_once("includes/_header.php");

    //Call to API to retrieve all data on the server using getAll();
    $latestData = file_get_contents('http://localhost:8080/AirAlert/airData/');
    $latestData = json_decode($latestData);


    $id = $latestData[1]->id;
    $dateMesure = $latestData[1]->dateMesure;
    $so2 = intval($latestData[1]->so2); 
    $no2 = intval($latestData[1]->no2); 
    $o3 = intval($latestData[1]->o3); 
    $pm10 = intval($latestData[1]->pm10); 

    if(isset($_GET["datePicker"])){
        $dateToSearch = $_GET["datePicker"];
        if(file_get_contents("http://localhost:8080/AirAlert/airData/_search/?dateMesure=".$dateToSearch) !== null){
            
            $latestData = file_get_contents("http://localhost:8080/AirAlert/airData/_search/?dateMesure=".$dateToSearch);
            $latestData = json_decode($latestData);
            // var_dump($latestData);
            // echo $latestData;
            // echo gettype($latestData);
            $id = $latestData->id;
            $dateMesure = $latestData->dateMesure;
            $so2 = intval($latestData->so2); 
            $no2 = intval($latestData->no2); 
            $o3 = intval($latestData->o3); 
            $pm10 = intval($latestData->pm10); 
        }
    }
       

    $indexCalc = 0;
    if($so2 >= 350){
        $indexCalc++;
        $couleurSO2 = "red";
    }
    else {
        $couleurSO2 = "green";
    }
    if($no2 >= 240){
        $indexCalc++;
        $couleurNO2 = "red";
    }
    else {
        $couleurNO2 = "green";
    
    }
    if($o3 >= 120){
        $indexCalc++;
        $couleurO3 = "red";
    }
    else {
        $couleurO3 = "green";
    
    }
    if($pm10 >= 50){
        $indexCalc++;
        $couleurPM = "red";
    }
    else {
        $couleurPM = "green";
    
    }

    if ($indexCalc >= 1) {
        $escargot = "res/media/img/Escargot_Paslezgongue.png";
        $message = "Alors, comment te dire. Si tu respire dehors, tu es dead ça chacal :/ Cépadpo";
    }
    else {
        $escargot = "res/media/img/Escargot_lezgongue.png";
        $message = "C'est okay mon reuf, va t'éclater dans la cambrousse ! Je sais pas moi, saute dans un tas de feuilles mortes, fais du frisbee avec des amis. Trouve de bonnes activités !";
    }
    
    ?>
    <section class="main">
        <h1 class="titre_Page">Accueil</h1>
        <article id="site-introduction" class="container">
            <div class="text">
                <h2>Introduction</h2>
                <p>Une norme de qualité de l'air est une valeur quantitative prescrite concernant la qualité de l'air. Elle est définie par polluant, en fonction de la quantité et du type de ce polluant, en tenant compte d'autres paramètres physiques (température, humidité, pression...). Elle s'applique à l'air intérieur (public ou privé), à l'air du lieu de travail et/ou à l'air ambiant extérieur (l'air que chacun respire, pour lequel en France la Loi sur l'air du 30 décembre 1996 impose qu'il « ne nuise pas à la santé publique » — cf. immission —). Elle concerne aussi l'émission de certains rejets (émissions des industriels et autres émetteurs fixes — pollueurs réels ou potentiels —, émissions automobiles et autres émetteurs mobiles). La norme peut être définie par des acteurs internationaux, nationaux ou régionaux, et en premier lieu sous l'égide de l'Organisation des Nations unies avec l'Organisation mondiale de la santé qui a publié en 1987 des recommandations de qualité de l'air pour la santé, et des valeurs guides pour l'air ambiant dans le monde (Air quality guidelines ou AQGs). Sur des bases scientifiques ces normes ont été mises à jour en 2005 puis deux rapports OMS ont ensuite synthétisé les données nouvelles sur le sujet : le rapport REVIHAAP (2013) parallèle à la mise à jour des politiques de l’Union européenne sur la pollution de l'air ; puis un rapport de 2016 conforme aux engagements de l'OMS de réviser ses valeurs-guide probablement avant la fin-2020).</p>
            </div>
            <div class="video"><iframe id="videoYT" width="560" height="315" src="https://www.youtube.com/embed/IeMIPNsKWoY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe></div>
        </article>

        <article>
            <h2>Vos résultats</h2>
            <div class="tg-wrap">
                <table class="tg">
                    <thead>
                        <tr>
                            <th class="tg-ugpb">Champs</th>
                            <th class="tg-ugpb">Normes européennes (µg/m³)</th>
                            <th class="tg-ugpb">Valeurs (µg/m³)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tg-0lax">id</td>
                            <td class="tg-0lax">---</td>
                            <td class="tg-0lax"><?php echo $id ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Date de relevé</td>
                            <td class="tg-0lax">---</td>
                            <td class="tg-0lax"><?php echo $dateMesure ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">SO2</td>
                            <td class="tg-0lax">350</td>
                            <td class="tg-0lax" <?php echo "style = 'background-color : ".$couleurSO2."'" ?>><?php echo $so2; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">NO2</td>
                            <td class="tg-0lax">240</td>
                            <td class="tg-0lax" <?php echo "style = 'background-color : ".$couleurNO2."'" ?>><?php echo $no2; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">O3</td>
                            <td class="tg-0lax">120</td>
                            <td class="tg-0lax" <?php echo "style = 'background-color : ".$couleurO3."'" ?>><?php echo $o3; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Pm10</td>
                            <td class="tg-0lax">50</td>
                            <td class="tg-0lax"  <?php echo "style = 'background-color : ".$couleurPM."'" ?>><?php echo $pm10; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Qualité global de l'air</td>
                            <td class="tg-0lax" colspan="2">
                                <img
                                src=<?php echo $escargot ?> 
                                alt="Escargot paslezgongue si une valeur ou plus sont au dessus des normes. Sinon escargot lezgongue :)"
                                width="200px" >
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Nos recommandations</td>
                            <td class="tg-0lax" colspan="2">
                                <?php echo $message ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form id="recherche" name="recherche" maethod="GET" action="index.php">
                <label for="datePicker">Rechercher par date:</label><br/>
                <input type="date" name="datePicker" id="datePickerSearch" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"/><br/>
                <input type="submit" id="submitSearchForm"/>
            </form>
        </article>
    </section>

    <script src="" async defer></script>

    <div class="photos">
        <div class="Arthur">
            <img src="res/media/img/Arthur.jpg" alt="Arthur" width=200px>
        </div>
        <div class="Baba">
            <img src="res/media/img/Baba.jpg" alt="Baba" width=200px>
        </div>
        <div class="Clement">
            <img src="res/media/img/Clement.jpg" alt="Clement" width=200px>
        </div>
        <div class="Sami">
            <img src="res/media/img/Sami.jpg" alt="Sami" width=200px>
        </div>
    </div>
</body>

</html>