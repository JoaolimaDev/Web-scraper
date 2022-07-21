<?php
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json");

class Setters
{

    private $menu1;



public function setMenu($menup)
{
      $this->menu1= $menup;
}

public function getMenu(){
  return $this->menu1;
}

}
class api extends Setters
{

  function __construct()
  {


    return $this->controller();


  }

public function controller()
{

  
  $set = $this->setMenu(filter_input(INPUT_GET, 'menu', FILTER_SANITIZE_SPECIAL_CHARS));

  $get = $this->getMenu();


  if(isset($_GET['token'])){

    $token = $_GET['token'];

    $part = explode(".",$token);
    $header = $part[0];
    $payload = $part[1];
    $signature = $part[2];

    function base64ErlEncode($data)
    {
      return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

    $valid = hash_hmac('sha256',"$header.$payload",md5('98-54jdfi$'),true);
    $valid = base64ErlEncode($valid);

    $x = json_decode(
      base64_decode($part[1])
    );
    $y=md5('pmg');

    if($x->name !== $y){

      return $this-> err();

    }

   if($signature == $valid){
  switch ($get) {
    case 'get':
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    return $this-> view();
  }else{
    http_response_code(400);
    echo json_encode([
          'Sucesso' => 0,
           'Mensagem' => 'Insira um método válido!',
       ]);
       exit;
  }
  break;

  case 'post':
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      return $this-> view();
    }else{
      http_response_code(400);
      echo json_encode([
            'Sucesso' => 0,
             'Mensagem' => 'Insira um método válido!',
         ]);
         exit;
    }
    break;

    default:

    http_response_code(400);
    echo json_encode([
          'Sucesso' => 0,
           'Mensagem' => 'Insira um método válido!',
       ]);


      break;
  }
}else {
  return $this->err();

}
}else{

  return $this->err();


}

}
public function err()
{

     http_response_code(403);
     echo json_encode([
           'Sucesso' => 0,
            'Mensagem' => 'insira um token valido!',
        ]);
        exit;
}

protected function view()
{
  if ($_COOKIE['olga'] != null) {

    if (!$_COOKIE['filtro']) {

      $pagina = is_numeric($_COOKIE['pagina']) ? $_COOKIE['pagina'] : "1";


      $url = "https://www.olgacorretora.com.br/imoveis/a-venda/gravata?pagina=$pagina";


  }else{

      $pagina = is_numeric($_COOKIE['pagina']) ? $_COOKIE['pagina'] : "1";
      $cookieset =  $_COOKIE['filtro'];

      $cp = $cookieset."/gravata?pagina=".$pagina;

      $url = "https://www.olgacorretora.com.br/imoveis/a-venda/$cp";

  }



    $html = file_get_contents($url);

    $start = stripos($html, '<section>');

    $end = stripos($html, '</section>', $offset = $start);

    $length = $end - $start;

    $htmlSection = substr($html, $start, $length);

    preg_match_all('@<h2 class="card-title">(.+)</h2>@', $htmlSection, $matches);
    preg_match_all('@<div class="info-left">(.+)</div>@', $htmlSection, $matche);
    preg_match_all('@<div class="pagination-cell hidden-lg-up">(.+)@', $htmlSection, $pag);
    preg_match_all('@<p class="description hidden-sm-down">(.+)@', $htmlSection, $dec);
    preg_match_all('@<h3 class="card-text">(.+)</h3>@', $htmlSection, $tipos);
    preg_match_all('@<small style="opacity: 0.7" class="reference property_full_reference pull-right">(.+)</small>@', $htmlSection, $cod);
    preg_match_all('/<div\s+class="card-img-top\s+b-lazy\s+(.+)(title=)/m', $htmlSection, $urlolga2);
    preg_match_all('/<a href="(.+)Detalhes<\/a>/m', $htmlSection, $olgainfo);

    $dec1 = $dec[1];
    $listItems = $matches[1];
    $intem = $matche[1];
    $page= $pag[0];
    $t = $cod[0];
    $c = $tipos[1];
    $urlolga = $urlolga2[1];

  }


      if ($_COOKIE['maria'] != null) {

        if (!$_COOKIE['filtro']) {

          if ($_COOKIE['aluguel']) {
            $op = $_COOKIE['aluguel'];
          }else{
            $op = '1';
          }


        $pagina1 = is_numeric($_COOKIE['pagina02']) ? $_COOKIE['pagina02'] : "1";

            $ft = "operation=".$op."&city=45&page=".$pagina1;

    $url2 = "https://mariacorretora.com.br/imoveis?$ft";


      }else{

          if($_COOKIE['filtro'] == 'chale'){
            $cp = '4';
          }

          if($_COOKIE['filtro'] == 'bangalo'){
            $cp = '4';
          }

          if($_COOKIE['filtro'] == 'chacara'){
            $cp = '6';
          }

          if($_COOKIE['filtro'] == 'sitio'){
            $cp = '17';
          }

          if($_COOKIE['filtro'] == 'flat'){
            $cp = '25';
          }

          if($_COOKIE['filtro'] == 'fazenda'){
            $cp = '7';
          }

          if($_COOKIE['filtro'] == 'casa'){
            $cp = '1';
          }

          if($_COOKIE['filtro'] == 'terreno'){
            $cp = '8';
          }

          if($_COOKIE['filtro'] == 'apartamento'){
            $cp = '10';
          }
          $pagina1 = is_numeric($_COOKIE['pagina02']) ? $_COOKIE['pagina02'] : "1";

          if ($_COOKIE['aluguel']) {
            $op = $_COOKIE['aluguel'];
          }else{
            $op = '1';
          }

          $jp = "?type=".$cp."&operation=".$op." &city=45"."&page=".$pagina1;

          $url2 = "https://mariacorretora.com.br/imoveis$jp";

        }

      $html2 = file_get_contents($url2);

      $start2 = stripos($html2, '<section>');


      $end2 = stripos($html2, '</section>', $offset = $start);

      $length2 = $end2 - $start2;

      $htmlSection2 = substr($html2, $start2, $length2);


      $re = '/<img\s+(alt=")(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m';
      preg_match_all('/(<div)\s+(class="title">)\s+(.+)\s+(.*)\s+(<\/div>)/isxU', $htmlSection2, $output);
      preg_match_all('/(<div)\s+(class="description">)(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m', $htmlSection2, $output1);
      preg_match_all('/(<div)\s+(class="price">)\s+(<span>)(.+)\s+(.+)\s+(<\/div>)/isxU', $htmlSection2, $output2);
      preg_match_all('/(<div)\s+(class="city-uf">)\s+(.+)\s+(<\/div>)/isxU', $htmlSection2, $output3);
      preg_match_all('/<span>(.*)<\/span>/isxU', $htmlSection2, $output4);
      preg_match_all($re, $htmlSection2, $mat);
      preg_match_all('/<a class="image" href="(.+)">/m', $htmlSection2, $outputurl);




  $v = $output[0];
 $v01 = $output1[0];
 $v03 = $output2[0];
 $v04 = $output3[0];
 $v05 = $output4[0];

 $te6 = $mat[9];

 $tri6 = str_replace("480w","",$te6);

 $tr6 = str_replace(",", "", $tri6);


}

if ($_COOKIE['luciana'] != null) {

  if (!$_COOKIE['filtro']) {


        $pagina03 = is_numeric($_COOKIE['pagina03']) ? $_COOKIE['pagina03'] : "1";

        if ($_COOKIE['aluguel']) {
          $op = $_COOKIE['aluguel'];
        }else{
          $op = '1';
        }
          $rt = "&operation=".$op."&page=".$pagina03;

        $url3 = "http://lucianacorretoragravata.com.br/resultado?city=45$rt";


      }else{

        if($_COOKIE['filtro'] == 'chale'){
          $cp = '4';
        }

        if($_COOKIE['filtro'] == 'bangalo'){
          $cp = '4';
        }

        if($_COOKIE['filtro'] == 'chacara'){
          $cp = '6';
        }

        if($_COOKIE['filtro'] == 'sitio'){
          $cp = '17';
        }

        if($_COOKIE['filtro'] == 'flat'){
          $cp = '25';
        }

        if($_COOKIE['filtro'] == 'fazenda'){
          $cp = '7';
        }

        if($_COOKIE['filtro'] == 'casa'){
          $cp = '1';
        }

        if($_COOKIE['filtro'] == 'terreno'){
          $cp = '8';
        }

        if($_COOKIE['filtro'] == 'apartamento'){
          $cp = '10';
        }
        $pagina03 = is_numeric($_COOKIE['pagina03']) ? $_COOKIE['pagina03'] : "1";

        if ($_COOKIE['aluguel']) {
          $op = $_COOKIE['aluguel'];
        }else{
          $op = '1';
        }

            $jp02 = "?type=".$cp."&operation=".$op."&city=45&order=price-min&page=".$pagina03;

        $url3 = "http://lucianacorretoragravata.com.br/resultado$jp02";
      }

        $html3 = file_get_contents($url3);

        $start3 = stripos($html3, '<div body="" class="row imobthumbs list">');


        $end3 = stripos($html3, '<div class=" clearfix">', $offset3 = $start3);

        $length3 = $end3 - $start3;

        $htmlSection3 = substr($html3, $start3, $length3);


        preg_match_all('/(<source srcset=")\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m', $htmlSection3, $imglu);
        preg_match_all('/<div class="title">\s+(.+)/m', $htmlSection3, $outputitle);
        preg_match_all('/<div class="description">(.+)\s+(.+)\s+(.+)\s+(.+)/m', $htmlSection3, $ludecri);
        preg_match_all('/<div class="ref">\s+<span>(.+)\s+<\/div>/m', $htmlSection3, $ludref);
        preg_match_all('/<div class="price">\s+(.+)\s+(.+)\s+/m', $htmlSection3, $ludeprice);
        preg_match_all('/<select name="result-pagination">\s+<\/select>\s+<\/div>\s+(.+)/m', $htmlSection3, $ludepage);
        preg_match_all('/<a class="float_info" href="(.+)">/m', $htmlSection3, $outputlude);

        $tey = $imglu[5];

        $tri3 = str_replace("480w","",$tey);

        $tr3 = str_replace(",", "", $tri3);

}

if ($_COOKIE['antonio'] != null) {

  if (!$_COOKIE['filtro']) {

    if ($_COOKIE['aluguel']) {
      $op = 'para-alugar';
    }else{
      $op = 'a-venda';
    }

  $wr = $op."/gravata?pagina=".$pagina04;

  $pagina04 = is_numeric($_COOKIE['pagina04']) ? $_COOKIE['pagina04'] : "1";
  $url4 = "https://www.antoniomirandaimoveis.com.br/imoveis/$wr";
  }else{
      $pagina04 = is_numeric($_COOKIE['pagina04']) ? $_COOKIE['pagina04'] : "1";

        $cookieset =  $_COOKIE['filtro'];

        if ($_COOKIE['aluguel']) {
          $op = 'para-alugar';
        }else{
          $op = 'a-venda';
        }

      $cp = $op."/".$cookieset."?pagina=".$pagina04;

        $url4="https://www.antoniomirandaimoveis.com.br/imoveis/$cp";

      }


  $html4 = file_get_contents($url4);

  $start4 = stripos($html4, '<div class="col-sm-12 col-md-8 col-lg-9">');


  $end4 = stripos($html4, '<footer class="footer-template-01 border-color-primary">', $offset4 = $start4);

  $length4 = $end4 - $start4;

  $htmlSection4 = substr($html4, $start4, $length4);


  preg_match_all('/<div\s+class="card-img-top\s+b-lazy\s+(.+)(title=)/m', $htmlSection4, $output_antoimg);
  preg_match_all('/(<p class="description hidden-sm-down">)(.+)\s+(.+)/m', $htmlSection4, $decriantonio);
  preg_match_all('/<div class="text-info-thumb"><p><strong>(.+)<p class="sale-price">(.+)<span> (.+)<\/span><\/p><p><strong><span>(.+)<\/span><\/strong><\/p><\/div>/m', $htmlSection4, $output_anto);
  preg_match_all('/<div class="pagination-cell hidden-lg-up">(.+)<\/div>/m', $htmlSection4, $outpage);
  preg_match_all('/<a href="(.+)Detalhes<\/a>/m', $htmlSection4, $antoinfo);

}
if ($_COOKIE['rabelo'] != null) {

  if (!$_COOKIE['filtro']) {


  $pagina05 = is_numeric($_COOKIE['pagina05']) ? $_COOKIE['pagina05'] : "1";


  if ($_COOKIE['aluguel']) {
    $op = 'rent';
  }else{
    $op = 'sale';
  }

  $teste = $pagina05.'/?imovel=pesquisa&s&code&business='.$op.'&valor_min&valor_max&cidade=gravata&bairro';


  $url5= "https://www.rabeloimoveisoficial.com/page/$teste";
}else{

  if($_COOKIE['filtro'] == 'chale'){
    $cp = 'chale-casa-casa-em-condominio';
  }

  if($_COOKIE['filtro'] == 'bangalo'){
    $cp = 'chale-casa-casa-em-condominio';
  }

  if($_COOKIE['filtro'] == 'chacara'){
    $cp = 'lote-terreno-sitio-fazenda';
  }

  if($_COOKIE['filtro'] == 'sitio'){
    $cp = 'lote-terreno-sitio-fazenda';
  }

  if($_COOKIE['filtro'] == 'flat'){
    $cp = 'flat-apartamento';
  }

  if($_COOKIE['filtro'] == 'fazenda'){
    $cp = 'lote-terreno-sitio-fazenda';
  }

  if($_COOKIE['filtro'] == 'casa'){
    $cp = 'chale-casa-casa-em-condominio';
  }

  if($_COOKIE['filtro'] == 'terreno'){
    $cp = 'lote-terreno-sitio-fazenda';
  }

  if($_COOKIE['filtro'] == 'apartamento'){
    $cp = 'apartamento';
  }
  $pagina05 = is_numeric($_COOKIE['pagina05']) ? $_COOKIE['pagina05'] : "1";


  if ($_COOKIE['aluguel']) {
    $op = 'rent';
  }else{
    $op = 'sale';
  }

  $jp04 = $pagina05."/?imovel=pesquisa&s=&code=&business=".$op."&tipo=".$cp."&valor_min=&valor_max=&cidade=gravata&bairro=";
  $url5= "https://www.rabeloimoveisoficial.com/page/$jp04";

}

    $html5 = file_get_contents($url5);

    $start5 = stripos($html5, '<div class="content-no-padding">');


    $end5 = stripos($html5, '<footer class="main_footer container bg-custom-footer">', $offset5 = $start5);

    $length5 = $end5 - $start5;

    $htmlSection5 = substr($html5, $start5, $length5);

    preg_match_all('/<picture>\s+(<source media=")(.+)srcset="(.+)/m', $htmlSection5, $outimg);
    preg_match_all('/<p class="property-price">\s+<span class="cat-price">(.+)<\/span>/m', $htmlSection5, $outputprice);
    preg_match_all('/<a class="al-center"\s+href=(.+)title/m', $htmlSection5, $rabelourl);
    preg_match_all('/<div class="main_imov_item_desc">\s+(.+)\s+<p>(.+\s+.+\s+.+)/m', $htmlSection5, $rabelodecri);
    preg_match_all('/<div class="pagination"><span class="countpage">(.+)<span class="current">/m', $htmlSection5, $rabelopage);
    preg_match_all('/(<span class="property_business_title">)(.+)<\/span>/m', $htmlSection5, $rabeloinfo);
    $tey05 = $outimg[3];

    $tri05 = str_replace("/>","",$tey05);
}

if ($_COOKIE['marcio'] != null) {

  if (!$_COOKIE['filtro']) {

              if ($_COOKIE['aluguel']) {
                $op = $_COOKIE['aluguel'];
              }else{
                $op = '1';
              }

    $pagina06 = is_numeric($_COOKIE['pagina06']) ? $_COOKIE['pagina06'] : "1";

    $pq="?operation=".$op."&city=45&page=".$pagina06;

  $url6= "https://marcioluizcorretor.com.br/imoveis$pq";
}else{

          if($_COOKIE['filtro'] == 'chale'){
            $cp = '4';
          }

          if($_COOKIE['filtro'] == 'bangalo'){
            $cp = '4';
          }

          if($_COOKIE['filtro'] == 'chacara'){
            $cp = '6';
          }

          if($_COOKIE['filtro'] == 'sitio'){
            $cp = '17';
          }

          if($_COOKIE['filtro'] == 'flat'){
            $cp = '25';
          }

          if($_COOKIE['filtro'] == 'fazenda'){
            $cp = '7';
          }

          if($_COOKIE['filtro'] == 'casa'){
            $cp = '1';
          }

          if($_COOKIE['filtro'] == 'terreno'){
            $cp = '8';
          }

          if($_COOKIE['filtro'] == 'apartamento'){
            $cp = '10';
          }

  $pagina06 = is_numeric($_COOKIE['pagina06']) ? $_COOKIE['pagina06'] : "1";

  if ($_COOKIE['aluguel']) {
    $op = $_COOKIE['aluguel'];
  }else{
    $op = '1';
  }

    $jx6 = "?operation=".$op."&type=".$cp."&page=".$pagina06;

  $url6 = "https://marcioluizcorretor.com.br/imoveis$jx6";

}

  $html6 = file_get_contents($url6);

  $start6 = stripos($html6, '<section>');


  $end6 = stripos($html6, '</section>', $offset6 = $start6);

  $length6 = $end6 - $start6;

  $htmlSection6 = substr($html6, $start6, $length6);


        $htmlSection6 = substr($html6, $start6, $length6);
        $re = '/<img\s+(alt=")(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m';
        preg_match_all('/(<div)\s+(class="title">)\s+(.+)\s+(.*)\s+(<\/div>)/isxU', $htmlSection6, $output0);
        preg_match_all('/(<div)\s+(class="description">)(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m', $htmlSection6, $output01);
        preg_match_all('/(<div)\s+(class="price">)\s+(<span>)(.+)\s+(.+)\s+(<\/div>)/isxU', $htmlSection6, $output02);
        preg_match_all('/(<div)\s+(class="city-uf">)\s+(.+)\s+(<\/div>)/isxU', $htmlSection6, $output03);
        //preg_match_all('/<span>(.*)<\/span>/isxU', $htmlSection6, $output04);
        preg_match_all($re, $htmlSection6, $mat0);
        preg_match_all('/<a class="image" href="(.+)">/m', $htmlSection6, $outputurl0);

        preg_match_all('/<\/select>\s+<\/div>\s+<span>(.+)<\/span>/m', $htmlSection6, $output04);

        $v0 = $output0[0];
        $v010 = $output01[0];
        $v030 = $output02[0];
        $v040 = $output03[0];
        $v050 = $output04[1];
        $te0 = $mat0[5];

        $tri0 = str_replace("360w","",$te0);

        $tr0 = str_replace(",", "", $tri0);

}
if ($_COOKIE['altope'] != null) {

  if(!$_COOKIE['filtro']){


      $pagina10 = is_numeric($_COOKIE['pagina10']) ? $_COOKIE['pagina10'] : '1';

      if ($_COOKIE['aluguel']) {
        $op = $_COOKIE['aluguel'];
      }else{
        $op = '1';
      }

        $rt = "?operation=".$op."&city=45&page=".$pagina10;

        $url9 = "https://altopadraope.com.br/imoveis$rt";
      }else{

        if($_COOKIE['filtro'] == 'bangalo'){
          $cp = '14';
        }

        if($_COOKIE['filtro'] == 'chale'){
          $cp = '4';
        }

        if($_COOKIE['filtro'] == 'chacara'){
          $cp = '6';
        }

        if($_COOKIE['filtro'] == 'sitio'){
          $cp = '17';
        }

        if($_COOKIE['filtro'] == 'flat'){
          $cp = '25';
        }

        if($_COOKIE['filtro'] == 'fazenda'){
          $cp = '7';
        }

        if($_COOKIE['filtro'] == 'casa'){
          $cp = '1';
        }

        if($_COOKIE['filtro'] == 'terreno'){
          $cp = '8';
        }

        if($_COOKIE['filtro'] == 'apartamento'){
          $cp = '10';
        }
        $pagina10 = is_numeric($_COOKIE['pagina10']) ? $_COOKIE['pagina10'] : '1';
        if ($_COOKIE['aluguel']) {
          $op = $_COOKIE['aluguel'];
        }else{
          $op = '1';
        }
        $hj = "?operation=".$op."&type=".$cp."&city=45&page=".$pagina10;

        $url9 = "https://altopadraope.com.br/imoveis$hj";
      }

          $html9 = file_get_contents($url9);

          $start9 = stripos($html9, '<section>');


          $end9 = stripos($html9, '</section>', $offset9 = $start9);

          $length9 = $end9 - $start9;

          $htmlSection9 = substr($html9, $start9, $length9);


            preg_match_all('/(<div)\s+(class="description">)(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)\s+(.+)/m', $htmlSection9, $altopedec);
            preg_match_all('/(<div)\s+(class="price">)\s+(<span>)(.+)\s+(.+)\s+(<\/div>)/isxU', $htmlSection9, $altopeprice);
            preg_match_all('/(<div)\s+(class="city-uf">)\s+(.+)\s+(<\/div>)/isxU', $htmlSection9, $altopeuf);
            preg_match_all('/(https:\/\/dg3mmr10pshqq)(.+)480w/m', $htmlSection9, $imgaltope);
            preg_match_all('/(<a class="image")\s+href="(.+)\s+target="_blank" rel="noreferrer">/m', $htmlSection9, $altopeurl);
            preg_match_all('/(<div class="title-wrapper">)\s+<a href="(.+)\s+(.+)\s+<\/a>/m', $htmlSection9, $altopetitle);
            preg_match_all('/(<div class="text">)(.+)<\/div>/m', $htmlSection9, $altopage);

            $imgaltope[0]; // 480w
            $altopeuf[0]; // todas uf
            $altopeprice[0]; //todos os prices
            $altopedec[0]; //todos os dec
            $altopetitle[0];
            $altopeurl[1];


}

if ($_COOKIE['anderson'] != null) {

    if (!$_COOKIE['filtro']) {

              $pagina09 = is_numeric($_COOKIE['pagina09']) ? $_COOKIE['pagina09'] : '1';

              if ($_COOKIE['aluguel']) {
                $op = '305';
              }else{
                $op = '307';
              }

              $current = $pagina09."/?sku&street&contract_type[0]=".$op."&price=100%3B50000000";

            $url8= "https://www.andersoncorretor10.com.br/properties/page/$current";
          }else{
            $pagina09 = is_numeric($_COOKIE['pagina09']) ? $_COOKIE['pagina09'] : '1';

            if($_COOKIE['filtro'] == 'chale'){
              $cp = '334';
            }

            if($_COOKIE['filtro'] == 'bangalo'){
              $cp = '353';
            }

            if($_COOKIE['filtro'] == 'chacara'){
              $cp = '334';
            }

            if($_COOKIE['filtro'] == 'sitio'){
              $cp = '334';
            }

            if($_COOKIE['filtro'] == 'flat'){
              $cp = '353';
            }

            if($_COOKIE['filtro'] == 'fazenda'){
              $cp = '332';
            }

            if($_COOKIE['filtro'] == 'casa'){
              $cp = '335';
            }

            if($_COOKIE['filtro'] == 'terreno'){
              $cp = '336';
            }

            if($_COOKIE['filtro'] == 'apartamento'){
              $cp = '353';
            }
            $pagina09 = is_numeric($_COOKIE['pagina09']) ? $_COOKIE['pagina09'] : '1';

            if ($_COOKIE['aluguel']) {
              $op = '305';
            }else{
              $op = '307';
            }


            $jp = "2/?contract_type[0]=".$op."&property_type[0]=335&price=100%3B50000000";

            $url8 = "https://www.andersoncorretor10.com.br/properties/page/$jp";
          }

            $html8 = file_get_contents($url8);

            $start8 = stripos($html8, '<div class="listing__param">');


            $end8 = stripos($html8, '<footer class="footer">', $offset8 = $start8);

            $length8 = $end8 - $start8;


           $htmlSection8 = substr($html8, $start8, $length8);

            preg_match_all('/<img (.+)/m', $htmlSection8, $andersonimg);
            preg_match_all('/(<div class="properties__intro">)\s+<p>(.+)<\/p>/m', $htmlSection8, $andersoninfo);
            preg_match_all('/(<div class="properties__offer-value">)\s+<strong>\s+(.+)\s+<\/strong>/m', $htmlSection8, $andersonprice);
            preg_match_all('/<a href="(.+)(class="properties__address ">)/m', $htmlSection8, $urlanderson);
            preg_match_all('/(<span class="properties__ribon">)(.+)<\/span>/m', $htmlSection8, $andersontipo);


}


if ($_COOKIE['graca'] != null) {

  if(!$_COOKIE['filtro']){


  $pagina08 = is_numeric($_COOKIE['pagina08']) ? $_COOKIE['pagina08'] : "1";

  if ($_COOKIE['aluguel']) {
    $op = 'RENT';
  }else{
    $op = 'SALE';
  }

  $complet = $pagina08.'/?filter-property-title&filter-id&filter-contract='.$op.'&filter-property-type&filter-location=48&filter-price-from=0&filter-price-to=100000000&filter-rooms&filter-beds&filter-baths&filter-garages&filter-sort-by=price';

$url7= "https://www.gracamedeirosimoveis.com.br/properties/page/$complet";
}else{
      if($_COOKIE['filtro'] == 'chale'){
        $cp = '102';
      }

      if($_COOKIE['filtro'] == 'bangalo'){
        $cp = '130';
      }

      if($_COOKIE['filtro'] == 'chacara'){
        $cp = '30';
      }

      if($_COOKIE['filtro'] == 'sitio'){
        $cp = '30';
      }

      if($_COOKIE['filtro'] == 'flat'){
        $cp = '18';
      }

      if($_COOKIE['filtro'] == 'fazenda'){
        $cp = '30';
      }

      if($_COOKIE['filtro'] == 'casa'){
        $cp = '40';
      }

      if($_COOKIE['filtro'] == 'terreno'){
        $cp = '30';
      }

      if($_COOKIE['filtro'] == 'apartamento'){
        $cp = '18';
      }
      $pagina08 = is_numeric($_COOKIE['pagina08']) ? $_COOKIE['pagina08'] : "1";

      if ($_COOKIE['aluguel']) {
        $op = 'RENT';
      }else{
        $op = 'SALE';
      }


      $xp = $pagina08."/?filter-contract=".$op."&filter-id&filter-property-title&filter-location=48&filter-property-type=".$cp."&filter-rooms&filter-baths&filter-beds&filter-garages&filter-price-from=0&filter-price-to=100000000";

  $url7 = "https://www.gracamedeirosimoveis.com.br/properties/page/$xp";
}

 $html7 = file_get_contents($url7);

$start7 = stripos($html7, '<div class="properties-archive-main-container">');


$end7 = stripos($html7, '<div class="wpb_text_column wpb_content_element ">', $offset7 = $start7);

$length7 = $end7 - $start7;

$htmlSection7 = substr($html7, $start7, $length7);
preg_match_all('/<span aria-current="page" class="page-numbers\s+current"><span class="meta-nav screen-reader-text">(.+)<\/span>/m', $html7, $pagegraca);
preg_match_all('/<a href="(.+)class="property-box-image-inner ">/m', $html7, $gracaurl);
preg_match_all('/<div class="infobox-content-price">(.+)<\/div>/m', $html7, $gracaprice);
preg_match_all('/<div class="infobox-content-body-area">(.+)²<\/strong><\/div>/m', $html7, $gracainfo01);
preg_match_all('/(class="property-box-image-inner ">)\s+(.+)/m', $html7, $gracaimg);
preg_match_all('/<div class="infobox-content-body-beds">(.+)<\/strong><\/div>/m', $html7, $gracainfo02);
preg_match_all('/(<div class="property-box-field">)\s+<div class="property-box-meta">\s+(<div class="field-item">)\s+(.+)\s+(<div class="field-item">)\s+(.+)                        <\/div>/m', $htmlSection7, $gracainfo03);
preg_match_all('/<a href="(.+)( class="property-box-image-inner ">)/m', $html7, $gracaurl);
preg_match_all('/(<div class="property-box-title">)\s+(<h3 class="entry-title">)(.+)\/">(.+)(<\/a><\/h3>)/m', $html7, $gracatitle);
  $gracaurl2 = array_slice($gracatitle[4],0,30);
}

if ($_COOKIE['adm'] !=null) {

if (!$_COOKIE['filtro']) {

  $pagina07 = is_numeric($_COOKIE['pagina07']) ? $_COOKIE['pagina07'] : '1';



        if ($_COOKIE['aluguel']) {
          $op = 'locacao';
        }else{
          $op = 'venda';
        }



  $ef="?cidade=Gravat%C3%A1&finalidade=".$op."&pag=".$pagina07;

$url10 = "https://www.admimoveisoficial.com.br/imovel/$ef";
}else{

  if($_COOKIE['filtro'] == 'chale'){
    $cp = 'casa-terrea';
  }

  if($_COOKIE['filtro'] == 'bangalo'){
    $cp = 'casa-terrea';
  }

  if($_COOKIE['filtro'] == 'chacara'){
    $cp = 'sitio-chacara';
  }

  if($_COOKIE['filtro'] == 'sitio'){
    $cp = 'sitio-chacara';
  }

  if($_COOKIE['filtro'] == 'flat'){
    $cp = 'flat';
  }

  if($_COOKIE['filtro'] == 'fazenda'){
    $cp = 'sitio-chacara';
  }

  if($_COOKIE['filtro'] == 'casa'){
    $cp = 'tipo=casa-em-condominio';
  }

  if($_COOKIE['filtro'] == 'terreno'){
    $cp = 'imovel-em-construcao';
  }

  if($_COOKIE['filtro'] == 'apartamento'){
    $cp = 'flat';
  }

    $pagina07 = is_numeric($_COOKIE['pagina07']) ? $_COOKIE['pagina07'] : '1';

    if ($_COOKIE['aluguel']) {
      $op = 'locacao';
    }else{
      $op = 'venda';
    }


    $wer = "?tipo=".$cp."&cidade=Gravat%C3%A1&finalidade=".$op."&pag=".$pagina07;

    $url10 = "https://www.admimoveisoficial.com.br/imovel/$wer";
}

  $html10 = file_get_contents($url10);

  $start10 = stripos($html10, '<section class="topsearch">');


  $end10 = stripos($html10, '<div class="assinatura">', $offset10 = $start10);

  $length10 = $end10 - $start10;

   $htmlSection10 = substr($html10, $start10, $length10);
  preg_match_all('/(<div class="row">)\s+<a href="(.+) (title=")/m', $htmlSection10, $urladm);
  preg_match_all('/<p class="imovelcard__valor__valor">(.+)<\/p>/m', $htmlSection10, $valoradm);
  preg_match_all('/<p class="imovelcard__info__ref">(.+)<\/p>/m', $htmlSection10, $admtitle);
  preg_match_all('/<h2 class="imovelcard__info__local">(.+)<\/h2>/m', $htmlSection10, $admlocal);
  preg_match_all('/<h2 class="imovelcard__info__tag">(.+)<\/h2>/m', $htmlSection10, $admtipo);
  preg_match_all('/(class="col imovelcard__img">)\s+<img src="(.+) alt="/m', $htmlSection10, $admimg);
  preg_match_all('/(<p class="topsearch__total">)(.+)<\/p>/m', $htmlSection10, $pageadm);

  //$urladmcon = "https://www.admimoveisoficial.com.br";
  $admtitle2 = array_map("utf8_encode", $admtitle[1]);
  $admlocal2 = array_map("utf8_encode", $admlocal[1]);
  $admtipo2 = array_map("utf8_encode", $admtipo[1]);

}

if ($_COOKIE['olx']) {

  if (!$_COOKIE['filtro']) {
    if ($_COOKIE['aluguel']) {
      $op = 'aluguel';
    }else{
      $op = 'venda';
    }

  $pagina11 = is_numeric($_COOKIE['pagina11']) ? $_COOKIE['pagina11'] : '1';

  $crt = $op."?o=".$pagina11."&q=gravatá";

$url11= "https://pe.olx.com.br/imoveis/$crt";
}else{

  if ($_COOKIE['aluguel']) {
    $op = 'aluguel';
  }else{
    $op = 'venda';
  }


  $pagina11 = is_numeric($_COOKIE['pagina11']) ? $_COOKIE['pagina11'] : '1';

    if($_COOKIE['filtro'] == 'casa'){
        $xp = 'casas';

            $crt = $op."/".$xp."?o=".$pagina11."&q=gravatá";

                $url11 = "https://pe.olx.com.br/imoveis/$crt";
    }

    if($_COOKIE['filtro'] == 'apartamento'||$_COOKIE['filtro']=='flat'){



  $crt = "?o=".$pagina11."&q=gravat%C3%A1";

          $url11 = "https://pe.olx.com.br/imoveis/aluguel/apartamentos$crt";

    }

}


   $html11 = file_get_contents($url11);



 preg_match_all('/class="kgl1mq-0 iYdPim sc-bdVaJa daxpJj" color="dark" font-weight="400">.{1,102}/m', $html11, $olxinfo);// utf8
 preg_match_all('/src=".{1,60} alt="/m', $html11, $olximg);
 preg_match_all('/aria-label="Preço do.{1,20}/m', $html11, $olxprice);
 preg_match_all('/aria-label="Localização:.{1,40}/m', $html11, $olxlocal); // utf 8
 preg_match_all('/enabled="false" href=".{1,150}/m', $html11, $olxurl);
 //preg_match_all('/<span color="#3387BB" class="sc-1koxwg0-2 eLGHiC sc-bdVaJa iUgLgp" font-weight="400">.{1,20}/m', $html11, $olxpage);
preg_match_all('/<span color="#3387BB" class="sc-1koxwg0-2 eLGHiC sc-bdVaJa iUgLgp" font-weight="400">.{2}<\/span><\/div><\/a><\/li><\/ul>/m', $html11, $olxpage);

//preg_match_all('/class="kgl1mq-0 iYdPim sc-bdVaJa daxpJj" color="dark" font-weight="400">(.+)<\/h2><\/div><div><\/div>/m', $html11, $olxinfo);
 $olxinfo02 = array_map("utf8_encode", $olxinfo[0]);
 $olxlocal02 = array_map("utf8_encode", $olxlocal[0]);
 $olxlurl02 = array_map("utf8_encode", $olxurl[0]);


 //var_dump($olxlurl02);
}



if ($_COOKIE['zap']) {
  if (!$_COOKIE['filtro']) {

  $pagina12 = is_numeric($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';

  if ($_COOKIE['aluguel']) {
    $op = 'aluguel';
  }else{
    $op = 'venda';
  }


  $ret = $op."/imoveis/pe+gravata/?onde=,Pernambuco,Gravat%C3%A1,,,,,CITY,BR%3EPernambuco%3ENULL%3EGravata&pagina=".$pagina12."&tipo=Im%C3%B3vel%20usado";

$url12 = "https://www.zapimoveis.com.br/$ret";
}else{

  if ($_COOKIE['aluguel']) {
    $op = 'aluguel';
  }else{
    $op = 'venda';
  }


    if ($_COOKIE['filtro'] == 'casa') {

      if ($_COOKIE['aluguel']) {
        $op = 'aluguel';
      }else{
        $op = 'venda';
      }

      $pagina12 = is_numeric($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';

      $uv = $op."/casas/pe+gravata/?onde=,Pernambuco,Gravat%C3%A1,,,,,city,BR%3EPernambuco%3ENULL%3EGravata,-8.204659,-35.570631&pagina=".$pagina12."&tipo=Im%C3%B3vel%20usado&tipoUnidade=Residencial,Casa";
      $url12 = "https://www.zapimoveis.com.br/$uv";
    }

    if ($_COOKIE['filtro'] == 'apartamento') {
      $pagina12 = is_numeric($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';

    $we =  $op."/apartamentos/pe+gravata/?pagina=".$pagina12."&tipoUnidade=Residencial,Apartamento&tipo=Im%C3%B3vel%20usado&onde=,Pernambuco,Gravat%C3%A1,,,,,city,BR%3EPernambuco%3ENULL%3EGravata,-8.204659,-35.570631";

      $url12 = "https://www.zapimoveis.com.br/$we";
    }

    if ($_COOKIE['filtro'] == 'flat' ) {

      $pagina12 = is_numeric($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';

        $vc = $op."/flat/pe+gravata/?onde=,Pernambuco,Gravat%C3%A1,,,,,city,BR%3EPernambuco%3ENULL%3EGravata,-8.204659,-35.570631&pagina=".$pagina12."&tipo=Im%C3%B3vel%20usado&tipoUnidade=Residencial,Flat";
      $url12 = "https://www.zapimoveis.com.br/$vc";
    }

    if ($_COOKIE['filtro'] == 'chacara'||$_COOKIE['filtro'] == 'terreno'||$_COOKIE['filtro'] == 'fazenda') {
      $pagina12 = is_numeric($_COOKIE['pagina12']) ? $_COOKIE['pagina12'] : '1';


      $we = $op."/fazendas-sitios-chacaras/?pagina=".$pagina12."&tipoUnidade=Residencial,Fazenda%20%2F%20S%C3%ADtio%20%2F%20Ch%C3%A1cara&tipo=Im%C3%B3vel%20usado";

      $url12 = "https://www.zapimoveis.com.br/$we";
    }
}

  $html12 = file_get_contents($url12);

preg_match_all('/<span class="simple-card__text text-regular">(.+)<\/span>/m', $html12, $zapinfo);
preg_match_all('/<p class="simple-card__price js-price color-darker heading-regular heading-regular__bolder align-left"><strong>\s+R.{1,25}/m', $html12, $zaprice);
preg_match_all('/<h2 ellipsis="true" ellipsis-lines="1" class="simple-card__address color-dark text-regular">\s+(.+)\s+<\/h2>/m', $html12, $zapbairros);
preg_match_all('/<span itemprop="floorSize">\s+(.+)\s+<!----><\/span>/m', $html12, $zapmetros);
preg_match_all('/<h1 size="small" class="js-summary-title summary__title heading-regular heading-regular__bold align-left text-margin-zero results__title">.{1,40}/m', $html12, $zapsaida);

}

if($_COOKIE['viva']){


  if(!$_COOKIE['filtro']){

  $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

  if ($_COOKIE['aluguel']) {
    $op = 'aluguel';
  }else{
    $op = 'venda';
  }

  $uf = $op."/pernambuco/gravata/?pagina=".$pagina13;

$url13 = "https://www.vivareal.com.br/$uf";

}
else{

  if ($_COOKIE['aluguel']) {
    $op = 'aluguel';
  }else{
    $op = 'venda';
  }

  if($_COOKIE['filtro'] == 'apartamento'){
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

    $uf = $op."/pernambuco/gravata/apartamento_residencial/?pagina=".$pagina13;

    $url13 = "https://www.vivareal.com.br/$uf";
  }
  if ($_COOKIE['filtro'] == 'casa') {
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';


    $url13="https://www.vivareal.com.br/aluguel/pernambuco/gravata/casa_residencial/?pagina=$pagina13";
  }
  if ($_COOKIE['filtro'] == 'chacara') {
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

    $uf = $op."/pernambuco/gravata/chacara_residencial/?pagina=".$pagina13;

    $url13 = "https://www.vivareal.com.br/$uf";
  }

  if ($_COOKIE['filtro'] == 'flat') {
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

    $uf = $op."/pernambuco/gravata/flat_residencial/?pagina=".$pagina13;

    $url13 = "https://www.vivareal.com.br/$uf";
  }

  if ($_COOKIE['filtro'] == 'sitio'||$_COOKIE['filtro'] =='fazenda') {
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

    $uf = $op."/pernambuco/gravata/granja_comercial/?pagina=".$pagina13;

    $url13 = "https://www.vivareal.com.br/$uf";
  }

  if ($_COOKIE['filtro'] == 'terreno') {
    $pagina13 = is_numeric($_COOKIE['pagina13']) ? $_COOKIE['pagina13'] : '1';

  $uf =  $op."/pernambuco/gravata/lote-terreno_residencial/?pagina=".$pagina13;

    $url13 = "https://www.vivareal.com.br/$uf";
  }
}


  $html13 = file_get_contents($url13);

preg_match_all('/span class="property-card__title js-cardLink js-card-title">.{1,60}/m', $html13, $vivainfo); //utf8
preg_match_all('/<p style="display: block;">.{1,15}/m', $html13, $vivaprice);
preg_match_all('/class="results-summary__count js-total-records">.{1,7}/m', $html13, $vivaresu); // total de resultaods
preg_match_all('/<span class="property-card__address">.{1,100}<\/span>/m', $html13, $vivarua);


$vivaresu02 = array_map("utf8_encode", $vivaresu[0]);

$vivarua02 = array_map("utf8_encode", $vivarua[0]);

$vivaprice02 = array_map("utf8_encode", $vivaprice[0]);



$vivainfo02 = array_map("utf8_encode", $vivainfo[0]);
}

        $json =['vivarua'=>$vivarua02, 'vivaprice'=>$vivaprice02,'vivainfo'=>$vivainfo02,'vivaresu'=>$vivaresu02,
        'zapsaida'=>$zapsaida[0],'zapmetros'=>$zapmetros[0],'zapbairros'=>$zapbairros[1],'zaprice'=>$zaprice[0],
        'zapinfo'=>$zapinfo[1],'olximg'=>$olximg[0],'olxpage'=>$olxpage[0],'olxurl'=>$olxlurl02,
        'olxlocal'=>$olxlocal02,'olxinfo'=>$olxinfo02,'olxprice'=>$olxprice[0],'altopage'=>$altopage[2],
        'andersonimg'=>$andersonimg[1],'andersoninfo'=>$andersoninfo[2],'pageadm'=>$pageadm[0],
        'admtipo'=>$admtipo2,
        'admimg'=>$admimg[2],
        'admlocal'=>$admlocal2,'admtitle'=>$admtitle2,'admprice'=>$valoradm[1],'admurl'=>$urladm[2],'title'=>$v,
        'decri'=>$v01, 'price'=>$v03, 'uf'=>$v04,
      'lucimg'=>$tr3, 'lucititle'=>$outputitle[0], 'lucidecri'=>$ludecri[0],
      'ludref'=>$ludref[0], 'ludeprice'=>$ludeprice[0], 'antoimg'=>$output_antoimg[1], 'antodecri'=>$decriantonio[0],'txtanto'=>$output_anto[0],
      'antoinfo'=>$antoinfo[1], 'antopage'=>$outpage[0], 'marciotitle'=>$v0, 'marciodec'=>  $v010,
      'marcioprice'=> $v030, 'marciouf'=>$v040, 'marciospan'=>  $v050, 'marcioimg'=>$tr0, 'marcioinfo'=>$outputurl0[1]
      , 'rabeloimg'=>$tri05, 'rabeloprice'=>$outputprice[1],'rabelourl'=>$rabelourl[1], 'rabelodecri'=>$rabelodecri[2],
    'url'=>$tr6, 'paget'=>$v05, 'ludepage'=> $ludepage[1], 'mariainfo'=>$outputurl[1], 'ludeinfo'=>$outputlude[1], 'rabelopage'=>$rabelopage[1], 'rabeloinfo'=>$rabeloinfo[2],
    'intem'=>$intem, 'tipos'=>$c, 'cod'=>$t, 'olgainfo'=>$olgainfo[1], 'nomes'=>$listItems, 'dec'=>$dec1, 'olga'=>$urlolga,
  'page'=>$page, 'imgaltope'=>$imgaltope[0], 'altopeuf'=>$altopeuf[3], 'altopeprice'=>$altopeprice[5], 'altopetitle'=>$altopetitle[3],
'altopeurl'=>$altopeurl[2],'andersonprice'=>$andersonprice[2], 'urlanderson'=>$urlanderson[1],
'andersontipo'=>$andersontipo[2], 'pagegraca'=>$pagegraca[1], 'gracaurl'=>$gracaurl[1],
'gracaprice'=>$gracaprice[1], 'gracainfo'=>$gracainfo01[1],'gracaimg'=>$gracaimg[2], 'gracabeds'=>$gracainfo02[0],
'gracaquartos'=>$gracainfo03[0], 'gracaurl'=>$gracaurl[1], 'gracatitle'=>$gracaurl2, 'localadm'=>$arr];

        echo json_encode([

                    $json
                ]);


}

}

$obj = new api();

echo $obj;
?>
