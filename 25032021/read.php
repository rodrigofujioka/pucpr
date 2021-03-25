<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM funcionario WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        $param_id = trim($_GET["id"]);
        

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Busca a linha de resultado como uma matriz associativa. Desde o conjunto de resultados
                contém apenas uma linha, não precisamos usar o loop while */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


                // Recupere o valor do campo individual
                $name = $row["name"];
                $address = $row["address"];
                $salary = $row["salary"];
            } else{
                //URL não contém parâmetro de id válido. Redirecionar para a página de erro
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Ups! Algo deu errado. Por favor, tente novamente mais tarde";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL não contém o parâmetro id. Redirecionar para a página de erro
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualizar registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Visualizar registro</h1>
                    <div class="form-group">
                        <label>Nome</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salário</label>
                        <p><b><?php echo $row["salary"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>