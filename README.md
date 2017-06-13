# simple-spip
Installer rapidement un site SPIP + Semantic-ui


Simple-spip est un modèle de site SPIP (www.spip.net) qui permet d'afficher des données et des pages web rapidement.

- Les pages sont affichées dans un unique gabarit `sommaire.html` qui inclue lui-même les pages `pages/nom_de_la_page.html` *.
- Le contenu des pages est généré par les squelettes SPIP placés dans le répertoire `pages`
- L'affichage est produit avec l'interface Semantic-ui : http://semantic-ui.com/

## Personnalisation
- les fichiers par defaut de `simple-spip` sont surchargés par les fichiers placés dans le répertoire `www` (à créer).
- pour créer une page web, ajouter un squelette spip avec le contenu de la page dans le répertoire `pages`, puis afficher la page `mon_site/?page=nom_de_la_page`

### Chargement asynchrones de blocs

Charger en ajax le bloc `inclure/alertes.html` avec `class="async_load"` et `data-fond="inclure/alertes"`
```
<div data-fond="inclure/alertes" data-param="var,value,var2,value2" class="async_load"></div>
```
### Blocs en temps réel

Recharger un bloc au focus avec `class=live_focus`
```
<div data-fond="inclure/bloc" data-param="var,value,var2,value2" class="async_load live_focus">
```

Recharger un bloc au clic avec `class=live_click`
```
<div data-fond="inclure/bloc" data-param="var,value,var2,value2" class="live_click">
```

### Mode accès restreint
- Avec l'option accès restreint activée, l'accès est soumis à l'identification par email et mot de passe.

### Afficher du code
```
[<code><pre>(#ENV**|unserialize)</pre></code>]
```

## Installation

Pour créer un nouveau projet `simple-spip` nommé `mon_site`, taper dans le terminal :

```
cd mon_site
svn co svn://trac.rezo.net/spip/branches/spip-3.1/ ./
git clone https://github.com/BoOz/simple-spip.git
```
Créer un repertoire `www` pour le projet.

Créer un fichier config/mes_options.php contenant au moins
```
<?php
if(_DIR_RESTREINT)
	$GLOBALS['dossier_squelettes'] = "www:simple-spip" ;

```

Installer SPIP `mon_site/ecrire`.






----------

* de manière analogue au systeme Z SPIP.
