<?php 

$url = "https://restcountries.eu/rest/v2/";


//Receive data from api
 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, $url."all");
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $response = curl_exec($curl);

 if($e = curl_error($curl)){
    echo $e;
 }
 else{
    $data = json_decode($response);
}
 curl_close($curl);


//Create table
?>
<div class="container mt-4">
    <table id="example" class="table" style="width:100%">
        <thead class="bg-info">
            <th>Nombre</th>
            <th>Capital</th>
            <th>Región</th>
        </thead>
        <tbody>
        <?php foreach ($data as $country) {
            ?>
            <tr scope="row">
                <td>
                    <form action="pais.php" method="post">
                        <button type="submit" name="name" value="<?=$country->name?>" class="btn-link"><?= $country->name?></button>
                    </form>
                </td>
                <td><?= $country->capital?></td>
                <td><?= $country->region?></td>
                <?php
        }; ?>
        </tbody>
    </table>
</div>

