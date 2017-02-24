# simple-spip
Installer rapidement un site SPIP + Semantic-ui


Simple-spip est un modèle de site SPIP (www.spip.net) qui permet d'afficher des données et des pages web rapidement.

- Les pages du site sont des squelettes SPIP placés dans le répertoire `pages`
- Les pages sont affichées avec l'interface Semantic-ui : http://semantic-ui.com/

## Personnalisation
- les fichiers par defaut de `simple-spip` sont surchargés par les fichiers placés dans le répertoire `www`.

### Mode accès restreint
- Avec l'option accès restreint activée, l'accès est soumis à l'identification par email et mot de passe.

## Installation

Pour créer un nouveau projet `simple-spip` nommé `mon_simple_spip`, taper dans le terminal :

```
git clone https://github.com/spip/SPIP.git mon_simple-spip
cd mon_simple-spip
git clone https://github.com/BoOz/simple-spip.git
```

Créer un fichier config/mes_options.php
```
<?php
$GLOBALS['dossier_squelettes'] = "www:simple-spip" ;
```
