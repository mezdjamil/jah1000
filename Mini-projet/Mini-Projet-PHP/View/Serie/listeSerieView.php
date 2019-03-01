
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>

    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../Vues/Css/style.css"> -->
</head>

<body>

<div class="container">
    <h1 class="unTitre">Series</h1>
    <form action="ajoutSerie.php" method="post" class="text-center">
        <input type="submit" value="Nouvelle Série" class="btn btn-outline-dark"><br>
        <a href="../Episode/listeEpisode.php"><h3>Episodes</h3></a>
    </form>
    <?php echo @$model; ?>
    
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../Vues/Js/outils.js"></script>
</body>

</html>