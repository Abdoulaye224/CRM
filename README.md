#CRM

## Commencer

Pour exécuter le projet, vous devrez vérifier les exigences de votre machine locale et installer les outils nécéssaires.

### Exigences
- docker, docker-compose
- composer
``, ou tout simplement Symfony5 et au moins la version 7.2 de PHP pour ceux qui n'aiment pas Docker 😜
``
### Pour ceux qui n'utilisent pas Docker :

vous n'avez qu'à extraire les fichiers/dossiers après avoir cloner le projet lancer l'application en local. Le travail ne devrait
pas être compliqué pour vous normalement.


### Pour les grands fans de Docker ✌✌:

- Voici les commandes pour vous, pour faire touner l'application sur votre machine en toute confiance:

```
# si vous utilisez Docker aupparavant, alors assurez d'avoir arreter tous vos containers avant, pour éviter les confliste de ports et autres.. 
 docker-compose down


# Mettez vous bien à la racine du projet et tapez cette commande afin de lancer l'application tout en installant toutes les dépendances
docker-compose up --build

#Tapez cette commande ensuite pour créer toutes les tables nécéssaires au bon fonctionnement de l'application dans la base mysql
docker-compose exec web php bin/console doctrine:migration:migrate
```


#### Data Fixtures 😉

Pour les plus malins, vous pouvez taper cette commande qui vous créera des fausses données, afin de ne pas avoir à créer des données à la main pour faire des Tests.
```
docker-compose exec web php bin/console doctrine:fixtures:load
```
L'application est lancée sur le port ```8010``` ou 192....8000 pour les utilisateurs de Docker Toolbox.

#### Accès base de données
placez vous bien dans le dossier /app et faites
```
  docker-compose exec db mysql -u crm -pcrm
```
Attention ! l'option "winpty" pourrait être nécéssaire pour les utilisateurs windows --> "winpty docker-compose exec db mysql -u crm -pcrm
"
## Soutien

Veuillez 
[signaler un problème](https://github.com/Abdoulaye224/cardGame/issues)
pour obtenir de l'aide.
