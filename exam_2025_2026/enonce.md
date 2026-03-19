# Examen Sûreté et Sécurité 19/03/2026 2026

Répondez aux questions suivantes et envoyez les réponses par mail. Vous pouvez répondre dans le format de votre choix 
tant que je peux lire sans problème.

L'examen est divisé en deux parties : une partie où vous devrez répondre à des questions d'ordre général, et une seconde 
partie qui vous demandera d'analyser des applications vulnérables afin de déterminer les vulnérabilités existantes, la 
façon de les exploiter et comment y remédier.

# Partie I Quelques questions
Répondez aux questions suivantes.

### I.1 Question 1
D'après vous, de quoi peut dépendre la sécurité d'une application, qu'il s'agisse d'une application web ou d'une application native ?

### I.2 Question 2
En utilisant la commande `sudo -l`, qui permet de voir les droits accordés par `sudo` à l'utilisateur courant, vous 
obtenez la réponse suivante :
```
User user may run the following commands on host:
    (root) NOPASSWD: /usr/bin/find
```
Que signifie cette sortie ? Qu'est en mesure de faire l'utilisateur ?

### I.3 Question 3
Que pouvez-vous dire sur le code PHP suivant, utilisé pour générer une page HTML ?
```php
<div class="d-block <?php echo $_GET['class'] ?? '' ?>">Bonjour</div>
```

Donner un exemple d'exploitation en indiquant l'effet attendu.

### I.4 Question 4
Un service web vous propose d'effectuer un ping vers un hôte de votre choix, et vous renvoie la sortie de la commande 
`ping` associée. Quelle vulnérabilité peut être présente et comment pouvez-vous tester son exploitabilité ?

### I.5 Question 5
Soit le code Javascript suivant, effectuant une requête à une base de données :
```js
notes = db->execute(`SELECT titre, description FROM Notes WHERE id = {id};`);
```

En supposant que vous puissiez contrôler la valeur de la variable `id`, à quel type d'attaque est vulnérable ce code ? 
Comment pouvez-vous exploiter cette vulnérabilité afin de lire la colonne `secret` de la table `flag` ?


# Partie II Challenges

Cette partie est composée de plusieurs challenges, qui sont des applications vulnérables à lancer sur vos machines à 
l'aide de `Docker` (ou équivalent, `Podman` par exemple).
Chaque application est accompagnée d'un fichier `compose.yaml` permettant de lancer facilement le challenge à l'aide 
`docker compose` ou `podman-compose`.
Au CREMI, il faut configurer `podman` pour pouvoir télécharger les images, voir l'intranet du CREMI qui vous indiquera 
quels alias utiliser pour configurer `podman` correctement.

## II.1 Challenge 1 un peu de Linux

Les éléments de ce challenge sont dans le sous-dossier `challenge_1`.
Le but du challenge sera, depuis un shell avec peu de droits, d'aller lire le fichier `/home/cracked/flag/flag.txt`.

### II.1.1 Docker
En regardant le fichier `compose.yaml`, combien y a-t-il de services Docker dans ce challenge ? Quels sont leurs noms ? 
Comment sont construits les services ?

### II.1.2 Bash
Lancez un shell dans le service `app` à l'aide de la commande `podman-compose exec app bash`.
Quel est le dossier courant et quel est l'utilisateur du shell ? Comment le justifier à l'aide des instructions de build 
?

### II.1.3 /opt/ls\_cracked\_files
Analysez les permissions du fichier `/opt/ls_cracked_files`. Quelles sont ces permissions ? Que permettent-elles ?

### II.1.4 ls\_cracked\_files.c
Analyser le fichier `ls_cracked_files.c` dans le dossier du challenge. Que fait ce programme ?

### II.1.5 ls\_script.sh
Analyser le contenu du fichier `ls_script.sh` depuis le dossier du projet. Que fait ce script ?

### II.1.6 Prévision
Que prévoyez-vous que fera l'éxécution du programme `/opt/ls_cracked_files` ?

### II.1.7 Exécution
Exécutez le programme `/opt/ls_cracked_files`. Voyez-vous un élément étrange dans cette sortie ?

### II.1.8 Vulnérabilité
Quelle vulnérabilité est présente dans cette application ?

### II.1.9 Exploitation
Comment peut-on exploiter la vulnérabilité pour obtenir un shell en tant que `cracked` ?

### II.1.10 Flag
Une fois le shell en tant que `cracked` obtenu, lisez le contenu du fichier `/home/cracked/flag/flag.txt`. Quel est ce 
contenu ? À quelle étape du build est-ce lié ?

### II.1.11 Correction
Comment est-il possible de corriger ce bug ? Quel fichier faudrait-il changer pour faire disparaitre la vulnérabilité, 
et comment le changer (indiquer la ou les lignes à remplacer, et par quoi les remplacer) ? Vous pouvez proposer un patch (sortie de `diff` ou `git diff`).

## II.2 Challenge 2 Un peu de web

Les éléments de ce challenge sont dans le dossier `challenge_2`.
Le but du challenge est d'accéder au flag depuis votre navigateur.

### II.2.1 Docker
En regardant le fichier `compose.yaml`, combien y a-t-il de services Docker dans ce challenge ? Quels sont leurs noms ? 
Quel service est rendu accessible depuis l'hôte, et comment y accéder ?

### II.2.2 Accès web
En regardant le fichier de build, quelle URL va-t-il falloir utiliser pour accéder au site ? Accédez au site (utiliser 
`localhost` et pas une IP, et acceptez le certificat autosigné).

### II.2.3 Description du service web
Que propose le service Web ?

### II.2.4 Implémentation
En regardant le code source de l'application Web, comment est implémenté le service (décrivez avec vos propres mots ce 
qu'effectue le code source) ?

### II.2.5 Vulnérabilité(s)
Voyez-vous des faiblesses dans l'implémentation proposée ? (Indice : il y en a, sinon ça n'aurait pas trop d'intérêt).

### II.2.6 Attaque
Quel type d'attaque peut être effectué au vu des vulnérabilités présentes dans le code ?

### II.2.7 Service interne
En regardant le fichier de build, que fait le second service ?

### II.2.8 Accès au flag
En regardant l'ensemble des fichiers présents dans le dossier du challenge, comment est-il possible d'accéder au flag ? 
Qu'est-ce qui empêche de le faire facilement ?

### II.2.9 Préparation de l'attaque
Compte tenu de l'ensemble des réponses précédentes, comment est-il possible de récupérer le flag ?

### II.2.10 Exploitation
Menez l'attaque à bien pour récupérer le flag. Où le trouvez-vous ?

### II.2.11 Correction
Comment corriger le code pour empêcher l'attaque ? Proposez une version corrigée de l'application.

