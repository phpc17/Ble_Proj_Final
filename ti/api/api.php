<?php
 header('Content-Type: text/html; charset=utf-8');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     echo "recebido um POST";

 }elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "recebido um GET";
    } else {
        echo "metodo nao permitido";
}
 ?>