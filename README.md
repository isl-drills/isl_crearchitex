Crearchitex -> Symfony 3
========================

Debut du projet
---------------
* nouveau projet symfony standard edition (isl_crearchitex)

* installation d'assetic pour la gestion des css, js et images
    - composer require symfony/assetic-bundle
    - ajout du bundle assetic dans le appkernel
    - ajout du bloc assetic dans le config.yml
    - pour lier la feuille de style a la vue twig utilisation de:
            {% stylesheets 'bundles/islcrearchitex/css/*' filter='cssrewrite' %}
            <link href="{{asset_url}}" rel="stylesheet" type="text/css"/>
    - après modification du code css ou js j'execute trois commandes:
        . php bin/console cache:clear
        . php bin/console assets:install
        . php bin/console assetic:dump
    - les details sont dans le book Symfony 3

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
    - creation d'un répertoire public qui contiendra les fichiers css, js et images chacun dans son sous réperoire.
    - les fichiers html.twig sont dans le répertoire views
    - le sous répertoire views/Base contient la structure (main) d'une page et les briques qui la composent (header, footer, menu ...).
    - les pages home, equipe, projets, news, contact ne contient que les éléments qui lui sont propre, 
      la structure et les briques sont ajoutés via include ou extends.



