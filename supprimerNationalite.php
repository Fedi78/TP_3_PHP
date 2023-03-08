

    <?php include "header.php";
    include "connexionPdo.php";
    $num=$_GET['num'];


    $req=$monPdo->prepare("delete from nationalite where num = :num");
    $req->bindParam(':num' , $num);
    $nb=$req->execute();


if($nb == 1) {
    $_SESSION['message']=["success"=>"La Nationalité a été supprimée"];
}else{
      $_SESSION['message']=["danger"=>"La Nationalité n'a pas été supprimée"];
}
header('location: listeNationalite.php');
exit();

?>