
Contexte:

Grace aux enquêtes salariés que nous administrons, nous récoltons des notes par entreprises que nous pouvons mettre à la disposition des visiteurs.
Les visiteurs de notre site étant souvent en recherche d'emploi, nous avons souhaité leur proposer des offres directement sur un site.
Pour cela, notre partenaire - le site d'emploi Regionsjob.com - nous transmet ses offres d'emploi via un flux XML.
 
Le code de ce petit projet permet l'import de ces offres dans notre système depuis ligne de commande.
- `./init.sh` pour initialiser et lancer le projet
- `./run-import.sh` pour lancer l'import
- `./clean.sh` pour arrêter et nettoyer le projet
- http://localhost:8000/ (`root` / `root`): interface phpMyAdmin pour visualiser le contenu de la base de donnée

Un nouveau partenaire - le site JobTeaser.com - nous propose également de rediffuser ses offres d'emploi.
(On peut supposer qu'**il y aura probablement d'autres partenaires dans le futur**…)

Mettez à jour le code (et le modèle de données si besoin) pour importer le nouveau flux `jobteaser.xml`.
