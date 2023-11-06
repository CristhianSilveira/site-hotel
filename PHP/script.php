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
    $host = "localhost:3306";
    $username = "root";
    $password = "";

    try{
        // CONEXÃO COM O BANCO DE DADOS
        $pdo = new PDO("mysql:host=$host;", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // CRIANDO DATABASE
        $pdo->exec("CREATE DATABASE IF NOT EXISTS hotel");
        $pdo->exec("USE hotel");
        
        // CRIANDO TABELA CASO NÃO EXISTA
        $pdo->exec("CREATE TABLE IF NOT EXISTS reserva (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            sobrenome VARCHAR(255) NOT NULL,
            dt_chegada date NOT NULL,
            dt_saida date NOT NULL,
            qntd_dias int NOT NULL,
            quarto VARCHAR(255) NOT NULL,
            adultos int,
            criancas int
        )");
    } catch (PDOException $e) {
        die("Falha na conexão: " . $e->getMessage());
    }

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST["name"];
        $sobrenome = $_POST["sname"];
        $nomeCompleto = $nome ." ".$sobrenome;
        
        $chegada = $_POST["cheg"];
        $saida = $_POST["saida"];
        
        $date1 = new DateTime($saida);
        $date2 = new DateTime($chegada);
        $totTempo = $date1 -> diff($date2);
        $dia = $totTempo->d;

        $adultos = $_POST["hospA"];
        $criancas = $_POST["hospC"];
        $quarto = $_POST["quarto"];  

        // ADICIONANDO AS VARIÁVEIS DO FORM NO BD
        $sql = $pdo->prepare("INSERT INTO reserva (nome, sobrenome, dt_chegada, dt_saida, qntd_dias, quarto, adultos, criancas) VALUES (:nome, :sobrenome, :dt_chegada, :dt_saida, :qntd_dias, :quarto, :adultos, :criancas)");

        $sql->execute(['nome' => $nome, 'sobrenome'=> $sobrenome, 'dt_chegada' => $chegada, 'dt_saida' => $saida, 'qntd_dias' => $dia, 'quarto' => $quarto, 'adultos' => $adultos, 'criancas' => $criancas]);

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
        <button onclick="window.location.href='../HTML/index.html'">Voltar</button>
    </div>
</body>

</html>