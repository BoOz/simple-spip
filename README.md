# simple-spip
Installer rapidement un site SPIP + Semantic-ui


Simple-spip est un modèle de site SPIP (www.spip.net) qui permet d'afficher des données et des pages web rapidement.

- Les pages du site sont des squelettes SPIP placés dans le répertoire `pages`
- Les pages sont affichées avec l'interface Semantic-ui : http://semantic-ui.com/

** Personnalisation **

- les pages et fichiers par defaut de `simple-spip` sont surchargés par les fichiers placés dans le répertoire `www`.

Mode accès restreint
- Avec l'option accès restreint activée, l'accès est soumis à l'identification par email et mot de passe.

** Installation **

Dans le terminal
```
cd la/ou/est/spip
git clone ...
```

Dans mes_options.php
```
$GLOBALS['dossier_squelettes'] = "www:simple-spip" ;
```
