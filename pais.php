<?php
include 'header.php';
//include 'db_connect.php';

$url = "https://restcountries.eu/rest/v2/";
$name = $_POST["name"];


//Receive data from api
 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, $url."name/".$name);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($curl);

 if($e = curl_error($curl)){
    echo $e;
 }
 else{
    $data = json_decode($response);
 }
 curl_close($curl);

//Display data

foreach ($data as $country) {
?>

<div class="card border border-info shadow-0" style="margin-top: 25vh; 
    padding: 3em;">
   <div class="row no-gutters">
      <div class="col-md-4 offset-md-1">
         <h3 class="card-header"><?= $country->name; ?> </h3>
         <img src="<?= $country->flag ?>" class="card-img">
      </div>
      <div class="col-md-4 offset-md-1" style="border-left: 1px solid #39C0ED;">
         <div class="card-body">
            <div class="card-subtitle mb-2 text-muted"><i><?= $country->region . ", " . $country->subregion;?></i></div>
            <p class="card-text"> Capital: <?= $country->capital; ?></p>
            <div class="card-text">Idioma oficial: <?=($country->languages)[0]->nativeName;?></div>
            <div class="card-text">Población: <?php $population = $country->population;
            $population_format = number_format($population, 0, ',', '.');
            echo($population_format);?> habitantes</div>
            <div class="card-text">Zona horaria: <?=$country->timezones[0]?></div>
            <div class="card-text">Moneda: <?=($country->currencies)[0]->name?> (<?=($country->currencies)[0]->symbol?>)</div>
            <div class="card-text">Ubicación: latitud: <?=$country->latlng[0]?>, longitud: <?=$country->latlng[1]?></div>
            <div class="card-text">Extensión: <?php $area = $country->area;
               $area_format = number_format($area, 0, ',', '.');
               echo($area_format);?> km2</div>
            <div class="cart-text">Código de area: <?=$country->callingCodes[0]?></div>
            <div class="cart-text">Dominio en la web: <?=$country->topLevelDomain[0]?></div>
            <a href="https://en.wikipedia.org/wiki/<?=$country->name?>" type="button" class="btn btn-dark" target="_blank">Ver en wikipedia</a>
         </div>
      </div>
   </div>
</div>

<?php       
//Insert this country's numeric code into a database
                        
 $num_code = $country->numericCode;
 }
 //$sql = "INSERT INTO web_consumos_precios (pais, fechaclick) VALUES ($num_code, NOW())";
 $rs = mysqli_query($link, $sql);
 mysqli_close($link);?> 

 
<?php
                        
//footer
include 'footer.php';