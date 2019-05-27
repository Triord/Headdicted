Headdicted
Site wed de vente de couvre chef pour le ours de Projet Web de François Bruynbroek

de : Tislair Tristan

Prérequis
--------------------------------
- XAMPP
- PHP 7.2.2

Installation:
--------------------------------
- Clone or download
- Download ZIP
- Extraire le dossier
- Renommer le dossier en "headdicted"
- Lancer XAMPP et lancer les serveurs "Apache" et "MySQL"
- Ouvrir le fichier : "C:\Windows\System32\drivers\etc\hosts"
- Rajouter la ligne : "#
127.0.0.1 localhost
::1 localhost" (sans les guillemets)
- Enregistrer
- Aller sur cet emplacement : "C:\xampp\apache\conf\extra"
- Créer un fichier : "monprojet.conf" et y copier les lignes suivantes

```
  ##### 
## localhost
## DOMAINE de monprojet 
##### 
NameVirtualHost localhost

<Directory "C:/xampp/www/ProjetWeb/">
AllowOverride All
Options Indexes MultiViews FollowSymLinks
Require all granted
</Directory>

<VirtualHost localhost> 
DocumentRoot C:/xampp/www/ProjetWeb/
ServerName localhost
</VirtualHost>
  ```

  

- Aller sur cet emplacement : "C:\xampp\apache\conf"
- Modifier le fichier "httpd.conf"
- Rechercher dans le fichier (CTRL+F) ceci : "include conf"
- Rajouter au-dessus les 2 lignes suivantes :
```
    # headdicted.conf
    Include conf/extra/monprojet.conf
```
- Redémarrer la machine pour être sur de l'application des modifications
- Aller sur un navigateur et lancer la page : "http://localhost/phpmyadmin/"
- Cliquer sur "Nouvelle base de données", dans le menu sur la gauche
- Entrer dans le champ "Nom de base de données" : "headdicted" et cliquer sur "Créer"
- Cliquer maintenant sur "headdicted" qui vient d'apparaître dans le menu de gauche
- Cliquer sur l'onglet "Importer"
- Sur la nouvelle page, cliquer sur "Choisir un fichier"
- Prendre le dump "headdicted.sql" présent à la racine du dossier headdicted
- Ensuite, cliquer sur "Exécuter"
- Fini !!!


- Identifiants de connexion du compte administrateur pour effectuer les test:
- login : admin
- password : passadmin