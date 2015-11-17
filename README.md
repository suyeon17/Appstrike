# Application Vulnérable
Bonjour Les amis : 
Voila les notes principales :

#1-SQL injection : 
On peut exploiter la faille de sécurité dans le fichier press.php par la téchnique SQL injection .
Ce dernier contient une fonction de test des requetes , si la requetes est fausse , il retourne l'erreur exacte il facilite les choses .
1-1)Méthode de l'exploitation
On ajoute après "id= " la ligne suivante : 
99' UNION select * from users WHERE users.id ='1' AND id>'
1-2)Queleque explications !
99 : C'est l'id d'un article normalement qui n'existe pas , c'est obligatoir car la fonction qui charge l'article ne charge qu'un seul enregistrement 
donc si on charge un article qui existe on ne peut pas visualiser le résultat de SQL Injection . (réviser le code press.php)
Union : Par contre JOIN qui ajoute les colonnes Union qui ajoute les enregistrements 
users.id >' : users.id ='1' suffit de récuperer le mot de passse on ajoute id>' pour fermer les '' le fichier va lire id>'' c àd id > 0 .
----------------------------------------------------------------------------------------------------------------------------------------------------
#2-Upload de fichier : 

2-1)Méthode de l'exploitation
Dans la page add.php on peut charger un fichier php directement ,
pour que l'exploitation sera efficace , il est préferable de charger un shellWEB comme C99 , C100 ou R57 .
2-2)Queleque explications !
Vous pouver télécharger les shells  à partir de http://www.c99.me/ .ils sont trés trés trés dangereux .
Avant de tester ça , désactiver l'antivirus de PC .
----------------------------------------------------------------------------------------------------------------------------------------------------
#3-Brute Forcing 
3-1)Queleque explications :
Normalement nous avons récuperer le mot de passe (phase 1) mais ce mot de passe est crypté par le hash MD5
Donc nous devons le décrypter biensur , pour savoir le mot de passe .
Il existe 2 méthode trés connu soit utiliser un dico ou bien bruteforcing par récursivité : 
3-2)Méthode de l'exploitation :
Nous avons utilisé deux outils différent :
Sous windows : Nous avons utilisé CAIN and ABDEL http://www.oxid.it/cain.html
Nous avons déja l'utilisé avec Mr.Benhmed dans un ancien TP .
Sous multiplatforme :https://hashkiller.co.uk/md5-decrypter.aspx
ce site est connecté avec des serveurs tréééés puissant ,
comme vous saviez le mot de passe de utilisateur admin est password , j'ai créer un autre utilisateur yassir essayer de trouver son passe
avec ce site c'est moins d'une seconde .
----------------------------------------------------------------------------------------------------------------------------------------------------
#4-Command Excution
4-1)Queleque explications :
Cette partie peut fonctionner en windows et on linux aussi , j'ai préparer un fichier de commande zip dans le meme répertoire de fichier backup 
process/ pour pouvoir executer la commande sous windows et elle fonctionne parfaitement .
la commande à executer normalement c'est : zip -r nom_de_fichier_zip.zip nom_de_dossier_a_compresser 
comme vous observer le fichier à entrer c'est au milieu c'est à dire c'est un peut dificile à l'exploiter .
4-2)Méthode de l'exploitation :
Pour exploiter cette faille il suffit d'ecrire
fakename.zip backup.php && ping 8.8.8.8 && zip realname
La commande Ping peut remplacer par n'importe quel commande et les nom fake and real aussi , on peut remplacer un fichier backup.php
par un fichier qui existe sur le serveur si nn le programe zip ne peut pas trouver le fichier et va envoyer un erreur , alors que l'excution va s'arrter 
donc on ne peut pas executer la deuxieme instruction
l'ajout de zip realname est obligatoire car le variable filename n'existe pas  la fin de fichier 
zip -r ../backups/".$_GET['filename'].".zip ../../../Newspaper_managemen
----------------------------------------------------------------------------------------------------------------------------------------------------
#5-Observation general :
Un fichier sql est uploded avec le programme essayer de l'importer à la base de donnée avant de manipuler
Le nouveau nom de la base de donnée est choisi par akram : app 
----------------------------------------------------------------------------------------------------------------------------------------------------
Merci de Lire cette petite documentation .
Mat9oloxi kanktebo rapport ghir les profs hhhhhhh .






