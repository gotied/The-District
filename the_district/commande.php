<?php
include("header.php");
require("db.php");
require("DAO.php");

$myPlat = commande_de_plat();
?>
<div class="d-flex flex-wrap justify-content-center">
<h1 id="titre_h1-2">Commande du plat n°<?= $myPlat->id; ?></h1>
</div>
<br>
<br>
<div class="d-flex flex-wrap justify-content-center">
<div class="card my-5 pt-3 px-2 mx-5 col-3" style="width: 25rem;" id="card-body2">
  <img src="images_the_district/food/<?= $myPlat->image ?>" class="card-img-top" alt="<?= $myPlat->libelle ?>" height="70%">
  <div class="card-body">
    <h5 class="card-title" id="card-text"><?= $myPlat->libelle ?></h5>
    <p class="card-text" id="card-text"><?= $myPlat->description ?><br><br>Prix : <?= $myPlat->prix ?>€</p>
  </div>
</div>

    <div class="card my-5 pt-3 px-2 mx-5 col-3" style="width: 25rem;" id="card-commande">
    <div class="card-body">
    <h5 class="card-title" id="card-text">Vos informations : </h5>
    <p class="card-text"> 
    <form action ="script_commande.php" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="id_plat" value="<?= $myPlat->id ?>">
    <input type="hidden" name="libelle" value="<?= $myPlat->libelle ?>">
    <label for="titre">Votre nom & prénom : </label><br>
    <input type="text" name="nom" id="nom" value="" required>
    <label for="tel">Numéro de téléphone : </label><br>
    <input type="text" name="tel" id="tel" value="" required>
    <label for="email">Adresse mail : </label><br>
    <input type="email" name="email" id="email" value="" required>
    <label for="label">Adresse postal : </label><br>
    <input type="text" name="adresse" id="adresse" value="" required><br><br>
    <label for="quantite"></label>
    <select name="quantite" id="quantite" required>
    <option value="">-- Choisissez une quantité --</option>
    </select>
    <script>
        var quantiteSelect = document.getElementById("quantite");
        for (var i = 1; i <= 50; i++) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        quantiteSelect.add(option);
        }
    </script>
    <br><label for="Prix">Prix :</label><br>
    <input type="text" id="Prix" name="Prix" value="<?= $myPlat->prix ?>" readonly>
    <script>
        var prixElement = document.getElementById("Prix");
        var prixInitial = prixElement.value;
        var numbersElement = document.getElementById("quantite");
        numbersElement.addEventListener("change", function() {
        var quantite = numbersElement.value;
        if (quantite !== "1") {
            var total = parseFloat(prixInitial) * parseInt(quantite);
            prixElement.value = total.toFixed(2);
            } else {
                prixElement.value = prixInitial;
            }
        });
    </script>
    <br><br>
    <input type="reset" value="Annuler" id="btn-style-2"><br><br>
    <input class="btn" type="submit" value="Commander" id="btn-style">
    </form>
    </p>
    </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-center">
<a class="btn btn-primary" href="accueil.php" id="btn-style">Retour à l'accueil</a>
</div>
<?php include("footer.php"); ?>