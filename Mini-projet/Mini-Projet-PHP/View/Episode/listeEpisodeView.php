
 <!-- <?php include("../Header/header.php"); ?>  -->

 <div class="container">
    <h1 class="unTitre">Episodes</h1>
    <form action="ajoutEpisode.php" method="post" class="text-center">
        <input type="submit" value="Nouvel épisode" class="btn btn-outline-dark"><br>
    </form>
    <?php echo @$model; ?>
    
</div>





