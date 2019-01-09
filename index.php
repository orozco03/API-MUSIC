<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link href="style.css">
    <title>MUSIC API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<center><h1>&#9836 API MUSIC &#9836</h1></center><br>

<?php
    
    $inicio = "http://ws.audioscrobbler.com/2.0/?method=tag.gettopartists&tag=disco&api_key=9c3a5715ea0419dea0015d769ba1e254&format=json&limit=9&page=";
    
    if (is_null($_GET["url"])) {
        $urlaux = "1";
    } else {
        $urlaux = $_GET["url"];
    }
    
    $url = $inicio . $urlaux;
    $json = file_get_contents($url);
    $json1 = json_decode($json, true);
    $results = $json1 ["topartists"]["artist"];
    //var_dump ($urlaux);

    foreach ($results as $item) {
           $i=0;
           $name = $item["name"];
           $url = $item["url"];
           $image = $item["image"][3]["#text"];
    ?>


  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $image ?>" alt="image">
        </div>
        <div class="card-content">
        <center><b>Nombre: <?php echo $name ?></b></center>	
         <center><i class="em em-point_right"></i> <a href="<?php echo $url ?>">Perfil</a> <i class="em em-point_left"></i></center></div>
        </div>
      </div>
    </div>
  </div><br>   

<?php }  ?>
 
   <center><div class="pagination">
       <ul>
           <li><a href="http://localhost:8888/API2/?url=<?php echo ($urlaux - 1)?>">Anterior</a></li>
           <li><a href="http://localhost:8888/API2/?url=2">2</a></li>
           <li><a href="http://localhost:8888/API2/?url=3">3</a></li>
           <li><a href="http://localhost:8888/API2/?url=4">4</a></li>
           <li><a href="http://localhost:8888/API2/?url=5">5</a></li>
           <li><a href="http://localhost:8888/API2/?url=6">6</a></li>
           <li><a href="http://localhost:8888/API2/?url=7">7</a></li>
           <li><a href="http://localhost:8888/API2/?url=8">8</a></li>
           <li><a href="http://localhost:8888/API2/?url=9">9....</a></li>
           <li><a href="http://localhost:8888/API2/?url=<?php echo ($urlaux + 1)?>">Siguiente</a></li>
       </ul>
   </div>  </center>     
</body>
</html>