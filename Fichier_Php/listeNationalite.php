<?php 

include "header.php "; 

include "connexionPDO.php "; 
echo "<div class='container mt-5 mb-3'>";
@$action = $_GET['action'];

// Création req nationalite
$libelle = "";
$continentSel = "tous";

$texteReq = "select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num";

if(!empty($_GET)){

  $libelle = $_GET['libelle'];
  $continentSel = $_GET['continent'];

  if($libelle != ""){ $texteReq.= " and n.libelle like '%" . $_GET['libelle']."%'";}
  if($continentSel != "tous"){ $texteReq.= " and c.num =" .$continentSel;}

}

$texteReq.= " order by n.libelle";


$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();

// Liste continents

$reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents=$reqContinent->fetchAll();

if(!empty($_SESSION['message'])){

  $mesMessages=$_SESSION['message'];
  foreach($mesMessages as $key=>$message){

    echo '<div class="container pt-5">
    
        <div class="alert alert-' .$key. ' alert-dismissible fade show" role="alert">
            ' .$message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
 
    ';

  }

  $_SESSION['message']=[];


}

?>

    <div class="row pt-5">
        <div class="col-9"> <h2> Liste des Nationalités </h2>    </div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><img src="../Images/plus-circle.svg" width="20" ><i class="fas fa-plus-circle"></i> Créer une nationalité</a> </div>

    </div>

 


  <form action="" method="get" class="border border-primary rounded p-3">

  <div class="row">

    <!-- FORM -->
      <div class="col">

        <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle"  value= "<?php $libelle; ?>">
         
      </div>
 
      <div class="col">
      <select name="continent" class="form-control">
            <?php      
            
            echo " 
                <option value='tous'> Tous les continents</option>
                
                ";
            
            foreach($lesContinents as $continent){
                
                $selection = $continent->num == $continentSel ? 'selected' : '';
                echo " 
                <option value='$continent->num' $selection> $continent->libelle</option>
                
                ";
            
            }
            ?>

            </select>
      </div>
      <!-- BUTTON -->
      <div class="col">
            
        <button type="submit" class="btn btn-success btn-block">Rechercher</button>

      </div>

  </div>

  </form>

</div>

<!-- Tableaux -->
<div class="container mt-5">

<table class="table table-hover table-dark">
    <thead>
      <tr>
        <td class="col-md-2"><strong>Numéro</strong></td>
        <td class="col-md-4"><strong>Libellé</strong></td>
        <td class="col-md-3"><strong>Continent</strong></td>
        <td class="col-md-2"><strong>Actions</strong></td>
      </tr>
    </thead>

<?php

// Afficher la requête nationalite

foreach($lesNationalites as $nationalite)

  {

  echo "<tr>";
  echo "<td>$nationalite->num</td>";
  echo "<td>$nationalite->libNation</td>";
  echo "<td>$nationalite->libContinent</td>";
  echo"
 
  <td>
    <a href='formNationalite.php?action=Modifier&num=$nationalite->num'class='btn btn-success'><img src='../images/modifier.svg'>
    
    </a>
    
    <a href='#modalSupp' data-toggle='modal'data-message='êtes-vous sûr de vouloir supprimer cette nationalité ?' data-supp='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><img src='../Images/supp.svg'><i class='fas fa-plus-circle'></i></a>
      
      
    </a>
    
    </td>
    </tr>
    
    ";
    
  }

  ?>
  </table>
</div>
<br>
<div class="dialecte">

      
  
</div>

<?php include "footer.php"; 
?>