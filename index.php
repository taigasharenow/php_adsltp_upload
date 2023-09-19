<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página Principal</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files">
        <input type="submit" name="manda" value="Enviar">
    </form>

    <?php

        if (isset($_POST['manda'])) {

            function mover($arquivo){
                move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
            }
            
            //ARQUIVO
            $arquivo = $_FILES['files'];
            $nomeArquivo = explode('.', $arquivo['name']);
            $tipoArquivo = $nomeArquivo[sizeof($nomeArquivo)-1];

            //PATH
            $path = "uploads/" . $arquivo['name'];

            //EXTENSÕES
            $listaExt = ['jpg', 'pdf', 'bmp'];
            
            /*exibir lista
            foreach($listaExt as $l) {
                echo "$l <br>";
            }
            */ //final exibir lista
            // echo "$tipoArquivo <br>"; //verificar, SE o tipo de arquivo é o correto

            if (!(in_array($tipoArquivo, $listaExt))) {
                die("tipo de arquivo não suportado");

            } elseif($tipoArquivo == $listaExt[0]) {
                mover($arquivo);
                echo "<img src='$path'>";

            } elseif ($tipoArquivo == $listaExt[1]) {
                mover($arquivo);
                echo "<a href='$path' />" . "LINK arquivo" . "</a>";

            } elseif ($tipoArquivo == $listaExt[2]) {
                mover($arquivo);
                echo "<img src='$path'>";

            } else {
                echo "Inesperado";

            }
        }
    ?>

</body>
</html>