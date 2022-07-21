<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema Web Scrapper PMG</title>
     <link rel="icon" type="image/x-icon" href="images/prefeitura.jpg">
  </head>

<style media="screen">
  .cv6{
      position: fixed;
      font-family: "Times New Roman", Times, serif;
      font-size: large;
      margin-left: 50%;
      top: 19px;
      width: 16vw;
      height: 65px;
      justify-content: center;
      text-align: center;
      word-wrap: break-word;
      background-image: url(images/back.jpg);
      box-shadow: 2px 2px 2px rgba(0,0,0,0.4);

  }


</style>

<?php session_start();

if (!isset($_SERVER['PHP_AUTH_USER'])&& !isset($_SERVER['PHP_AUTH_PW'])) {
  $page = 'http://localhost/projeto/index.php';
 $sec = "1";
 header("Refresh: $sec; url=$page");
 exit();
}
if (!$_COOKIE['maria']&&!$_COOKIE['luciana']&&!$_COOKIE['antonio']&&!$_COOKIE['marcio']&&!$_COOKIE['rabelo']&&!$_COOKIE['olga']
&&!$_COOKIE['adm']&&!$_COOKIE['graca']&&!$_COOKIE['anderson']&&!$_COOKIE['altope']&&!$_COOKIE['olx']&&!$_COOKIE['zap']&&!$_COOKIE['viva']) {
?>

<link rel="stylesheet" href="check50.css">
<body>
  <div class="login">
    <h2>Bem vindo: <?php echo $_SERVER['PHP_AUTH_USER']?></h2>
  </div>
<div class="container">
  <form  action="web.php" method="post">
<fieldset>
   <legend><strong><h3>Personalize seu Web Scrapping:</h3></strong></legend>

    <div>
      <input type="checkbox" id="maria" name="escolha" value="maria" >
      <label for="maria">Maria Corretora</label>
    </div>

    <div>
      <input type="checkbox" id="olga" name="escolha2" value="olga" >
      <label for="olga">Olga Corretora</label>
    </div>

    <div>
      <input type="checkbox" id="anto" name="escolha3" value="antonio">
      <label for="anto">Antônio Miranda Imóveis</label>
    </div>

    <div>
      <input type="checkbox" id="luce" name="escolha4" value="luciana">
      <label for="luce">Luciana Corretora</label>
    </div>

    <div>
      <input type="checkbox" id="marcio" name="escolha5" value="marcio">
      <label for="marcio">Marcio Corretor</label>
    </div>

    <div>
      <input type="checkbox" id="rabelo" name="escolha6" value="rabelo">
      <label for="rabelo">Rabelo Imóveis</label>
    </div>

    <div>
      <input type="checkbox" id="adm" name="escolha7" value="adm">
      <label for="adm">ADM Imóveis</label>
    </div>

    <div>
      <input type="checkbox" id="graca" name="escolha8" value="graca">
      <label for="graca">Graça medeiros</label>
    </div>

    <div>
      <input type="checkbox" id="anderson" name="escolha9" value="anderson">
      <label for="anderson">Anderson Corretor</label>
    </div>

    <div>
      <input type="checkbox" id="altope" name="escolha10" value="altope">
      <label for="altope">Alto padrão Imóveis</label>
    </div>

    <div>
      <input type="checkbox" id="olx" name="escolha11" value="olx">
      <label for="olx">Olx</label>
    </div>

    <div>
      <input type="checkbox" id="zap" name="escolha12" value="zap">
      <label for="zap">Zap Imóveis</label>
    </div>

    <div>
      <input type="checkbox" id="viva" name="escolha13" value="viva">
      <label for="viva">Viva Real</label>
    </div>



    <div align="right">
    <input  class="butao" type="submit" name="entrar" value="entrar">
    </div>




  </form>
  <a class="logout" href="logout.php">Logout</a>

</fieldset>
</div>
</body>


<?php
if ($_POST['entrar']) {
  $maria = $_POST['escolha'];
  $olga = $_POST['escolha2'];
  $luciana = $_POST['escolha4'];
  $antonio = $_POST['escolha3'];
  $marcio = $_POST['escolha5'];
  $rabelo = $_POST['escolha6'];
  $adm = $_POST['escolha7'];
  $graca = $_POST['escolha8'];
  $anderson = $_POST['escolha9'];
  $altope = $_POST['escolha10'];
  $olx = $_POST['escolha11'];
  $zap = $_POST['escolha12'];
  $viva = $_POST['escolha13'];



  $cookieExpire = time()+(60*60*24);
    $cookiePath = "/";
      setcookie("maria",$maria, $cookieExpire, $cookiePath);
      setcookie("olga",$olga, $cookieExpire, $cookiePath);
      setcookie("luciana",$luciana, $cookieExpire, $cookiePath);
      setcookie("antonio",$antonio, $cookieExpire, $cookiePath);
      setcookie("marcio",$marcio, $cookieExpire, $cookiePath);
      setcookie("rabelo",$rabelo, $cookieExpire, $cookiePath);
      setcookie("adm",$adm, $cookieExpire, $cookiePath);
      setcookie("graca",$graca, $cookieExpire, $cookiePath);
      setcookie("anderson",$anderson, $cookieExpire, $cookiePath);
      setcookie("altope",$altope, $cookieExpire, $cookiePath);
      setcookie("olx",$olx, $cookieExpire, $cookiePath);
      setcookie("zap",$zap, $cookieExpire, $cookiePath);
      setcookie("viva",$viva, $cookieExpire, $cookiePath);








      $page = 'http://localhost/projeto/web.php';

      $sec = "1";
      header("Refresh: $sec; url=$page");

    } return; }?>
<link rel="stylesheet" href="front1022.css">

<body>
  <div class="sidenav">

    <form class="" action="web.php" method="post">

<main class="container-right">

<label for="select">Sub-filtros:</label>

<select id= "select"name="select1">
         <option value="casa">Casa</option>
         <option value="area">Área</option>
         <option value="bangalo">Bangalô</option>
         <option value="flat">Flat</option>
         <option value="terreno">Terreno</option>
         <option value="chacara">Chácara</option>
         <option value="fazenda">Fazenda</option>
         <option value="apartamento">Apartamento</option>
         <option value="sitio">Sítio</option>
         <option value="chale">Chalê</option>

     </select>


  <input type="submit" name="pesquisar" value="Pesquisar">

</main>

</form>

<form class="" action="web.php" method="post">

  <div class="container">

  <input type="checkbox" name="aluguel" value="2" id='aluguel'>
  <label for="aluguel">Modalidade: Aluguel</label>
  <input type="submit" name="aluguelst" value="Pesquisar">
</div>

<?php if ($_COOKIE['aluguel']) {
  echo "Vizualizando Aluguéis!";
}else {
  echo "Vizualizando Vendas!";
}?>

<div class="container">



<label  for="comeco">Retornar todas páginas</label>

<input  id="comeco" type="submit" name="comeco" value="Começo">

</div>
<main class="container-right">


<main class="container-right">

<label for="retornar">Refiltre seu Scrapper</label>

<input id="retornar" type="submit" name="retornar" value="Retornar">
</form>

<a class="logout" href="logout.php">Logout</a>
</main>
  </div>
  <?php
  if ($_COOKIE['filtro']) {
    ?>
     <div class='cv6'>
       <h4>Você Filtrou: <?php echo $_COOKIE['filtro'] ?></h4>
     </div>

<?php
}

if ($_POST['aluguelst']) {
  $aluguel = $_POST['aluguel'];
  $cookieExpire = time()+(60*60*24);
  $cookiePath = "/";

  setcookie("aluguel",$aluguel, $cookieExpire, $cookiePath);

 $page = 'http://localhost/projeto/web.php';
 header("Location:$page");
}
  $url = "http://localhost/projeto/api/api.php?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJuYW1lIjoiZGRmY2RmZGQwYWJiNzRkMjE0MDc2NDE1MzY1NWI3ZjUifQ.4VEOq1Fqu_SUgq9JEkyrENBZu0-PMtB_lgc7BqrmovA&menu=post";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  $pagina02 = isset($_COOKIE['pagina02']) ? $_COOKIE['pagina02'] : '1';
  $pagina03 = isset($_COOKIE['pagina03']) ? $_COOKIE['pagina03'] : '1';
  $pagina04 = isset($_COOKIE['pagina04']) ? $_COOKIE['pagina04'] : '1';
  $pagina05 = isset($_COOKIE['pagina05']) ? $_COOKIE['pagina05'] : '1';
  $pagina06 = isset($_COOKIE['pagina06']) ? $_COOKIE['pagina06'] : '1';
  $pagina = isset($_COOKIE['pagina']) ? $_COOKIE['pagina'] : '1';
  $pagina07 = isset($_COOKIE['pagina07']) ? $_COOKIE['pagina07'] : '1';
  $pagina08 = isset($_COOKIE['pagina08']) ? $_COOKIE['pagina08'] : '1';
  $pagina09 = isset($_COOKIE['pagina09']) ? $_COOKIE['pagina09'] : '1';
  $pagina10 = isset($_COOKIE['pagina10']) ? $_COOKIE['pagina10'] : '1';
  $pagina11 = isset($_COOKIE['pagina11']) ? $_COOKIE['pagina11'] : '1';
  $pagina12 = isset($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';
  $pagina13 = isset($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';









  $mariacookie = isset($_COOKIE['maria']) ? $_COOKIE['maria'] : null;
  $olgacookie = isset($_COOKIE['olga']) ? $_COOKIE['olga'] : null;
  $lucianacookie = isset($_COOKIE['luciana']) ? $_COOKIE['luciana'] : null;
  $antoniocookie = isset($_COOKIE['antonio']) ? $_COOKIE['antonio'] : null;
  $marciocookie = isset($_COOKIE['marcio']) ? $_COOKIE['marcio'] : null;
  $rabelocookie = isset($_COOKIE['rabelo']) ? $_COOKIE['rabelo'] : null;
  $admcookie = isset($_COOKIE['adm']) ? $_COOKIE['adm'] : null;
  $gracacookie = isset($_COOKIE['graca']) ? $_COOKIE['graca'] : null;
  $andersoncookie = isset($_COOKIE['anderson']) ? $_COOKIE['anderson'] : null;
  $altopecookie = isset($_COOKIE['altope']) ? $_COOKIE['altope'] : null;
  $olxcookie = isset($_COOKIE['olx']) ? $_COOKIE['olx'] : null;
  $zapcookie = isset($_COOKIE['zap']) ? $_COOKIE['zap'] : null;
  $vivacookie = isset($_COOKIE['viva']) ? $_COOKIE['viva'] : null;
  $cookieget = isset($_COOKIE['filtro']) ? $_COOKIE['filtro'] : null;

  $cookiealuguel = isset($_COOKIE['aluguel']) ? $_COOKIE['aluguel'] : null;




  curl_setopt($curl, CURLOPT_COOKIE, "pagina02=$pagina02; pagina03=$pagina03; pagina04=$pagina04; pagina06=$pagina06; pagina05=$pagina05; pagina=$pagina; maria=$mariacookie; olga=$olgacookie; luciana=$lucianacookie; antonio=$antoniocookie; marcio=$marciocookie; rabelo=$rabelocookie; adm=$admcookie; pagina07=$pagina07; graca=$gracacookie; pagina08=$pagina08; anderson=$andersoncookie; pagina09=$pagina09; altope=$altopecookie; pagina10=$pagina10; olx=$olxcookie; pagina11=$pagina11; zap=$zapcookie; pagina12=$pagina12; viva=$vivacookie; pagina13=$pagina13; filtro=$cookieget; aluguel=$cookiealuguel");

  
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $resp = json_decode(curl_exec($curl), true);
  curl_close($curl);

  foreach ($resp as $key) {
    $title = $key['title'];
    $dec = $key['decri'];
    $price = $key['price'];
    $uf = $key['uf'];
    $page1 = $key['paget'];
    $url = $key['url'];
    $lucimg = $key['lucimg'];
    $luctitle = $key['lucititle'];
    $lucdecri = $key['lucidecri'];
    $ludref = $key['ludref'];
    $ludeprice = $key['ludeprice'];
    $ludepage = $key['ludepage'];
    $antoimg = $key['antoimg'];
    $antodecri = $key['antodecri'];
    $txtanto = $key['txtanto'];
    $antopage = $key['antopage'];
    $antoinfo = $key['antoinfo'];
    $mariainfo = $key['mariainfo'];
    $ludeinfo = $key['ludeinfo'];
    $marciotitle = $key['marciotitle'];
    $marciodec = $key['marciodec'];
    $marcioprice = $key['marcioprice'];
    $marciouf = $key['marciouf'];
    $marciospan = $key['marciospan'];
    $marcioimg = $key['marcioimg'];
    $marcioinfo = $key['marcioinfo'];
    $rabelopage = $key['rabelopage'];
    $rabeloimg = $key['rabeloimg'];
    $rabeloprice = $key['rabeloprice'];
    $rabelourl = $key['rabelourl'];
    $rabelodecri = $key['rabelodecri'];
    $rabeloinfo = $key['rabeloinfo'];
    $y = $key['intem'];
    $x = $key['nomes'];
    $k = $key ['tipos'];
    $d = $key ['dec'];
    $p = $key ['page'];
    $c = $key ['cod'];
    $url2 = $key['olga'];
    $olgainfo = $key['olgainfo'];
    $admtipo = $key['admtipo'];
    $admimg = $key['admimg'];
    $admlocal = $key['admlocal'];
    $admtitle = $key['admtitle'];
    $admprice = $key['admprice'];
    $admurl = $key['admurl'];
    $pageadm = $key['pageadm'];
    $pagegraca = $key['pagegraca'];
    $gracaprice = $key['gracaprice'];
    $gracadec = $key['gracainfo'];
    $gracabeds = $key['gracabeds'];
    $gracaquart = $key['gracaquartos'];
    $gracatitle = $key['gracatitle'];
    $gracaimg = $key['gracaimg'];
    $gracaurl = $key['gracaurl'];
    $andersonimg = $key['andersonimg'];
    $andersoninfo = $key['andersoninfo'];
    $andersonprice = $key['andersonprice'];
    $urlanderson = $key['urlanderson'];
    $andersontipo = $key['andersontipo'];
    $imgaltope = $key['imgaltope'];
    $altopeuf = $key['altopeuf'];
    $altopeprice = $key['altopeprice'];
    $altopetitle = $key['altopetitle'];
    $altopeurl= $key['altopeurl'];
    $altopage = $key['altopage'];
    $olxurl =$key['olxurl'];
    $olxlocal = $key['olxlocal'];
    $olxinfo = $key['olxinfo'];
    $olxprice = $key['olxprice'];
    $olximg = $key['olximg'];
    $olxpage = $key['olxpage'];
    $zapmetros = $key['zapmetros'];
    $zapbairros = $key['zapbairros'];
    $zaprice = $key['zaprice'];
    $zapinfo = $key['zapinfo'];
    $zapsaida = $key['zapsaida'];
    $vivarua = $key['vivarua'];
    $vivaurl = $key['vivaurl'];
    $vivaprice = $key['vivaprice'];
    $vivainfo = $key['vivainfo'];
    $vivaresu = $key['vivaresu'];
  }

  if ($_POST['retornar']) {
      $cookiePath = "/";
      setcookie("maria","", time()-3600, $cookiePath);
      setcookie("olga","", time()-3600, $cookiePath);
      setcookie("luciana","", time()-3600, $cookiePath);
      setcookie("antonio","", time()-3600, $cookiePath);
      setcookie("marcio","", time()-3600, $cookiePath);
      setcookie("rabelo","", time()-3600, $cookiePath);
      setcookie("adm","", time()-3600, $cookiePath);
      setcookie("graca","", time()-3600, $cookiePath);
      setcookie("anderson","", time()-3600, $cookiePath);
      setcookie("altope","", time()-3600, $cookiePath);
      setcookie("olx","", time()-3600, $cookiePath);
      setcookie("zap","", time()-3600, $cookiePath);
      setcookie("viva","", time()-3600, $cookiePath);











      unset($_COOKIE['maria']);
      unset($_COOKIE['olga']);
      unset($_COOKIE['luciana']);
      unset($_COOKIE['antonio']);
      unset($_COOKIE['marcio']);
      unset($_COOKIE['rabelo']);
      unset($_COOKIE['adm']);
      unset($_COOKIE['graca']);
      unset($_COOKIE['anderson']);
      unset($_COOKIE['altope']);
      unset($_COOKIE['olx']);
      unset($_COOKIE['zap']);
      unset($_COOKIE['viva']);











      setcookie("pagina","", time()-3600, $cookiePath);
      setcookie("pagina02","", time()-3600, $cookiePath);
      setcookie("pagina03","", time()-3600, $cookiePath);
      setcookie("pagina04","", time()-3600, $cookiePath);
      setcookie("pagina05","", time()-3600, $cookiePath);
      setcookie("pagina06","", time()-3600, $cookiePath);
      setcookie("pagina07","", time()-3600, $cookiePath);
      setcookie("pagina08","", time()-3600, $cookiePath);
      setcookie("pagina09","", time()-3600, $cookiePath);
      setcookie("pagina10","", time()-3600, $cookiePath);
      setcookie("pagina11","", time()-3600, $cookiePath);
      setcookie("pagina12","", time()-3600, $cookiePath);
      setcookie("pagina13","", time()-3600, $cookiePath);
      setcookie("aluguel","", time()-3600, $cookiePath);
      setcookie("filtro","", time()-3600, $cookiePath);












      unset($_COOKIE['pagina']);
      unset($_COOKIE['pagina02']);
      unset($_COOKIE['pagina03']);
      unset($_COOKIE['pagina04']);
      unset($_COOKIE['pagina05']);
      unset($_COOKIE['pagina06']);
      unset($_COOKIE['pagina07']);
      unset($_COOKIE['pagina08']);
      unset($_COOKIE['pagina09']);
      unset($_COOKIE['pagina10']);
      unset($_COOKIE['pagina11']);
      unset($_COOKIE['pagina12']);
      unset($_COOKIE['pagina13']);
      unset($_COOKIE['aluguel']);
      unset($_COOKIE['filtro']);
      










      $page = 'http://localhost/projeto/web.php';

      $sec = "1";
      header("Refresh: $sec; url=$page");


  }

  if ($_POST['comeco']) {
    $cookiePath = "/";
    setcookie("pagina","", time()-3600, $cookiePath);
    setcookie("pagina02","", time()-3600, $cookiePath);
    setcookie("pagina03","", time()-3600, $cookiePath);
    setcookie("pagina04","", time()-3600, $cookiePath);
    setcookie("pagina05","", time()-3600, $cookiePath);
    setcookie("pagina06","", time()-3600, $cookiePath);
    setcookie("pagina07","", time()-3600, $cookiePath);
    setcookie("pagina08","", time()-3600, $cookiePath);
    setcookie("pagina09","", time()-3600, $cookiePath);
    setcookie("pagina10","", time()-3600, $cookiePath);
    setcookie("pagina11","", time()-3600, $cookiePath);
    setcookie("pagina12","", time()-3600, $cookiePath);
    setcookie("pagina13","", time()-3600, $cookiePath);
    setcookie("filtro","", time()-3600, $cookiePath);
    setcookie("aluguel","", time()-3600, $cookiePath);












    unset($_COOKIE['pagina']);
    unset($_COOKIE['pagina02']);
    unset($_COOKIE['pagina03']);
    unset($_COOKIE['pagina04']);
    unset($_COOKIE['pagina05']);
    unset($_COOKIE['pagina06']);
    unset($_COOKIE['pagina07']);
    unset($_COOKIE['pagina08']);
    unset($_COOKIE['pagina09']);
    unset($_COOKIE['pagina10']);
    unset($_COOKIE['pagina11']);
    unset($_COOKIE['pagina12']);
    unset($_COOKIE['pagina13']);
    unset($_COOKIE['filtro']);
    unset($_COOKIE['aluguel']);





        $page = 'http://localhost/projeto/web.php';
        header("Location:$page");

  }

               if ($_POST['select1']) {

                 $cookieExpire = time()+(60*60*24);
                   $cookiePath = "/";


        $cookieset = isset($_POST['select1']) ? $_POST['select1'] : $cookieget;

                 setcookie("filtro",$cookieset, $cookieExpire, $cookiePath);

                 $page = 'http://localhost/projeto/web.php';
                 header("Location:$page");
               }





               if ($_POST['enviar1']||$_POST['enviar3']||$_POST['enviar4']||$_POST['enviar6']||$_POST['enviar5']||$_POST['enviar']||
             $_POST['enviar7']||$_POST['enviar8']||$_POST['enviar9']||$_POST['enviar10']||
           $_POST['enviar11']||$_POST['enviar12']||$_POST['enviar13']) {

                 $p2 = isset($_POST['pagina01']) ? filter_input(INPUT_POST, 'pagina01', FILTER_VALIDATE_INT) : $pagina02;
                 $p = isset($_POST['pagina']) ? filter_input(INPUT_POST, 'pagina', FILTER_VALIDATE_INT) : $pagina;
                 $p3 = isset($_POST['pagina3']) ?  filter_input(INPUT_POST, 'pagina3', FILTER_VALIDATE_INT): $pagina03;
                 $p4 = isset($_POST['pagina4']) ? filter_input(INPUT_POST, 'pagina4', FILTER_VALIDATE_INT) : $pagina04;
                 $p5 = isset($_POST['pagina5']) ? filter_input(INPUT_POST, 'pagina5', FILTER_VALIDATE_INT) : $pagina05;
                 $p6 = isset($_POST['pagina6']) ? filter_input(INPUT_POST, 'pagina6', FILTER_VALIDATE_INT)  : $pagina06;
                 $p7 = isset($_POST['pagina7']) ? filter_input(INPUT_POST, 'pagina7', FILTER_VALIDATE_INT) : $pagina07;
                 $p8 = isset($_POST['pagina8']) ? filter_input(INPUT_POST, 'pagina8', FILTER_VALIDATE_INT): $pagina08;
                 $p9 = isset($_POST['pagina9']) ? filter_input(INPUT_POST, 'pagina9', FILTER_VALIDATE_INT) : $pagina09;
                 $p10 = isset($_POST['pagina10']) ? filter_input(INPUT_POST, 'pagina10', FILTER_VALIDATE_INT) : $pagina10;
                 $p11 = isset($_POST['pagina11']) ? filter_input(INPUT_POST, 'pagina11', FILTER_VALIDATE_INT) : $pagina11;
                 $p12 = isset($_POST['pagina12']) ? filter_input(INPUT_POST, 'pagina12', FILTER_VALIDATE_INT) : $pagina12;
                 $p13 = isset($_POST['pagina13']) ? filter_input(INPUT_POST, 'pagina13', FILTER_VALIDATE_INT): $pagina13;










                   $cookieExpire = time()+(60*60*24);
                     $cookiePath = "/";
                       setcookie("pagina02",$p2, $cookieExpire, $cookiePath);
                       setcookie("pagina03",$p3, $cookieExpire, $cookiePath);
                       setcookie("pagina04",$p4, $cookieExpire, $cookiePath);
                       setcookie("pagina05",$p5, $cookieExpire, $cookiePath);
                       setcookie("pagina06",$p6, $cookieExpire, $cookiePath);
                       setcookie("pagina",$p, $cookieExpire, $cookiePath);
                       setcookie("pagina07",$p7, $cookieExpire, $cookiePath);
                       setcookie("pagina08",$p8, $cookieExpire, $cookiePath);
                       setcookie("pagina09",$p9, $cookieExpire, $cookiePath);
                       setcookie("pagina10",$p10, $cookieExpire, $cookiePath);
                       setcookie("pagina11",$p11, $cookieExpire, $cookiePath);
                       setcookie("pagina12",$p12, $cookieExpire, $cookiePath);
                       setcookie("pagina13",$p13, $cookieExpire, $cookiePath);


                       $page = 'http://localhost/projeto/web.php';
                       header("Location:$page");
               }



if ($_COOKIE['maria']) {
  $t = count($url);

  for ($i=0; $i < $t ; $i++) {

    echo '<div class="table">
    <div>
    ';
    echo "
<a href='$mariainfo[$i]'>
    ";
    echo "<img src='$url[$i]' /></a> <h3>Maria Corretora</h3></div> ";
    echo '
    <div class="resizable">

    ';

    echo "<p>".strip_tags($title[$i])."</p>";
    echo "<br><p>".strip_tags($dec[$i])."</p>";
    echo "<br><p>".strip_tags($price[$i])."</p>";
    echo "<br><p>".strip_tags($uf[$i])."</p>
    </div> </div>";
  }
?>
<div class="pag">
  <?php
  echo "Página atual: ".$pagina02."| ","Total de páginas para Maria Corretora: ";
  foreach ($page1 as $key) {
    $sub = substr($key, 9, 2);
    $cd =  trim($sub, '/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.:/s.: ');
    $tp = trim($cd, 'pa');
    $td = trim($tp, 'de');
    echo $td;
  }
   ?>
         <form  action="web.php" method="post">
           <input type= "text" name="pagina01" placeholder="  Qual página navegaremos hoje?" >
           <input type="submit" name="enviar1" value="Pesquisar"  style="width:80px;">
         </form>
</div>

<?php
}
if ($_COOKIE['zap']) {

  $t = count($zapinfo);

  for ($i=0; $i < $t ; $i++) {

    echo '<div class="table">
    <div>
    ';
    echo "<p>".strip_tags($zapinfo[$i])."</p>";

    echo "<h3>Zap Imóveis</h3></div> ";
    echo '
    <div class="resizable">

    ';
    echo "<p>".strip_tags($zaprice[$i])."</p>";
    echo "<br><p>".strip_tags($zapbairros[$i])."</p>";
    echo "<br><p>".strip_tags($zapmetros[$i])."</p>
    </div> </div>";
  }
?>
<div class="pag">
    <?php
        foreach ($zapsaida as $keypx) {
          echo strip_tags($keypx)."tá";
        }?>
        <form  action="web.php" method="post">
          <input type= "text"name="pagina12" placeholder="  Qual página navegaremos hoje?" style="width:300px;">
          <input type="submit" name="enviar12" value="Pesquisar"  style="width:80px;">
        </form>
</div>
<?php
}

if($_COOKIE['adm']){

$t01 = count($admtitle);

for ($i=0; $i < $t01 ; $i++) {

  $urladm = trim($admurl[$i], '"');

  $urladm02 = "https://www.admimoveisoficial.com.br".trim($urladm, '""');

  $admimg02 = trim($admimg[$i], '"');

  $admimg03 = "https://www.admimoveisoficial.com.br".trim($admimg02, '""');


  echo '<div class="table">
  <div>
  ';
  echo "
<a href='$urladm02'>
  ";
  echo "<img src='$admimg03' /></a> <h3>ADM Imóveis</h3></div> ";
  echo '
  <div class="resizable">

  ';
  echo "<p>".strip_tags($admtitle[$i])."</p>";
  echo "<br><p>".strip_tags($admprice[$i])."</p>";
  echo "<br><p>".strip_tags($admlocal[$i])."</p>";
  echo "<br><p>".strip_tags($admtipo[$i])."</p>
  </div> </div>";
}
?>
<div class="pag">
    <?php
      foreach ($pageadm as $admp) {
        echo strip_tags($admp);
      }
     ?>
     <form  action="web.php" method="post">
       <input type= "text" name="pagina7" placeholder="  Qual página navegaremos hoje?" >
       <input type="submit" name="enviar7" value="Pesquisar"  style="width:80px;">
     </form>
</div>

<?php
}


if ($_COOKIE['graca']) {

  $t02 = count($gracaprice);
  for ($i=0; $i < $t02 ; $i++) {

    echo '<div class="table">';
    echo "
  <a href='$gracaurl[$i]'>
    ";
    echo "<div>".$gracaimg[$i]."</a> <h3>Graça Medeiros Imoveis</h3></div> ";
    echo '
    <div class="resizable">
    ';
    echo "<p>".strip_tags($gracatitle[$i])."</p>";
    echo "<p>".strip_tags($gracaquart[$i])."</p>";
    echo "<p>".strip_tags($gracadec[$i])."</p>";
    echo "<br><p>".strip_tags($gracaprice[$i])."</p></br>
    </div> </div>";

  }


?>
<div class="pag">
  <?php foreach ($pagegraca as $keyp02) {
    echo "Você está na". strip_tags($keyp02)."para Graça Corretora";
  } ?>

  <form  action="web.php" method="post">
    <input type= "text"name="pagina8" placeholder="  Qual página navegaremos hoje?" >
    <input type="submit" name="enviar8" value="Pesquisar"  style="width:80px;">
  </form>

</div>
<?php
}
if ($_COOKIE['anderson']) {

$count03 = count($andersoninfo);

for ($i=0; $i < $count03 ; $i++) {

$imgand = str_replace('src="',"",$andersonimg[$i]);
$imgand2 = str_replace('"', "", $imgand);

echo '<div class="table">
<div>
';
echo "
<a href='$urlanderson[$i]'>
";
echo "<img src='$imgand2' /></a> <h3>Anderson Corretor</h3></div> ";
echo '
<div class="resizable">

';
echo "<p>".strip_tags($andersoninfo[$i])."</p>";
echo "<br><p>".strip_tags($andersonprice[$i])."</p>";
echo "<br><p>".strip_tags($andersontipo[$i])."</p>
</div> </div>";
}

?>

<div class="pag">
  <?php echo "Sua página atual: ".$pagina09 ?>
  <form  action="web.php" method="post">
    <input type= "text"name="pagina9" placeholder="  Qual página navegaremos hoje?" >
    <input type="submit" name="enviar9" value="Pesquisar"  style="width:80px;">
  </form>

</div>
<?php
}
    if ($_COOKIE['altope']) {

    $count04 = count($altopeprice);

  for ($i=0; $i < $count04 ; $i++) {

        $altourl02 = str_replace('"',"",$altopeurl[$i]);
        $imgand =  str_replace('480w', "", $imgaltope[$i]);


        echo '<div class="table">
        <div>
        ';
        echo "
    <a href='$altourl02'>
        ";
        echo "<img src='$imgand' /></a> <h3>Alto Padrão Imóveis</h3></div> ";
        echo '
        <div class="resizable">

        ';
        echo "<p>".strip_tags($altopetitle[$i])."</p>";
        echo "<br><p>".strip_tags($altopeprice[$i])."</p>";
        echo "<br><p>".strip_tags($altopeuf[$i])."</p>
        </div> </div>";
  }

  ?>
  <div class="pag">
    <?php
    echo "Página atual: ".$pagina10;
    echo "|Total de páginas para Alto PE: ";
    foreach ($altopage as $li) {
      $pg= trim($li, 'Ordem:Página:de');
      echo $pg;
    }
?>

    <form  action="web.php" method="post">
      <input type= "text"name="pagina10" placeholder="  Qual página navegaremos hoje?" >
      <input type="submit" name="enviar10" value="Pesquisar"  style="width:80px;">
    </form>

  </div>
<?php
}

if ($_COOKIE['luciana']) {
$t = count($lucimg);

for ($i=0; $i < $t ; $i++) {

  $ext = "http://lucianacorretoragravata.com.br/".$ludeinfo[$i];
  echo '<div class="table">
  <div>
  ';
  echo "
<a href='$ext'>
  ";
  echo "<img src='$lucimg[$i]' /> </a><h3>Luciana Corretora</h3></div>";
  echo '
  <div class="resizable">
  ';
  echo "<p>".strip_tags($luctitle[$i])."</p>";
  echo "<br>".strip_tags(strtolower($lucdecri[$i]))."<p></p>";
  echo "<br>".strip_tags($ludeprice[$i])."<p></p>";
  echo "<br><p>".strip_tags($ludref[$i]). "</p>
  </div> </div>";
}
 ?>
 <div class="pag">
   <?php
     echo "Página atual: ".$pagina03."| ";
     foreach ($ludepage as $pq) {
       echo  "Total de páginas para Luciana Corretora: ".str_replace("de", "", $pq);
     }
 ?>
 <form  action="web.php" method="post">
   <input type="text" name="pagina3" placeholder="  Qual página navegaremos hoje?" >
   <input type="submit" name="enviar3" value="Pesquisar"  style="width:80px;">
 </form>
 </div>
<?php
}
if ($_COOKIE['antonio']) {
$t = count($antodecri);
for ($i=0; $i < $t ; $i++) {
  $info = $antoinfo[$i];
  $srtinfo = str_replace('rel="follow"',"", $info);
  $infotr = trim($srtinfo,'data-testid="btn_details" class="btn btn-details">');

  $red = "https://www.antoniomirandaimoveis.com.br".$infotr;

  echo '<div class="table">
  <div>
  ';
  $varimg =  $antoimg[$i];

   $part = explode('data-src="', $varimg);

   $varimg1 = str_replace('"', "", $part[1]);
  echo "<a href='$red'>";
  echo "<img src='$varimg1' /></a> <h3>Antonio Miranda Imóveis</h3>
  </div>";
  echo '
  <div class="resizable">
  ';
  echo "<p>".strip_tags($txtanto[$i])."</p>";
  echo "<br><p>".strip_tags($antodecri[$i]). "</p>
  </div> </div>";
}
 ?>

 <div class="pag">
   <?php foreach ($antopage as $page1) {
     echo "Total de páginas para Antonio Miranda Imóveis:".strip_tags(str_replace("Próximo", "", $page1));
   } ?>
   <form  action="web.php" method="post">
     <input type="text" name="pagina4" placeholder="  Qual página navegaremos hoje?" >
     <input type="submit" name="enviar4" value="Pesquisar"  style="width:80px;">
   </form>
 </div>
 <?php
}

if ($_COOKIE['marcio']) {

  $t = count($marciotitle);

  for ($i=0; $i < $t ; $i++) {

    echo '<div class="table">
    <div>
    ';
    echo "
<a href='$marcioinfo[$i]'>
    ";
    echo "<img src='$marcioimg[$i]' /></a> <h3>Márcio luiz Corretor</h3></div> ";
    echo '
    <div class="resizable">

    ';
    echo "<p>".strip_tags($marciotitle[$i])."</p>";
    echo "<br><p>".strip_tags($marciodec[$i])."</p>";
    echo "<br><p>".strip_tags($marcioprice[$i])."</p>";
    echo "<br><p>".strip_tags($marciouf[$i])."</p>
    </div> </div>";
  }

  foreach ($marciospan as $keyp) {
    echo  ' <div class="pag">';
    echo "Página atual: ".$pagina06."| ","Total de páginas para Mácio Luiz Corretor:".strip_tags(str_replace("de", "", $keyp));
  }

  ?>


    <form  action="web.php" method="post">
      <input type= "text"name="pagina6" placeholder="  Qual página navegaremos hoje?">
      <input type="submit" name="enviar6" value="Pesquisar"  style="width:80px;">
    </form>
  </div>
<?php
}
if ($_COOKIE['rabelo']) {

  $rabe = count($rabelodecri);
for ($i=0; $i < $rabe; $i++) {
    $urlrabe = trim($rabelourl[$i], '/" ');
  echo '<div class="table">
  <div>
  ';
  echo "
<a href='$urlrabe'>
  ";
  echo "<img src='$rabeloimg[$i]' /></a> <h3>Rabelo Imóveis</h3></div> ";
  echo '
  <div class="resizable">

  ';
  echo "<p>".strip_tags($rabelodecri[$i])."</p>";
  echo "<p>".strip_tags($rabeloinfo[$i])."</p>";
  echo "<br><p>".strip_tags($rabeloprice[$i])."</p>

  </div> </div>";
}
 ?>
<div class="pag">
  <?php foreach ($rabelopage as $keyt) {
          echo "Total de páginas para Rabelo Imóveis: ".strip_tags(substr($keyt,0, 30));
        } ?>

        <form  action="web.php" method="post">
          <input type="text" name="pagina5" placeholder="  Qual página navegaremos hoje?" >
          <input type="submit" name="enviar5" value="Pesquisar"  style="width:80px;">
        </form>

</div>
<?php }

if ($_COOKIE["olga"]) {

   $t = count($d);

   for ($i=0; $i < $t ; $i++) {
     $info = $olgainfo[$i];
     $srtinfo = str_replace('rel="follow"',"", $info);
     $infotr = trim($srtinfo,'data-testid="btn_details" class="btn btn-details">');

     $red1 = "https://www.olgacorretora.com.br/imovel".$infotr;
     echo '<div class="table">
     <div>
     ';
    $var =  $url2[$i];

     $parts = explode('data-src="', $var);

     $var1 = str_replace('"', "", $parts[1]);
     echo "<a href='$red1'>";
     echo "<img src='$var1' /> </a><h3>Olga Corretora</h3></div>";
     echo '
     <div class="resizable">

     ';
     echo "<br><p>".strip_tags(substr($c[$i], 0, 398))."</p>";
     echo "<br><p>".strip_tags(substr($y[$i], 0 , 398))."</p>";
     echo "<br><p>".strip_tags(substr($k[$i], 0 , 398))."</p>";
     echo "<br><p>".strip_tags(substr($x[$i], 0 , 398))."</p>";
     echo "<br><p>".strip_tags(substr($d[$i], 0 , 398))."</p>
     </div> </div>";
   }

   ?>

   <div class="pag">
     <?php foreach ($p as $page) {
       echo "Total de páginas para Olga Corretora ".strip_tags(str_replace("Próximo", "", $page));
     } ?>
     <form  action="web.php" method="post">
       <input type="text" name="pagina" placeholder="  Qual página navegaremos hoje?" >
       <input type="submit" name="enviar" value="Pesquisar"  style="width:80px;">
     </form>

   </div>

<?php
}
if ($_COOKIE['olx']) {

$count = count($olxlocal);

for ($i=0; $i <$count ; $i++) {
  $txt = str_replace('aria-label="LocalizaÃ§Ã£o:',"",$olxlocal[$i]);
  $cv = str_replace('sc-1c3ysll-1', "", $txt);
  $tr = str_replace('class=', "",$cv);
  $tf = str_replace('sc-', "", $tr); // local

$tr =  $olxinfo[$i];

$x = str_replace('class="kgl1mq-0 iYdPim sc-bdVaJa daxpJj"', "", $tr);

$v =  strip_tags(str_replace('color="dark"', "", $x));

$lp = str_replace('font-weight="400">', "",  $v); // info

 $io = str_replace('aria-label=', "", $olxprice[$i]); // price

 $ty = $olxurl[$i];

 $xr = explode('target=', $ty);

 $ur = trim($xr[0], 'enabled="false"');

 $ft = str_replace('href="', "", $ur);

 $rt = str_replace('"', "", $ft );


    $olximg02 = str_replace('src="', "", $olximg[$i] );

    $olximg03 = str_replace(' alt="', "", $olximg02 );

    $olximg04 = strip_tags(trim($olximg03, '"'));



        echo '<div class="table">
        <div>
        ';
        echo "
    <a href='$rt'>
        ";
        echo "<img src='$olximg04' /></a> <h3>OLX</h3></div> ";
        echo '
        <div class="resizable">

        ';
        echo "<p>".strip_tags($tf)."</p>";
        echo "<br><p>".strip_tags($io)."</p>";
        echo "<br><p>".strip_tags($lp)."</p>
        </div> </div>";


}

 ?>
    <div class="pag">
        <?php
      //  $p = str_replace('span color="#3387BB" class="sc-1koxwg0-2 eLGHiC sc-bdVaJa iUgLgp" font-weight="400">', "", $olxpage[8]);
                $t =  " |Anvace para obter novos resultados: ".strip_tags($olxpage[0]);
                echo "Página atual: ".$pagina11, $q = str_replace("/span>/div>/a>", "", $t);
          ?>

          <form  action="web.php" method="post">
            <input type= "text"name="pagina11" placeholder="  Qual página navegaremos hoje?" >
            <input type="submit" name="enviar11" value="Pesquisar"  style="width:80px;">
          </form>
    </div>
    <?php
  }

  if ($_COOKIE['viva']) {

    $t = count($vivarua);

    for ($i=0; $i < $t ; $i++) {

      echo '<div class="table">
      <div>
      ';

      echo "<h3>Viva Real</h3></div> ";
      echo '
      <div class="resizable">

      ';
      echo "<p>".strip_tags(str_replace('span class="property-card__title js-cardLink js-card-title">',"",$vivainfo[$i]))."</p>";
      echo "<br><p>".strip_tags($vivarua[$i])."</p>";
      echo "<br><p>".strip_tags($vivaprice[$i])."</p>
      </div> </div>";
    }


      ?>
      <div class="pag">
        <?php
        foreach ($vivaresu as $key) {
          echo "Todos resultados para Viva real:".str_replace('class="results-summary__count js-total-records">',"",$key);
        }
         ?>
         <form  action="web.php" method="post">
           <input type= "text"name="pagina13" placeholder="  Qual página navegaremos hoje?" >
           <input type="submit" name="enviar13" value="Pesquisar"  style="width:80px;">
         </form>
      </div>
      <?php
    }
       ?>
</body>
</html>
