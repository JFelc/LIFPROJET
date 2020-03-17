/* Requetes sur les Numeros de departements */

db.A2016.find({dep:69}) /* Celui-ci il faut ecrire dep en minuscule */

db.A2017.find({DEP:"69"}) /* 2017 avec guillemets sur le numero de département */

db.A2018.find({DEP:69})


/* Requetes sur les villes */

db.A2016.find({libcom_red:"Saint-Priest"}) /* Celui-ci il faut l'ecrire avec les majuscules seulement dans les initiales */

db.A2017.find({libcom17:"SAINT-PRIEST"})

db.A2018.find({LIBCOM:"SAINT-PRIEST"})


/* Requetes sur code Postal */

db.A2016.find({CODEPOSTAL_red:69800})

db.A2017.find({CODEPOSTAL_red:"69800"}) /* 2017 avec guillemets sur le code postal */

db.A2018.find({CODEPOSTAL:69800})


/* Requetes sur l'Energie */

db.A2016.find({DPEENERGIE_red:"E"})

db.A2017.find({DPEENERGIE_red:"E"})

db.A2018.find({DPEENERGIE:"E"})


/* Requetes surl'effet serre */

db.A2016.find({DPESERRE_red:"A"})

db.A2017.find({DPESERRE_red:"A"})

db.A2018.find({DPESERRE:"A"})


/* Requetes sur l'Année de construction */

db.A2016.find({CONSTRUCT_red:"1941"})

db.A2017.find({construct_red:"1941"})

db.A2018.find({CONSTRUCT:1941}) /* Celui-ci sans guillemets */


/* Requete sur le type de construction : I => Individuel; C => Collectif; E => Etudiant */

db.A2016.find({TYPECONST_red:"C"})

db.A2017.find({TYPECONST_red:"C"})

db.A2018.find({TYPECONST:"C"})


/* Requete sur le nombre de pièces : > "$gt" ; >= "$gte" ; < "$lt" ; <= "$lte" */

db.A2016.find({NBPIECE_red:{"$gt": "3"}})

db.A2017.find({nbpiece_red:{"$gt": "3"}})

db.A2018.find({NBPIECE:{"$gt": 3}}) /* Sans guillemets */


/* Requetes sur les villes avec un select distinct */


db.runCommand({"distinct" : "A2016", "key" : "libcom_red"})

db.runCommand({"distinct" : "A2017", "key" : "libcom17"})

db.runCommand({"distinct" : "A2018", "key" : "LIBCOM"})