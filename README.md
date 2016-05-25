Crearchitex -> Symfony 3
========================

Debut du projet
---------------
* nouveau projet symfony standard edition (isl_crearchitex)

* installation d'assetic pour la gestion des css, js et images
    - composer require symfony/assetic-bundle
    - ajout du bundle assetic dans le appkernel
    - ajout du bloc assetic dans le config.yml
    - si dans src/ressources/public
            - pour lier la feuille de style a la vue twig utilisation de:
                    {% stylesheets 'bundles/islcrearchitex/css/*' filter='cssrewrite' %}
                    <link href="{{asset_url}}" rel="stylesheet" type="text/css"/>
            - après modification du code css ou js j'execute trois commandes:
                . php bin/console cache:clear
                . php bin/console assets:install
                . php bin/console assetic:dump
    - si dans Web (bonnes pratiques):
            -   {% stylesheets 'css/*' filter='cssrewrite' %}
                <link href="{{asset_url}}" rel="stylesheet" type="text/css"/>
    

* creation d'un nouveau bundle Crearchitex (commande php bin/console generate:bundle)
    - j'ai choisi de créer un bundle réutilisable, dans mon arborescence le bundle est placé dans un répertoire ISL(namespace)
    - j'ai remplacé le DefaultContoller par cinq controller qui font chacun s'occuper d'une page:
        . HomeController
        . EquipeController
        . ProjetsController
        . NewsController
        . ContactController
    - Pour l'instant les controllers sont ultra simples ils se contentent de rediriger vers la vue correspondant.

* creations des vues 'de base'
    - Répertoire src/ISL/CrearchitexBundle/Ressources
    - creation d'un répertoire views/public qui contiendra les fichiers html publics
    - creation d'un répertoire views/admin qui contiendra les fichiers html pour la partie admin
    - les fichiers html.twig sont dans le répertoire views
    - le sous répertoire views/Base contient la structure (main) d'une page et les briques qui la composent (header, footer, menu ...).
    - les pages home, equipe, projets, news, contact ne contient que les éléments qui lui sont propre, 
      la structure et les briques sont ajoutés via include ou extends.
    - les fichiers css, js et images chacun dans son sous réperoire se trouvent dans le répertoire web (bonne pratiques symfony).
    - chaque page étends la structure du layout et surchage le bloque 'title' pour l'adapter à la page en cours.


Ajout de catégories:
--------------------

* Ajout de catgégorie
    - ajout de nouvelles catégorie dans le contrôleur pour verifier que la bd est alimentée.
    - Je joue avec les fixtures pour faire la même chose et 'dégager' le controleur.
        . d'abord une classe php pour insérer les fixtures
        . ensuite utilisation du bundle hautelook/alice-bundle. Ce bundle utilise un fichier yaml pour injecter les fixtures.  
            Très puissant le fichier yaml est cours et simple -> plus pratique que le fihier php
    - création d'un formulaire d'ajout
* confirmation / affichage des catéforie
* fonction affichage (show) et intégration dans la page home.
