<?php
    $path_root_sceneario = "/home/sceneari/v5/";
    define('IN_PAGE', true);
    include_once ($path_root_sceneario . "includes/Util.php");
    //include_once ($path_root_sceneario . "/includes/Anti_aspi.php");

    $isbn = 0;
    $idAlbum = 0;
    $format = 'F0';
    
    if (isset($_GET['isbn']))
        $isbn    = strtoupper($_GET['isbn']);
    
    if (isset($_GET['idAlbum']))
        $idAlbum = $_GET['idAlbum'];
    
    if (isset($_GET['format'])) 
        $format  = $_GET['format'];

    $repertoire_couv = "images/couvertures/";

    if ($idAlbum != 0)
    {
        $connexion = Connexion (NOM, PASSE, BASE, SERVEUR);
        $requete   = "SELECT isbn FROM tbl_Album WHERE idAlbum=".$idAlbum;
        $resultat  = ExecRequete($requete, $connexion);
        $album     = LigneSuivante($resultat);
        $isbn      = $album->isbn;
    }

    // r�cup�ration du format
    $format = substr($format, 1);
    ($format > 0) ? $format = "F$format/" : $format = "";

    // test du fichier
    $file = $repertoire_couv."$format".$isbn.".jpg";
    if (!file_exists($file)) {
        $file = $repertoire_couv."$format"."defaut.jpg";
    }

		
if (isset($userdata['espace_ludique'])
&& $userdata['espace_ludique'] == 1
&& $userdata['nb_couv_visus'] <= 10
&& $format == '')
{

    // Mise � jour du nombre de visu
    $requete = "UPDATE tbl_Member_Info SET nb_couv_visus = nb_couv_visus + 1 WHERE user_id = '".$userdata['user_id']."'";
    $resultat = ExecRequete ($requete, $connexion);


    $requete = "SELECT idAlbum as isbn FROM tbl_Member_Jeu_Param WHERE date <=  CURDATE() AND idjeu='COUV' ORDER BY date DESC LIMIT 1";
    $resultat = ExecRequete ($requete, $connexion);
    if (mysql_num_rows($resultat) == 1)
    {
            $album = LigneSuivante($resultat);
            $isbnalbumjeu = $album->isbn;
    }
    if ($isbnalbumjeu == $isbn)
    {
        // on a trouve la bonne couverture
        $requete = "SELECT * FROM tbl_Member_Jeu_Reponses WHERE user_id='".$userdata['user_id']."' AND date=CURDATE() AND idjeu='COUV'";
        $resultat = ExecRequete ($requete, $connexion);
        if (mysql_num_rows($resultat) == 0)
        {
            // gagn�!!! la couverture � �t� trouv�e
            $requete = "INSERT INTO tbl_Member_Jeu_Reponses (user_id, date, idjeu, idAlbum, date_reponse)"
            .  " VALUES ('".$userdata['user_id']."',CURDATE(),'COUV','$isbn',NOW())";
            $resultat = ExecRequete ($requete, $connexion);

            // On recherche une autre couv
            $dir2read = opendir($path_root_sceneario . "27f291c7d6584ba7b10f1c88097430e1/F1"); 
            $i = 0;
            while ($File = readdir($dir2read)){ 
                  if ($File != "." && $File != ".." && is_file($path_root_sceneario . "27f291c7d6584ba7b10f1c88097430e1/F1/".$File) )
                  { 
                    if (substr($File,0,1) <> '_')
                            {
                                    $listefile[$i]['isbn'] = explode(".", $File);
                                    $i++;
                            }
                  } 
            } 
            closedir($dir2read); 

            $num = GenNbAleatoire (1,$i);
            $requete = "INSERT INTO tbl_Member_Jeu_Param (date, idjeu, idAlbum)"
                    .  " VALUES (CURDATE(),'COUV','".$listefile[$num]['isbn'][0]."')";
            $resultat = ExecRequete ($requete, $connexion);

        }
    }
}

// affichage de l'image
header("Content-type: image/jpeg");
$ima = @imagecreatefromjpeg($file);
imagejpeg($ima);

?>
