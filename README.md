# Web4Event
 projet de L3
NOM:DE KERGARIOU						 								9/12/21
Prenom:Yoann
-----------------------------------------------------------------------------
Présentation du projet
-----------------------------------------------------------------------------
Application de gestion d’événement 

-----------------------------------------------------------------------------
Partie visiteur
-----------------------------------------------------------------------------
Le visiteur peux visualiser les invités,les évènemements prévus ainsi que les lieux et services sur place.

-----------------------------------------------------------------------------
Partie Invités
-----------------------------------------------------------------------------
Un invité peut ce connecter afin de visualiser ses informations et modifier son mot de passe.
-----------------------------------------------------------------------------
Partie Organisateur
-----------------------------------------------------------------------------
Un organisateur peut se connecter afin de visualiser ses informations, modifier ou supprimmer une animation 


-----------------------------------------------------------------------------
Compte Test
-----------------------------------------------------------------------------
ORGANISATEUR 
id:Organisateur 	mdp:org21**TNEVE 
ID:Jmar mdp:1234 
Jmat,4321
INVITE
id:Hmiya mdp:arbres 
id:Jamy mdp:rubyazd 
id:EiAo mdp:gorogoro

-----------------------------------------------------------------------------
procédure d'installation:
-----------------------------------------------------------------------------

-déposer le dossier "CodeIgniter" dans un dossier de serveur web
-importer le fichier zal3-zde_keryo.sql sur un SGBD
-aller dans CodeIgniter/application/config/config.php ouvrir le fichier config.php,changer la valeur de $config[‘base_url’] ligne 26
si le serveur est local vous n'avez pas à changer la ligne.
-ouvrir le fichier CodeIgniter/application/config/database.php 
 aller ligne 79 et modifier les champs username,password,database

 par les information pour ce connecter à la base de données 
 et le nom de base par 'zal3-zde_keryo' 