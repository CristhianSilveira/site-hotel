<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Concluída</title>
    <link rel="stylesheet" href="../CSS/php.css">
</head>

<body>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $nome = $_GET["name"];
        $sobrenome = $_GET["sname"];
        $nomeCompleto = $nome . " " . $sobrenome;
        
        $chegada = $_GET["cheg"];
        $saida = $_GET["saida"];
        
        $date1 = new DateTime($saida);
        $date2 = new DateTime($chegada);
        $totTempo = $date1 -> diff($date2);
        $dia = $totTempo->d;

        $adultos = $_GET["hospA"];
        $criancas = $_GET["hospC"];
        $quarto = $_GET["quarto"];  
    }
    ?>

    <div class="reserva">
        <h1>Reserva Realizada</h1>

        <div class="info">
            <p>Seu nome completo é: <strong><?php echo ucwords($nomeCompleto)?></strong></p>
            <p>Data de Check-in: <strong><?php echo $chegada ?></strong></p>
            <p>Data de Check-out: <strong><?php echo $saida ?></strong></p>
            <p>Quantidade de dias: <strong><?php echo $dia?></strong></p>
            <p>Quantidade de Adultos: <strong><?php echo $adultos ?></strong></p>
            <p>Quantidade de Crianças:<strong> <?php echo $criancas ?></strong></p>
            <p>Quarto Escolhido: <strong><?php echo ucfirst($quarto) ?></strong></p>
        </div>
    </div>
</body>

</html>