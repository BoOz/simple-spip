# simple-spip
Installer rapidement un site SPIP + Semantic-ui


Simple-spip est un modèle de site SPIP (www.spip.net) qui permet d'afficher des données et des pages web rapidement.

- Les pages sont affichées dans un unique gabarit `sommaire.html` qui inclue lui-même les pages `pages/nom_de_la_page.html` *.
- Le contenu des pages est généré par les squelettes SPIP placés dans le répertoire `pages`
- L'affichage est produit avec l'interface Semantic-ui : http://semantic-ui.com/

## Personnalisation
- les fichiers par defaut de `simple-spip` sont surchargés par les fichiers placés dans le répertoire `www` (à créer).
- pour créer une page web, ajouter un squelette spip avec le contenu de la page dans le répertoire `pages`

### Mode accès restreint
- Avec l'option accès restreint activée, l'accès est soumis à l'identification par email et mot de passe.

## Installation

Pour créer un nouveau projet `simple-spip` nommé `mon_simple_spip`, taper dans le terminal :

```
git clone https://github.com/spip/SPIP.git mon_simple-spip
cd mon_simple-spip
git clone https://github.com/BoOz/simple-spip.git
```

Créer un fichier config/mes_options.php contenant au moins
```
<?php
$GLOBALS['dossier_squelettes'] = "www:simple-spip" ;
```

Créer un repertoire `www` pour le projet.




* de manière analogue au systeme Z SPIP.
