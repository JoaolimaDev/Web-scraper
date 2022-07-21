<style media="screen">
body{
    background: url(images/prefeitura.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50px 150px;
    justify-content: center;
    margin-top:40px;
    display: grid;
}
</style>
<?php
session_start();

if (isset($_SERVER['PHP_AUTH_USER'])||isset($_SERVER['PHP_AUTH_PW'])) {
        echo "<br /><h4>Sistema Web scraper PMG</h4>";
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
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
        setcookie("filtro","", time()-3600, $cookiePath);
        setcookie("aluguel","", time()-3600, $cookiePath);










        unset($_COOKIE['maria']);
        unset($_COOKIE['altope']);
        unset($_COOKIE['anderson']);
        unset($_COOKIE['olga']);
        unset($_COOKIE['luciana']);
        unset($_COOKIE['antonio']);
        unset($_COOKIE['marcio']);
        unset($_COOKIE['rabelo']);
        unset($_COOKIE['adm']);
        unset($_COOKIE['graca']);
        unset($_COOKIE['olx']);
        unset($_COOKIE['filtro']);
        unset($_COOKIE['aluguel']);







        setcookie("pagina","", time()-3600, $cookiePath);
        setcookie("pagina02","", time()-3600, $cookiePath);
        setcookie("pagina03","", time()-3600, $cookiePath);
        setcookie("pagina06","", time()-3600, $cookiePath);
        setcookie("pagina05","", time()-3600, $cookiePath);
        setcookie("pagina04","", time()-3600, $cookiePath);
        setcookie("pagina07","", time()-3600, $cookiePath);
        setcookie("pagina08","", time()-3600, $cookiePath);
        setcookie("pagina09","", time()-3600, $cookiePath);
        setcookie("pagina10","", time()-3600, $cookiePath);
        setcookie("pagina11","", time()-3600, $cookiePath);









        unset($_COOKIE['pagina']);
        unset($_COOKIE['pagina02']);
        unset($_COOKIE['pagina03']);
        unset($_COOKIE['pagina06']);
        unset($_COOKIE['pagina05']);
        unset($_COOKIE['pagina04']);
        unset($_COOKIE['pagina07']);
        unset($_COOKIE['pagina08']);
        unset($_COOKIE['pagina09']);
        unset($_COOKIE['pagina10']);
        unset($_COOKIE['pagina11']);



        echo "<h3>Deslogado........</h3>";
       $page = 'http://localhost/projeto/index.php';

      $sec = "1";
      header("Refresh: $sec; url=$page");
      exit();
    }


    if (!isset($_SERVER['PHP_AUTH_USER'])&&!isset($_SERVER['PHP_AUTH_PW'])) {
      $page = 'http://localhost/projeto/index.php';
     $sec = "1";
     header("Refresh: $sec; url=$page");
     exit();
    }
 ?>
