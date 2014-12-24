cms-projet-cefii
================

Easy Peasy CMS - CMS réalisé dans le cadre de la formation Développeur Web du CEFII
Easy Peasy CMS est un système de gestion de contenu basé sur Laravel 4.2, dont l’interface utilisateur a été construite avec Foundation 5. 
Particulièrement adapté aux blogs, ce CMS s’adresse avant tout aux freelance et aux intégrateurs ne rechignant pas “mettre les mains dans le cambouis”.

#Démo

Pour voir le front du CMS : http://easypeasycms.jeremymarchandeau.com/public/

Le bouton de connexion se trouve à droite, dans le footer

Pour se connecter : http://easypeasycms.jeremymarchandeau.com/public/login

Identifiant Administrateur : Admin
Mot de passe Administrateur : AdminPWD

Identifiant simple utilisateur : User
Mot de passe Administrateur : User1PWD

Vous êtes maintenant connecté. Pour accéder au back-office : cliquez sur le bouton à droite dans le footer

#Prérequis serveur

Afin d’utiliser le framework Laravel, votre système doit avoit les caractéristiques suivantes :
PHP >= 5.4
MCrypt PHP Extension
Setup
1ère étape : Récupérer le code
Option 1 : Git Clone
git clone git@github.com:jeremy6680/easy-peasy-cms.git
Option 2 : Télécharger le répertoire
https://github.com/jeremy6680/easy-peasy-cms/archive/master.zip


2ème étape : Utiliser Composer pour installer les dépendences
Option 1: Composer n’est pas installé globalement
cd easy-peasy-cms
curl -s http://getcomposer.org/installer | php
php composer.phar install


Option 2: Composer est installé globalement
cd easy-peasy-cms
composer install


Si ce n’est pas déjà fait, vous feriez peut-être bien d’installer Composer globalement afin de faciliter l’utilisation future.
3ème étape : Configurer l’environnement local
Maintenant que Laravel 4 est installé, vous avez besoin de mettre à jour les fichiers app/config/database.php (pour configurer la base de données utilisée pour le projet) et app/config/app.php (réglages de base).
Auparavant, vous devriez avoir créé une nouvelle base de données MySQL dans phpMyAdmin.

4ème étape : Migration et population de la Base de données
php artisan migrate --seed

5ème étape : Connexion au CMS
Allez à l’adresse suivante : http://localhost:8888/ep-cms/public/login 
Entrez les identifiants suivants :
pseudo : admin
mot de passe : easypeasy

#Licence
Easy Peasy CMS est une solution open-source, réalisée sous licence MIT. N’hésitez pas à l’améliorer !

