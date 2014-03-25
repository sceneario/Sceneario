<?php

class Zend_View_Helper_WriterDashBoardWidget
{
	
	public function writerDashBoardWidget($idAlbum, $idSerie = null)
	{
	
		if(Zend_Registry::isRegistered('currentUserID')){
			
			$userId = Zend_Registry::get('currentUserID') ;
			$tblUserV6Mapper = new Core_Model_Mapper_TbluserV6();
			$userV6 = $tblUserV6Mapper->find($userId, new Core_Model_TbluserV6());
			$privileges = $userV6->getUserprivileges();
			
			//0:utilisateur, 1:redacteur, 2:admin, 3:superuser
			
		 
			
			if( $privileges == 1 || $privileges == 2 || $privileges == 3  ){
				if( '' !== $idSerie){
					$linkModSerie = <<<HTML
						<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idSerie&action=saisie&type=serie">
							<img src="http://v5.sceneario.com/images/pictos/admin_serie.gif" alt="(S)" />
						</a>
HTML;
				}else{
					$linkModSerie = '';
				}
				
				echo <<<HTML
				
				<p style = "background:#FFFFFF;text-align:center;padding:10px;border-radius:5px 5px 5px 5px;">
					 
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=saisie&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_fiche.gif" alt="(F)" />
					</a>
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=saisieresume&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_resume.gif" alt="(R)" />
					</a>
					
					$linkModSerie
					
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=modifmotclef&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_motscle.gif" alt="(M)" />
					</a>
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=saisieextrait&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_planche.gif" alt="(P)" />
					</a>
					 
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=pluscoeur&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_ccoeur.gif" alt="(cc)" />
					</a>
					<a href="http://admin.sceneario.com/ActionBase.php?idObjet=$idAlbum&action=plusprix&type=album">
						<img src="http://v5.sceneario.com/images/pictos/admin_prix.gif" alt="(pr)" />
					</a>
				</p>
HTML;
			}
		}
 
	}
}