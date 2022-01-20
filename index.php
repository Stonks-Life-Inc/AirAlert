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
    $latestData = file_get_contents('http://localhost:8080/AirAlert/airData');
    $latestData = json_decode($latestData);
    
    
    ?>
    <section class="main">
        <h1 class="titre_Page">Accueil</h1>
        <article id="site-introduction" class="container">
            <div class="text">
                <h2>Introduction</h2>
                <p>ipsum dolor sit amet consectetur adipisicing elit. Earum unde, dignissimos asperiores dicta excepturi velit eaque? Libero perferendis nihil delectus assumenda dolorum quis, explicabo inventore consequuntur officia impedit qui quae?</p>
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
                            <th class="tg-ugpb">Valeurs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tg-0lax">id</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->id; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Date de relevé</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->dateMesure; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">SO2</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->so2; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">NO2</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->no2; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">O3</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->o3; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Pm10</td>
                            <td class="tg-0lax"><?php echo $latestData[1]->pm10; ?></td>
                        </tr>
                        <?php
                            //Global test for results
                            $so2 = intval($latestData[1]->so2); 
                            $no2 = intval($latestData[1]->no2); 
                            $o3 = intval($latestData[1]->o3); 
                            $pm10 = intval($latestData[1]->pm10); 
                            $indexCalc = 0;
                            if($so2 >= 10){
                                $indexCalc++;
                            }
                            if($no2 >= 10){
                                $indexCalc++;
                            }
                            if($o3 >= 10){
                                $indexCalc++;
                            }
                            if($pm10 >= 10){
                                $indexCalc++;
                            }

                            if($indexCalc++ >= 2)
                            {
                                //TODO add result test for value below
                            }
                        ?>
                        <tr>
                            <td class="tg-0lax">Qualité global de l'air</td>
                            <td class="tg-0lax"></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Nos recommandations</td>
                            <td class="tg-0lax"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </section>

    <script src="" async defer></script>
</body>

</html>