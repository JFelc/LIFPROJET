# Projet de Visualisation de données pour des logements sociaux

## Objectif
Le but de ce projet est de permettre à des utilisateurs de réaliser des recherches sur des zones ou villes en particulier pour étudier l'évolution de l'indice DPE au fil des années.
Le projet permet actuellement de filtrer des résultats selon certains critères via la base de données et d'utiliser les mêmes critère pour afficher ce que vous souhaitez. 


## Installation
### En cas de problème
Le site utilise un serveur Apache ainsi qu'une base de données MongoDB. Si vous l'utiliser sur le serveur fourni, les services Apache et MongoDB devrait déjà être présents. 
Si le serveur Apache a été redémarré et que MongoDB n'est plus en marche, veuillez suivre les instructions suivantes :
Ouvrez un terminal sous Linux et connectez vous en ssh au serveur via la commande suivante : `ssh logementsociaux@lif.sci-web.net `.
Si vous ne connaissez pas le mot de passe, c'est que vous n'êtes pas censé le connaître au départ, donc je n'y peux rien. 
Lancez ensuite la commande `sudo mongod`. Relancez un nouveau terminal et connectez vous de nouveau au serveur. 
Ensuite, lancez `mongo` pour vérifier que la base de données est lancée. 

## Organisation 

### vue
#### filter
Le dossier vue contient deux fichiers PHP : Map.php et Filter.php. Filter.php est la page responsable du filtre, il réalise un appel AJAX à un fichier json pour récupérer les noms des département et leurs numéros et il en réalise un autre à la base de données pour appeler les noms des villes.
En fonction de votre choix, à chaque fois, une partie du site disparait pour laisser place unqiquement à la zone que vous avez choisi.
Il utilise un système de datalist, une balise HTML, pour réaliser une liste qui fait des suggestions. Il se base donc sur les informations que vous avez choisi pour cela.
#### Map
Map.php est le fichier gérant la carte, il réalise lui aussi un appel AJAX pour récupérer les données et les afficher.
IL récupère des résultats sous la forme d'un json et les traites. Il pose alors un marker à chaque coordonnées qui lui a été passée, tout en vérifiant au préalable l'indice DPE pour lui assigner la couleur correspondante.
Enfin, nous avons 2 tableaux, vide au départ, que nous incrémentons pour réaliser les graphiques. A chaque fois qu'un nouveau logement social est traité, on incrémente une case du tableau, en fonction de son indice. A la fin, on affiche les graphqiques en fonction des résultats dans les tableaux. Bien entendu, le premier tableau traite une année, et le second, l'année suivante.

### static
Ce dossier contient le squelette du site, ce sont simplement des fichiers fixes. Soit la page d'accueil, soit le footer et la navbar.
Rien de particulier ici.


### requests
Ce dossier contient les fichiers utilisés dans les appals AJAX. 2 de ces fichiers utilisent la base de données et le dernier est simplement un json.
Les fichiers PHP créent une requête Mongo pour faire appel à la base de données et effectuent le filtre demandé. 

### leaflet-color-marker-master/include
Les différentes librairies que nous utilisons, ainsi qu'un fichier permettant de faire les liens entre les fichiers.
Leaflet-color-maakrer est la libraire que nous utilisons pour les markers de couleurs. Nous avons légèrement modifié les images pour qu'elles correspondent à l'échelle DPE
Leaflet est la libraire utilisée dans la création et l'utilisation de la carte.
Et dans node_modules se cache Chart.js, la librairie permettant la création de graphique.

### Images
Les images que nous avons utilisés

### css
Le css est une feuille de stlye qui permet de manipuler l'apparence d'une page web. Nous disposons donc d'un fichier css pour chaque page.


## Résultats
![Image Résultat](/Images/Capture.PNG?raw=true)
