<style media="screen">
body{
    background: url(images/prefeitura.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50px 150px;
    justify-content: center;
    display: grid;
    margin-top:40px;
}
</style>
<body>

<?php
session_start();
if (!isset($_SERVER['PHP_AUTH_USER'])&&!isset($_SERVER['PHP_AUTH_PW'])) {
  echo "<br /><h4>Sistema Web scraper PMG</h4>";
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        echo "Insira sua credencial";
        echo "<br> Reinicie a página apertando F5 para o carregamento do formulário!";
        exit();
    }
      $arr = ["DANILO", "OTAVIANO", "GERMANO", "LETICIA", "MARIVALDO"];
      $token = $_SERVER['PHP_AUTH_PW'];

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

      if ($signature == $valid) {

              if ($_SERVER['PHP_AUTH_USER'] = $arr) {

                  $page = 'http://localhost/projeto/web.php';

                    $sec = "1";
                    header("Refresh: $sec; url=$page");


          }else {
          echo "<br /><h4>Sistema Web scraper PMG</h4>";
          header("WWW-Authenticate: Basic realm=\"Private Area\"");
          header("HTTP/1.0 401 Unauthorized");
          echo "Credencial inválida";
          echo "<br> Reinicie a página apertando F5 para o carregamento do formulário!";
          exit();
      }
            }else {
            echo "<br /><h4>Sistema Web scraper PMG</h4>";
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            echo "Credencial inválida";
            echo "<br> Reinicie a página apertando F5 para o carregamento do formulário!";
            exit();
        }


 ?>
</body>
