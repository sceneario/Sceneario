

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Affectation_Services`
--

CREATE TABLE IF NOT EXISTS `tbl_Affectation_Services` (
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `pseudo` varchar(40) NOT NULL default '',
  `idService` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idInternaute`,`idService`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Album`
--

CREATE TABLE IF NOT EXISTS `tbl_Album` (
  `idAlbum` int(11) NOT NULL auto_increment,
  `titre` varchar(80) NOT NULL default '',
  `collection` varchar(80) default NULL,
  `sousTitre` varchar(40) NOT NULL default '',
  `tome` varchar(5) default NULL,
  `couverture` varchar(100) default NULL,
  `droits` text,
  `enligne` char(1) NOT NULL default 'N',
  `nouveaute` char(1) NOT NULL default 'N',
  `FKidEditeur` int(11) default NULL,
  `datecreation` date NOT NULL default '0000-00-00',
  `idCollection` int(11) default NULL,
  `lienBDNet` varchar(80) default NULL,
  `lienAmazon` varchar(80) default NULL,
  `idCouv` smallint(5) unsigned NOT NULL default '0',
  `isbn` varchar(13) NOT NULL default '0',
  `extrait` varchar(100) default NULL,
  `idSerie` int(11) unsigned default '0',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `idUnivers` int(11) unsigned default NULL,
  `presse` tinyint(1) NOT NULL default '0',
  `topic_id` mediumint(8) unsigned default NULL,
  `nbpages` smallint(3) unsigned NOT NULL default '0',
  `visites` int(11) NOT NULL default '0',
  `visitesSemaine` int(11) NOT NULL default '0',
  `recommande` tinyint(1) NOT NULL default '0',
  `bandeAnnonce` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`idAlbum`),
  KEY `datecreation` (`datecreation`),
  KEY `nouveaute` (`nouveaute`),
  KEY `idSerie` (`idSerie`),
  KEY `idUnivers` (`idUnivers`),
  KEY `FKidEditeur` (`FKidEditeur`),
  KEY `idCollection` (`idCollection`),
  KEY `isbn` (`isbn`),
  KEY `lienAmazon` (`lienAmazon`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18324 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Albums_Dossier`
--

CREATE TABLE IF NOT EXISTS `tbl_Albums_Dossier` (
  `idDossier` varchar(10) NOT NULL default '',
  `idAlbum` int(11) NOT NULL default '0',
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idDossier`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des liens auteurs interview';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Albums_Map`
--

CREATE TABLE IF NOT EXISTS `tbl_Albums_Map` (
  `idLieu` int(11) unsigned NOT NULL auto_increment,
  `idAlbum` int(11) NOT NULL default '0',
  `adresse` varchar(100) NOT NULL default '',
  `pays` varchar(50) NOT NULL default '',
  `latitude` varchar(20) NOT NULL default '',
  `longitude` varchar(20) NOT NULL default '',
  `epoque` char(1) NOT NULL default 'M' COMMENT 'P passÃ©, M Maintenant, F Futur',
  PRIMARY KEY  (`idLieu`),
  KEY `epoque` (`epoque`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tables des localisations' AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Albums_Prix`
--

CREATE TABLE IF NOT EXISTS `tbl_Albums_Prix` (
  `idAlbum` int(11) NOT NULL default '0',
  `idPrix` smallint(4) unsigned NOT NULL default '0',
  `annee` smallint(4) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`idAlbum`,`idPrix`),
  KEY `idPrix` (`idPrix`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des prix gagnés par les albums';

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tbl_Album_id`
--
CREATE TABLE IF NOT EXISTS `tbl_Album_id` (
`idAlbum` int(11)
);
-- --------------------------------------------------------

--
-- Structure de la table `tbl_Album_Prov`
--

CREATE TABLE IF NOT EXISTS `tbl_Album_Prov` (
  `idAlbum` int(11) NOT NULL auto_increment,
  `titre` varchar(80) NOT NULL default '',
  `collection` varchar(80) NOT NULL default '',
  `tome` varchar(5) default NULL,
  `couverture` varchar(100) default NULL,
  `droits` text,
  `datecreation` date NOT NULL default '0000-00-00',
  `histoire` text,
  `histoire2` text,
  `critique` text,
  `pseudo` varchar(40) NOT NULL default '',
  `dessinateur` text NOT NULL,
  `scenariste` text NOT NULL,
  `coloriste` text NOT NULL,
  `coupdecoeur` char(1) NOT NULL default '',
  `valide` char(1) NOT NULL default 'N',
  `editeur` text NOT NULL,
  `collection_ed` varchar(80) NOT NULL default '',
  `lienBDNet` varchar(80) default NULL,
  `lienAmazon` varchar(80) default NULL,
  `idCouv` smallint(5) unsigned NOT NULL default '0',
  `isbn` varchar(13) NOT NULL default '0',
  `extrait` varchar(100) default NULL,
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `idSerie` int(11) unsigned default NULL,
  `idType` tinyint(1) NOT NULL default '0',
  `idCollection` int(11) default NULL,
  `motsclef` varchar(100) default NULL,
  `idUnivers` int(11) unsigned default NULL,
  `univers` varchar(80) NOT NULL default '',
  `presse` tinyint(1) NOT NULL default '0',
  `bandeAnnonce` varchar(150) NOT NULL default '',
  PRIMARY KEY  (`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8311 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Auteurs`
--

CREATE TABLE IF NOT EXISTS `tbl_Auteurs` (
  `idAuteur` int(11) NOT NULL auto_increment,
  `nomAuteur` varchar(40) NOT NULL default '',
  `prenomAuteur` varchar(40) default NULL,
  `adrWebAuteur` varchar(255) default NULL,
  `adrMailAuteur` varchar(40) default NULL,
  `biographie` text,
  `bibliographie` text,
  `scenariste` char(1) NOT NULL default 'N',
  `coloriste` char(1) NOT NULL default 'N',
  `dessinateur` char(1) NOT NULL default 'N',
  `dateNaissance` date default NULL,
  `coordonnees` text NOT NULL,
  PRIMARY KEY  (`idAuteur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7849 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Auteurs_Albums`
--

CREATE TABLE IF NOT EXISTS `tbl_Auteurs_Albums` (
  `idAlbum` int(11) NOT NULL default '0',
  `idAuteur` int(11) NOT NULL default '0',
  `cdRole` char(1) NOT NULL default '',
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idAlbum`,`idAuteur`,`cdRole`),
  KEY `idAuteur` (`idAuteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Auteurs_Dossier`
--

CREATE TABLE IF NOT EXISTS `tbl_Auteurs_Dossier` (
  `idDossier` varchar(10) NOT NULL default '',
  `idAuteur` int(11) NOT NULL default '0',
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idDossier`,`idAuteur`),
  KEY `idAuteur` (`idAuteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des liens auteurs interview';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Auteurs_Interview`
--

CREATE TABLE IF NOT EXISTS `tbl_Auteurs_Interview` (
  `idInterview` varchar(5) NOT NULL default '',
  `idAuteur` int(11) NOT NULL default '0',
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idInterview`,`idAuteur`),
  KEY `idAuteur` (`idAuteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des liens auteurs interview';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Banniere`
--

CREATE TABLE IF NOT EXISTS `tbl_Banniere` (
  `nomBanniere` varchar(10) NOT NULL default 'ACCUE',
  `commentaire` varchar(256) NOT NULL,
  `codeBanniere` text,
  `T_actif` char(1) NOT NULL default 'N',
  `plage_min` tinyint(2) NOT NULL default '0',
  `plage_max` tinyint(3) NOT NULL default '100',
  `nb_affichages_site` int(10) unsigned NOT NULL default '0',
  `nb_affichages_forum` int(10) unsigned NOT NULL default '0',
  `nb_affichages_jeu` int(10) unsigned NOT NULL default '0',
  `type_affichage` char(3) NOT NULL default '',
  `T_Stat_Clic` char(1) NOT NULL default 'N',
  `nb_clics` int(10) unsigned NOT NULL default '0',
  `url_redirect` varchar(255) default NULL,
  `format` tinyint(1) unsigned NOT NULL default '0' COMMENT 'banniÃ¨re, 0=horizontale, 1=verticale, 2=habillage, 3=carre',
  PRIMARY KEY  (`nomBanniere`),
  KEY `T_actif` (`T_actif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tbl_Calendrier`
--
CREATE TABLE IF NOT EXISTS `tbl_Calendrier` (
`idCalendrier` int(11)
,`dateDeb` date
,`dateFin` date
,`titre` varchar(50)
,`description` text
,`heure` time
,`categorie` bigint(20) unsigned
,`lien` text
);
-- --------------------------------------------------------

--
-- Structure de la table `tbl_Calendrier_bak`
--

CREATE TABLE IF NOT EXISTS `tbl_Calendrier_bak` (
  `idCalendrier` int(11) NOT NULL auto_increment,
  `categorie` varchar(20) NOT NULL default 'Z',
  `actif` varchar(1) NOT NULL default 'N',
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` time default NULL,
  `duree` int(11) NOT NULL default '0',
  `lien` varchar(200) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`idCalendrier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Carte`
--

CREATE TABLE IF NOT EXISTS `tbl_Carte` (
  `idCarte` int(11) NOT NULL auto_increment,
  `monmail` varchar(50) NOT NULL default '',
  `sonmail` varchar(50) NOT NULL default '',
  `texte` text,
  `nom` varchar(50) NOT NULL default '',
  `vuCarte` char(1) NOT NULL default 'N',
  `clef` varchar(50) NOT NULL default '',
  `nomCarte` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`idCarte`),
  KEY `idCarte` (`idCarte`),
  KEY `clef` (`clef`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Collections`
--

CREATE TABLE IF NOT EXISTS `tbl_Collections` (
  `idCollection` int(11) NOT NULL auto_increment,
  `nomCollection` varchar(40) NOT NULL default '',
  `commentaire` text,
  `idEditeur` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idCollection`),
  KEY `idEditeur` (`idEditeur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=623 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Compte_Ligne`
--

CREATE TABLE IF NOT EXISTS `tbl_Compte_Ligne` (
  `idligne` int(11) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `libelle` varchar(100) NOT NULL default '',
  `credit` decimal(7,2) NOT NULL default '0.00',
  `debit` decimal(7,2) NOT NULL default '0.00',
  `commentaire` text NOT NULL,
  `type` varchar(10) NOT NULL default '',
  `status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idligne`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table des comptes de l''association' AUTO_INCREMENT=967 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Concours`
--

CREATE TABLE IF NOT EXISTS `tbl_Concours` (
  `date` date NOT NULL default '0000-00-00',
  `question` text NOT NULL,
  `nomConcours` varchar(20) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Concours_Ent`
--

CREATE TABLE IF NOT EXISTS `tbl_Concours_Ent` (
  `nomConcours` varchar(5) NOT NULL default '',
  `libelleConcours` varchar(40) NOT NULL default '',
  `dateDebut` date NOT NULL default '0000-00-00',
  `dateFin` date NOT NULL default '0000-00-00',
  `urlminisite` text,
  `idAlbum` int(11) NOT NULL default '0',
  `entete` text NOT NULL,
  `commentaire` text,
  `reglement` text,
  `resultats` text,
  `enligne` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`nomConcours`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table d''entête des concours';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Concours_Gagnants`
--

CREATE TABLE IF NOT EXISTS `tbl_Concours_Gagnants` (
  `nomConcours` varchar(10) NOT NULL default '',
  `idGagnant` int(11) NOT NULL default '0',
  `classement` int(11) NOT NULL default '0',
  PRIMARY KEY  (`nomConcours`,`idGagnant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Concours_Lig`
--

CREATE TABLE IF NOT EXISTS `tbl_Concours_Lig` (
  `nomConcours` varchar(20) NOT NULL default '',
  `numQuestion` int(2) NOT NULL default '0',
  `dateQuestion` date NOT NULL default '0000-00-00',
  `question` text NOT NULL,
  `t_alldays` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`nomConcours`,`dateQuestion`,`numQuestion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Concours_Reponses`
--

CREATE TABLE IF NOT EXISTS `tbl_Concours_Reponses` (
  `nomConcours` varchar(20) NOT NULL default '',
  `emailReponse` varchar(40) NOT NULL default '',
  `dateReponse` datetime NOT NULL default '0000-00-00 00:00:00',
  `reponse1` text,
  `reponse2` text,
  `reponse3` text,
  `reponse4` text,
  `reponse5` text,
  `reponse6` text,
  `reponse7` text,
  `reponse8` text,
  `AdrIp` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`nomConcours`,`emailReponse`,`dateReponse`),
  KEY `nomConcours` (`nomConcours`,`emailReponse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Coup_de_coeur`
--

CREATE TABLE IF NOT EXISTS `tbl_Coup_de_coeur` (
  `idNumero` int(11) NOT NULL auto_increment,
  `idAlbum` int(11) NOT NULL default '0',
  `dateCreation` date NOT NULL default '0000-00-00',
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idNumero`),
  KEY `idAlbum` (`idAlbum`),
  KEY `idInternaute` (`idInternaute`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2987 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Coup_de_coeur_Internaute`
--

CREATE TABLE IF NOT EXISTS `tbl_Coup_de_coeur_Internaute` (
  `idVote` int(11) NOT NULL auto_increment,
  `dateVote` datetime NOT NULL default '0000-00-00 00:00:00',
  `idAlbum` int(11) NOT NULL default '0',
  `adrIp` varchar(20) NOT NULL default '',
  `nomIp` varchar(50) NOT NULL default '',
  `semVote` varchar(6) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`idVote`),
  KEY `dateVote` (`dateVote`),
  KEY `semVote` (`semVote`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19913 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Critique`
--

CREATE TABLE IF NOT EXISTS `tbl_Critique` (
  `idAlbum` int(11) NOT NULL default '0',
  `critique` text,
  `active` int(1) NOT NULL default '0',
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `FKidAlbum` int(11) default NULL,
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idAlbum`,`idInternaute`),
  KEY `datecreation` (`datecreation`),
  KEY `idInternaute` (`idInternaute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Critique_Brouillon`
--

CREATE TABLE IF NOT EXISTS `tbl_Critique_Brouillon` (
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `critique` text NOT NULL,
  PRIMARY KEY  (`idInternaute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des brouillons de critiques';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Critique_Prov`
--

CREATE TABLE IF NOT EXISTS `tbl_Critique_Prov` (
  `idCritique` int(11) NOT NULL auto_increment,
  `idAlbum` int(11) NOT NULL default '0',
  `pseudo` varchar(40) NOT NULL default '',
  `critique` text NOT NULL,
  `datecreation` datetime NOT NULL default '0000-00-00 00:00:00',
  `adrMail` varchar(80) NOT NULL default '',
  `T_Valide` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`idCritique`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2192 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Critique_save`
--

CREATE TABLE IF NOT EXISTS `tbl_Critique_save` (
  `idAlbum` int(11) NOT NULL default '0',
  `critique` text,
  `active` int(1) NOT NULL default '0',
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `FKidAlbum` int(11) default NULL,
  `datecreation` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idAlbum`,`idInternaute`),
  KEY `datecreation` (`datecreation`),
  KEY `idInternaute` (`idInternaute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Decouverte`
--

CREATE TABLE IF NOT EXISTS `tbl_Decouverte` (
  `idDecouverte` varchar(10) NOT NULL default '',
  `titreDecouverte` varchar(80) NOT NULL default '',
  `titreSommaire` text NOT NULL,
  `dateDecouverte` date NOT NULL default '0000-00-00',
  `resumeSommaire` text NOT NULL,
  `idAlbum` int(11) default NULL,
  `idAuteurs` varchar(50) NOT NULL default '',
  `idConcours` varchar(50) NOT NULL default '',
  `idInterviews` varchar(50) NOT NULL default '',
  `idPreviews` varchar(50) NOT NULL default '',
  `idWorks` varchar(50) NOT NULL default '',
  `idGaleries` varchar(50) NOT NULL default '',
  `idExpos` varchar(50) NOT NULL default '' COMMENT 'annee-idExpo',
  `enligne` char(1) NOT NULL default '',
  `type` int(11) NOT NULL default '1' COMMENT '1 = BDcouverte, 2=scenarDuMois, 3=Recommade',
  `typeDecouverte` varchar(1) NOT NULL default '1' COMMENT '1 = BDcouverte, 2=scenarDuMois, 3=Recommade',
  PRIMARY KEY  (`idDecouverte`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des dossiers dÃ©couverte';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Decouverte_save`
--

CREATE TABLE IF NOT EXISTS `tbl_Decouverte_save` (
  `idDecouverte` varchar(10) NOT NULL default '',
  `titreDecouverte` varchar(80) NOT NULL default '',
  `titreSommaire` text NOT NULL,
  `dateDecouverte` date NOT NULL default '0000-00-00',
  `resumeSommaire` text NOT NULL,
  `lienAlbum` varchar(255) NOT NULL default '',
  `lienAlbumJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `idAlbum` int(11) default NULL,
  `idAuteurs` varchar(50) NOT NULL default '',
  `idConcours` varchar(50) NOT NULL default '',
  `idInterviews` varchar(50) NOT NULL default '',
  `idPreviews` varchar(50) NOT NULL default '',
  `idWorks` varchar(50) NOT NULL default '',
  `idGaleries` varchar(50) NOT NULL default '',
  `idExpos` varchar(50) NOT NULL default '',
  `lienAuteur` varchar(255) NOT NULL default '',
  `lienAuteurJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `lienConcours` varchar(255) NOT NULL default '',
  `lienConcoursJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `lienInterview` varchar(255) NOT NULL default '',
  `lienInterviewJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `lienCroquis` varchar(255) NOT NULL default '',
  `lienCroquisJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `lienWork` varchar(255) NOT NULL default '',
  `lienWorkJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `lienPreview` varchar(255) NOT NULL default '',
  `lienPreviewJava` tinyint(1) unsigned zerofill NOT NULL default '0',
  `enligne` char(1) NOT NULL default '',
  `textAuteur` text NOT NULL,
  `logoSoleil` tinyint(1) unsigned zerofill NOT NULL default '0',
  `type` int(11) NOT NULL default '1' COMMENT '1 = BDcouverte, 2=scenarDuMois',
  PRIMARY KEY  (`idDecouverte`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des dossiers dÃ©couverte';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Dossiers`
--

CREATE TABLE IF NOT EXISTS `tbl_Dossiers` (
  `idDossier` varchar(10) NOT NULL default '',
  `lienDossier` varchar(255) default NULL,
  `titreDossier` varchar(80) NOT NULL default '',
  `dateDossier` date NOT NULL default '0000-00-00',
  `typeDossier` varchar(50) NOT NULL default '',
  `lienJava` tinyint(1) NOT NULL default '0',
  `enligne` char(1) NOT NULL default 'N',
  `lienImage` varchar(255) default NULL,
  `titreSommaire` text NOT NULL,
  `texte` text NOT NULL,
  `type` int(11) NOT NULL default '1' COMMENT '1 = galerie, 2 = preview, 3 = work in progress',
  PRIMARY KEY  (`idDossier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des dossiers ou carnet de croquis';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Dossiers_Pages`
--

CREATE TABLE IF NOT EXISTS `tbl_Dossiers_Pages` (
  `idDossier` varchar(10) NOT NULL default '',
  `idPage` smallint(2) NOT NULL default '0',
  `commentaire` text NOT NULL,
  PRIMARY KEY  (`idDossier`,`idPage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des pages du dossier';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Editeur`
--

CREATE TABLE IF NOT EXISTS `tbl_Editeur` (
  `idEditeur` int(11) NOT NULL auto_increment,
  `nomEditeur` varchar(60) NOT NULL default '',
  `prenomEditeur` varchar(40) default NULL,
  `adrWebEditeur` varchar(100) default NULL,
  `adrMailEditeur` varchar(40) default NULL,
  PRIMARY KEY  (`idEditeur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=552 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Entete`
--

CREATE TABLE IF NOT EXISTS `tbl_Entete` (
  `nomEntete` varchar(6) NOT NULL default 'ACCUE',
  `texteEnt` text,
  PRIMARY KEY  (`nomEntete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Expos`
--

CREATE TABLE IF NOT EXISTS `tbl_Expos` (
  `_id` int(11) NOT NULL auto_increment,
  `idexpo` varchar(30) NOT NULL default '',
  `titre` varchar(100) NOT NULL default '',
  `sousTitre` text NOT NULL,
  `annee` int(11) NOT NULL default '0',
  `idAlbums` varchar(50) NOT NULL default '' COMMENT 'ex : 1234, 5678, 4567',
  `idAuteurs` varchar(50) NOT NULL default '' COMMENT 'ex : 1234, 5678, 21',
  `idStats` varchar(30) NOT NULL default '',
  `date` varchar(50) NOT NULL default '',
  `image` varchar(50) NOT NULL default '',
  `enligne` char(1) NOT NULL default '',
  `dateajout` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`_id`),
  KEY `idexpo` (`idexpo`,`annee`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Expos_Cont`
--

CREATE TABLE IF NOT EXISTS `tbl_Expos_Cont` (
  `id` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `idexpo` text NOT NULL,
  `titre` text NOT NULL,
  `com` text NOT NULL,
  `dateajout` datetime NOT NULL default '0000-00-00 00:00:00',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Festival`
--

CREATE TABLE IF NOT EXISTS `tbl_Festival` (
  `idFestival` smallint(4) unsigned NOT NULL auto_increment,
  `nomFestival` varchar(40) NOT NULL default '',
  `villeFestival` varchar(40) NOT NULL default '',
  `lienOpale` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`idFestival`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table des festivals' AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Festival_Prix`
--

CREATE TABLE IF NOT EXISTS `tbl_Festival_Prix` (
  `idPrix` smallint(4) unsigned NOT NULL auto_increment,
  `idFestival` smallint(4) unsigned NOT NULL default '0',
  `nomPrix` varchar(80) NOT NULL default '',
  `commentaire` text NOT NULL,
  PRIMARY KEY  (`idPrix`),
  KEY `idFestival` (`idFestival`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table des prix des festivals' AUTO_INCREMENT=148 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Genres`
--

CREATE TABLE IF NOT EXISTS `tbl_Genres` (
  `idGenre` tinyint(3) unsigned NOT NULL auto_increment,
  `libelle` varchar(40) NOT NULL default '',
  `T_recherche` char(1) NOT NULL default 'N',
  `definition` text NOT NULL,
  `T_visu_album` char(1) NOT NULL default 'O',
  PRIMARY KEY  (`idGenre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table des mots clés d''un album' AUTO_INCREMENT=112 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Genres_Albums`
--

CREATE TABLE IF NOT EXISTS `tbl_Genres_Albums` (
  `idAlbum` int(11) NOT NULL default '0',
  `idGenre` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idAlbum`,`idGenre`),
  KEY `idGenre` (`idGenre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des liens genre album';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Genres_Albums_Prov`
--

CREATE TABLE IF NOT EXISTS `tbl_Genres_Albums_Prov` (
  `idAlbum` int(11) NOT NULL default '0',
  `idGenre` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idAlbum`,`idGenre`),
  KEY `idGenre` (`idGenre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des genres des albums temporaires';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Habillage`
--

CREATE TABLE IF NOT EXISTS `tbl_Habillage` (
  `idHabillage` varchar(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `banniere` text NOT NULL,
  `couleur` varchar(6) NOT NULL,
  `actif` varchar(1) NOT NULL,
  `actifDev` varchar(1) NOT NULL default 'N',
  `portee` tinyint(1) NOT NULL default '0',
  `css` varchar(50) NOT NULL,
  PRIMARY KEY  (`idHabillage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Histoire`
--

CREATE TABLE IF NOT EXISTS `tbl_Histoire` (
  `idAlbum` int(11) NOT NULL default '0',
  `histoire` text,
  `idInternaute` smallint(4) unsigned NOT NULL default '0',
  `FKidAlbum` int(11) default NULL,
  `histoire2` text,
  `dateHistoire` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idAlbum`,`idInternaute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Historique`
--

CREATE TABLE IF NOT EXISTS `tbl_Historique` (
  `idHisto` int(11) NOT NULL auto_increment,
  `dateHisto` datetime NOT NULL default '0000-00-00 00:00:00',
  `typeRech` varchar(8) NOT NULL default '',
  `valeurRech` varchar(30) NOT NULL default '',
  `adrIp` varchar(20) NOT NULL default '',
  `nomIp` varchar(50) NOT NULL default '',
  `user_id` mediumint(8) NOT NULL default '0',
  `session_id` varchar(35) NOT NULL default '',
  `adrReferer` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`idHisto`),
  KEY `dateHisto` (`dateHisto`),
  KEY `typeRech` (`typeRech`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19041709 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Internaute`
--

CREATE TABLE IF NOT EXISTS `tbl_Internaute` (
  `idInternaute` smallint(4) unsigned NOT NULL auto_increment,
  `pseudo` varchar(40) NOT NULL default '',
  `adrWebInternaute` varchar(40) default NULL,
  `adrMailInternaute` varchar(40) NOT NULL default '',
  `envoilettre` char(1) default 'N',
  `datecreation` date default NULL,
  `T_Affectation` char(1) NOT NULL default 'N',
  `coordonnees` text NOT NULL,
  PRIMARY KEY  (`idInternaute`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Interviews`
--

CREATE TABLE IF NOT EXISTS `tbl_Interviews` (
  `idInterview` varchar(5) NOT NULL default '',
  `titreInterview` varchar(80) NOT NULL default '',
  `soustitreInterview` text NOT NULL,
  `textInterview` longtext NOT NULL,
  `dateInterview` date NOT NULL default '2003-01-01',
  `lienInterview` varchar(255) default NULL,
  `lienJava` tinyint(1) NOT NULL default '0',
  `titreSommaire` text,
  `lienImage` varchar(255) default NULL,
  `Intervieweur` varchar(100) default NULL,
  `enligne` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`idInterview`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Mailing`
--

CREATE TABLE IF NOT EXISTS `tbl_Mailing` (
  `adrMail` varchar(80) NOT NULL default '',
  `dateCreation` date NOT NULL default '0000-00-00',
  `T_Valide` char(1) NOT NULL default 'N',
  `clef` varchar(50) NOT NULL default '',
  `nberreurs` tinyint(1) unsigned NOT NULL default '0',
  `enerreur` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`adrMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Mailing_Group`
--

CREATE TABLE IF NOT EXISTS `tbl_Mailing_Group` (
  `idListe` int(11) NOT NULL default '99',
  `adrMail` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`idListe`,`adrMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Mailing_Liste`
--

CREATE TABLE IF NOT EXISTS `tbl_Mailing_Liste` (
  `idListe` int(11) NOT NULL auto_increment,
  `NomListe` varchar(40) NOT NULL default '',
  `comment` text,
  PRIMARY KEY  (`idListe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Mailing_Partenaires`
--

CREATE TABLE IF NOT EXISTS `tbl_Mailing_Partenaires` (
  `adrMail` varchar(80) NOT NULL default '',
  `dateCreation` date NOT NULL default '0000-00-00',
  `T_Valide` char(1) NOT NULL default 'N',
  `clef` varchar(50) NOT NULL default '',
  `nberreurs` tinyint(1) unsigned NOT NULL default '0',
  `enerreur` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`adrMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Mailing_save`
--

CREATE TABLE IF NOT EXISTS `tbl_Mailing_save` (
  `adrMail` varchar(80) NOT NULL default '',
  `dateCreation` date NOT NULL default '0000-00-00',
  `T_Valide` char(1) NOT NULL default 'N',
  `clef` varchar(50) NOT NULL default '',
  `nberreurs` tinyint(1) unsigned NOT NULL default '0',
  `enerreur` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`adrMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Auteur_Album`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Auteur_Album` (
  `user_id` mediumint(8) NOT NULL default '0',
  `idAuteur` int(11) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`idAuteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table contenant les filtres sur les éditeurs';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Bdtheque`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Bdtheque` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `idAlbum` int(11) unsigned NOT NULL default '0',
  `etat` tinyint(1) NOT NULL default '0' COMMENT '0=present; 1=acheter; 2=?; 3=?',
  PRIMARY KEY  (`user_id`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des bibliothèques des membres';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Editeur_Album`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Editeur_Album` (
  `user_id` mediumint(8) NOT NULL default '0',
  `idEditeur` int(11) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`idEditeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table contenant les filtres sur les éditeurs';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Editeur_Paru`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Editeur_Paru` (
  `user_id` mediumint(8) NOT NULL default '0',
  `idEditeur` int(11) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`idEditeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table contenant les filtres sur les éditeurs';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Info`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Info` (
  `user_id` mediumint(8) NOT NULL default '0',
  `mail_info` tinyint(1) NOT NULL default '0',
  `titre_mail` varchar(80) NOT NULL default 'Informations Sceneario',
  `periodicite` tinyint(2) unsigned NOT NULL default '7',
  `info_parution` tinyint(1) NOT NULL default '0',
  `info_ligne` tinyint(1) NOT NULL default '0',
  `info_news` tinyint(1) NOT NULL default '0',
  `next_mail` date NOT NULL default '0000-00-00',
  `last_mail` date NOT NULL default '0000-00-00',
  `info_ligne_editeur` tinyint(1) NOT NULL default '0',
  `info_ligne_auteur` tinyint(1) NOT NULL default '0',
  `info_paru_motcle` tinyint(1) NOT NULL default '0',
  `info_ligne_motcle` tinyint(1) NOT NULL default '0',
  `info_paru_editeur` tinyint(1) NOT NULL default '0',
  `espace_ludique` tinyint(1) NOT NULL default '0',
  `nb_auteurs_visus` tinyint(2) NOT NULL default '0',
  `bd_publique` tinyint(1) NOT NULL default '0',
  `nb_couv_visus` tinyint(2) unsigned NOT NULL default '0',
  `type_page` tinyint(1) unsigned NOT NULL default '0',
  `theme` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des infos membres';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Jeu_Panier`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Jeu_Panier` (
  `idAlbum` int(11) NOT NULL default '0',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table du panier des gains';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Jeu_Param`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Jeu_Param` (
  `date` date NOT NULL default '0000-00-00',
  `idjeu` varchar(4) NOT NULL default 'XXXX',
  `idAlbum` varchar(13) NOT NULL default '0',
  `points` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`date`,`idjeu`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Jeu_Puzzle`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Jeu_Puzzle` (
  `user_id` mediumint(8) NOT NULL default '0',
  `isbn` varchar(10) NOT NULL default '0',
  `nb_pieces_l` tinyint(2) NOT NULL default '0',
  `nb_pieces_h` tinyint(2) NOT NULL default '0',
  `nb_coups` smallint(3) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`isbn`,`nb_pieces_l`,`nb_pieces_h`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des scores des puzzles';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Jeu_Reponses`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Jeu_Reponses` (
  `user_id` mediumint(8) NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `idjeu` varchar(4) NOT NULL default 'XXXX',
  `idAlbum` varchar(11) NOT NULL default '0',
  `date_reponse` datetime NOT NULL default '0000-00-00 00:00:00',
  `points` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`date`,`idjeu`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Motcle_Album`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Motcle_Album` (
  `user_id` mediumint(8) NOT NULL default '0',
  `motcle` varchar(10) NOT NULL default '',
  `typeRech` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`motcle`,`typeRech`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table contenant les filtres sur les éditeurs';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Member_Next_Mail`
--

CREATE TABLE IF NOT EXISTS `tbl_Member_Next_Mail` (
  `idLigne` int(11) NOT NULL auto_increment,
  `user_id` mediumint(8) NOT NULL default '0',
  `type_info` varchar(4) NOT NULL default '',
  `valeur_info` varchar(11) default NULL,
  `date_info` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idLigne`),
  KEY `type_info` (`type_info`),
  KEY `date_info` (`date_info`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table d''envoi du prochain mail du membre' AUTO_INCREMENT=23089 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_News`
--

CREATE TABLE IF NOT EXISTS `tbl_News` (
  `idNews` int(11) NOT NULL auto_increment,
  `texte` text,
  `datecreation` date NOT NULL default '0000-00-00',
  `enligne` char(1) NOT NULL default 'N',
  `dateNews` varchar(80) default NULL,
  `shortnews` char(1) NOT NULL default 'O',
  PRIMARY KEY  (`idNews`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1086 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_News_Letter`
--

CREATE TABLE IF NOT EXISTS `tbl_News_Letter` (
  `idNewsLetter` int(11) NOT NULL auto_increment,
  `numNewsLetter` int(11) NOT NULL default '0',
  `motpatron` text NOT NULL,
  `texte` text NOT NULL,
  `type` varchar(5) NOT NULL default '',
  `date_news` date default NULL,
  `theme` varchar(20) NOT NULL default 'sceneario',
  PRIMARY KEY  (`idNewsLetter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Stockage des newsletter envoyée' AUTO_INCREMENT=230 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Parametres`
--

CREATE TABLE IF NOT EXISTS `tbl_Parametres` (
  `nom_param` char(20) NOT NULL default '',
  `valeur_param` char(30) NOT NULL default '',
  PRIMARY KEY  (`nom_param`),
  KEY `nom_param` (`nom_param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Reponses_Jeu_Couv`
--

CREATE TABLE IF NOT EXISTS `tbl_Reponses_Jeu_Couv` (
  `email` varchar(255) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `adrIP` varchar(15) NOT NULL default '',
  `isbn` varchar(13) NOT NULL default '',
  `gagne` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`email`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des rÃ©ponses au jeu de la couverture';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Reponses_Sondage`
--

CREATE TABLE IF NOT EXISTS `tbl_Reponses_Sondage` (
  `idReponse` int(11) NOT NULL auto_increment,
  `dateReponse` datetime NOT NULL default '0000-00-00 00:00:00',
  `chx1` int(1) NOT NULL default '0',
  `chx2` int(1) NOT NULL default '0',
  `chx3` int(1) NOT NULL default '0',
  `chx4` int(1) NOT NULL default '0',
  `chx5` int(1) NOT NULL default '0',
  `chx6` int(1) NOT NULL default '0',
  `chx7` int(1) NOT NULL default '0',
  `chx8` int(1) NOT NULL default '0',
  `chx9` int(1) NOT NULL default '0',
  `chx10` int(1) NOT NULL default '0',
  `chx11` int(1) NOT NULL default '0',
  `chk1` int(1) NOT NULL default '0',
  `chk2` int(1) NOT NULL default '0',
  `chk3` int(1) NOT NULL default '0',
  `chk4` int(1) NOT NULL default '0',
  `chk5` int(1) NOT NULL default '0',
  `chk6` int(1) NOT NULL default '0',
  `chk7` int(1) NOT NULL default '0',
  `chk8` int(1) NOT NULL default '0',
  `chk9` int(1) NOT NULL default '0',
  `chk10` int(1) NOT NULL default '0',
  `chk11` int(1) NOT NULL default '0',
  `chk12` int(1) NOT NULL default '0',
  `chk13` int(1) NOT NULL default '0',
  `chk14` int(1) NOT NULL default '0',
  `chk15` int(1) NOT NULL default '0',
  `chk16` int(1) NOT NULL default '0',
  `chk17` int(1) NOT NULL default '0',
  `chk18` int(1) NOT NULL default '0',
  `chk19` int(1) NOT NULL default '0',
  `chk20` int(1) NOT NULL default '0',
  `chk21` int(1) NOT NULL default '0',
  `chk22` int(1) NOT NULL default '0',
  `chk23` int(1) NOT NULL default '0',
  `chk24` int(1) NOT NULL default '0',
  `chk25` int(1) NOT NULL default '0',
  `chk26` int(1) NOT NULL default '0',
  `chk27` int(1) NOT NULL default '0',
  `chk28` int(1) NOT NULL default '0',
  `chk29` int(1) NOT NULL default '0',
  `chk30` int(1) NOT NULL default '0',
  `chk31` int(1) NOT NULL default '0',
  `chk32` int(1) NOT NULL default '0',
  `chk33` int(1) NOT NULL default '0',
  `chk34` int(1) NOT NULL default '0',
  `chk35` int(1) NOT NULL default '0',
  `chk36` int(1) NOT NULL default '0',
  `chk37` int(1) NOT NULL default '0',
  `chk38` int(1) NOT NULL default '0',
  `chk39` int(1) NOT NULL default '0',
  `chk40` int(1) NOT NULL default '0',
  `chk41` int(1) NOT NULL default '0',
  `chk42` int(1) NOT NULL default '0',
  `chk43` int(1) NOT NULL default '0',
  `chk44` int(1) NOT NULL default '0',
  `chk45` int(1) NOT NULL default '0',
  `chk46` int(1) NOT NULL default '0',
  `chk47` int(1) NOT NULL default '0',
  `chk48` int(1) NOT NULL default '0',
  `txtlong1` text,
  `txtcourt1` varchar(50) default NULL,
  `txtcourt2` varchar(50) default NULL,
  `txtcourt3` varchar(50) default NULL,
  `txtcourt4` varchar(50) default NULL,
  `txtcourt5` varchar(50) default NULL,
  `txtlong2` text,
  `txtlong3` text,
  `adrIp` varchar(20) default NULL,
  `nomIp` varchar(50) default NULL,
  `txtcourt6` varchar(50) default NULL,
  `chx12` int(1) NOT NULL default '0',
  PRIMARY KEY  (`idReponse`),
  KEY `txtcourt4` (`txtcourt4`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Serie`
--

CREATE TABLE IF NOT EXISTS `tbl_Serie` (
  `idSerie` int(11) unsigned NOT NULL auto_increment,
  `nomSerie` varchar(80) NOT NULL default '',
  `complete` char(1) NOT NULL default 'N',
  `nbtomes` tinyint(3) unsigned NOT NULL default '0',
  `commentaire` varchar(100) NOT NULL default '',
  `informations` text NOT NULL,
  `idUnivers` int(11) unsigned default NULL,
  PRIMARY KEY  (`idSerie`),
  KEY `idUnivers` (`idUnivers`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table listant toutes les séries' AUTO_INCREMENT=4832 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Services_Press`
--

CREATE TABLE IF NOT EXISTS `tbl_Services_Press` (
  `idService` int(11) NOT NULL auto_increment,
  `idEditeur` int(11) NOT NULL default '0',
  `dateParution` date NOT NULL default '0000-00-00',
  `nomService` text NOT NULL,
  `bloque` char(1) NOT NULL default 'N',
  `T_Recu` char(1) NOT NULL default 'N',
  `ListeAuteurs` text,
  `datecreation` datetime NOT NULL default '2000-00-00 00:00:00',
  PRIMARY KEY  (`idService`),
  KEY `idEditeur` (`idEditeur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11480 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Sondage`
--

CREATE TABLE IF NOT EXISTS `tbl_Sondage` (
  `idSondage` mediumint(4) unsigned NOT NULL auto_increment,
  `question` varchar(40) NOT NULL default '',
  `reponse1` varchar(20) NOT NULL default '',
  `reponse2` varchar(20) NOT NULL default '',
  `reponse3` varchar(20) NOT NULL default '',
  `reponse4` varchar(20) NOT NULL default '',
  `reponse5` varchar(20) NOT NULL default '',
  `reponse6` varchar(20) NOT NULL default '',
  `reponse7` varchar(20) NOT NULL default '',
  `reponse8` varchar(20) NOT NULL default '',
  `type_choix` tinyint(1) unsigned NOT NULL default '0',
  `enligne` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`idSondage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table du sondage express' AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Sondage_Reponses`
--

CREATE TABLE IF NOT EXISTS `tbl_Sondage_Reponses` (
  `idSondage` mediumint(4) unsigned NOT NULL default '0',
  `idReponse` tinyint(2) unsigned NOT NULL default '0',
  `reponses` mediumint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idSondage`,`idReponse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des réponses du sondage';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_statistiques`
--

CREATE TABLE IF NOT EXISTS `tbl_statistiques` (
  `date` datetime NOT NULL,
  `pageIn` varchar(128) NOT NULL,
  `pageOut` varchar(40) NOT NULL,
  `session` varchar(32) NOT NULL,
  `client` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_SupremeD`
--

CREATE TABLE IF NOT EXISTS `tbl_SupremeD` (
  `idSupremeD` varchar(10) NOT NULL default '',
  `titreSupremeD` varchar(80) NOT NULL default '',
  `titreSommaire` text NOT NULL,
  `dateSupremeD` date NOT NULL default '0000-00-00',
  `idAlbum` int(11) default NULL,
  `idAuteurs` varchar(50) NOT NULL default '',
  `idConcours` varchar(50) NOT NULL default '',
  `idInterviews` varchar(50) NOT NULL default '',
  `idPreviews` varchar(50) NOT NULL default '',
  `idWorks` varchar(50) NOT NULL default '',
  `idGaleries` varchar(50) NOT NULL default '',
  `idExpos` varchar(50) NOT NULL default '',
  `enligne` char(1) NOT NULL default '',
  `textAuteur` text NOT NULL,
  `logoSoleil` tinyint(1) unsigned zerofill NOT NULL default '0',
  `resumeSommaire` text NOT NULL,
  `lienAlbum` char(1) NOT NULL default '',
  `lienAlbumJava` char(1) NOT NULL default '',
  `lienAuteur` char(1) NOT NULL default '',
  `lienAuteurJava` char(1) NOT NULL default '',
  `lienConcours` char(1) NOT NULL default '',
  `lienConcoursJava` char(1) NOT NULL default '',
  `lienInterview` char(1) NOT NULL default '',
  `lienInterviewJava` char(1) NOT NULL default '',
  `lienCroquis` char(1) NOT NULL default '',
  `lienCroquisJava` char(1) NOT NULL default '',
  `lienWork` char(1) NOT NULL default '',
  `lienWorkJava` char(1) NOT NULL default '',
  `lienPreview` char(1) NOT NULL default '',
  `lienPreviewJava` char(1) NOT NULL default '',
  PRIMARY KEY  (`idSupremeD`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table des scenar Supreme Dimension';

-- --------------------------------------------------------

--
-- Structure de la table `tbl_top30`
--

CREATE TABLE IF NOT EXISTS `tbl_top30` (
  `idAlbum` int(11) NOT NULL default '0',
  `visitesPrec` int(11) NOT NULL default '0',
  `nbSemaines` int(11) NOT NULL default '0',
  `classement` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idAlbum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_Univers`
--

CREATE TABLE IF NOT EXISTS `tbl_Univers` (
  `idUnivers` int(11) unsigned NOT NULL auto_increment,
  `nomUnivers` varchar(80) NOT NULL default '',
  `commentaire` varchar(100) NOT NULL default '',
  `informations` text NOT NULL,
  PRIMARY KEY  (`idUnivers`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table listant toutes les séries' AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tbl_Users`
--
CREATE TABLE IF NOT EXISTS `tbl_Users` (
`user_id` mediumint(8)
,`user_active` tinyint(1)
,`username` varchar(25)
,`user_password` varchar(32)
);

