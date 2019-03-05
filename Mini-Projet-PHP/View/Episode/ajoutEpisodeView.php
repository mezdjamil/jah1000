
<form action="" method="post">

<label>Nom de l'épisode : </label>
<input type="text" name="NOM_DE_L_EPISODE"> <br><br>

<select name="serie" >
                                        <option value="rien" selected="" disabled="">---Choisir le série---</option>
                                            <?php echo $listeSerie; ?>
                                        </select><br><br>


<button type="submit">Enregistrer</button>

</form>