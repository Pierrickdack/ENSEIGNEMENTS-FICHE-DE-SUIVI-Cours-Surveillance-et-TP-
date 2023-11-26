import 'package:firstapp/fiche_suivi.dart';
import 'package:flutter/painting.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:firstapp/connexion_delegué.dart';


class AccueilPage extends StatefulWidget {
  const AccueilPage({super.key});

  @override
  State<AccueilPage> createState() {
    return _AccueilPage();
  }
}

class _AccueilPage extends State<AccueilPage> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        home: Scaffold(
            body: SizedBox(
      width: double.infinity,
      height: double.infinity,
      child: Stack(
        fit: StackFit.expand,
        children: [
          Image.asset(
            "assets/images/imagefond2.jpg",
            fit: BoxFit.fill,
          ),
          Column(
              mainAxisAlignment: MainAxisAlignment.center,
              mainAxisSize: MainAxisSize.max,
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                const Text(
                  "BIENVENUE SUR NOTRE PLATE FORME DE GESTION DES ENSEIGNEMENTS",
                  style: TextStyle(
                      fontSize: 40,
                      color: Colors.white,
                      fontFamily: "Times New Roman"),
                  textAlign: TextAlign.center,
                ),
                //Image.asset("assets/images/logouniv.jpg",),
                const SizedBox(
                  height: 130,
                ),
                const Text(
                  "Connecter en tant que:",
                  textAlign: TextAlign.center,
                  style: TextStyle(
                    fontStyle: FontStyle.italic,
                    fontSize: 25,
                    fontWeight: FontWeight.bold,
                    color: Colors.white,
                  ),
                ),
                const SizedBox(
                  height: 40,
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    ElevatedButton(
                      onPressed: () {},
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(Size(250, 40)),
                        backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 201, 70, 111)),
                      ),
                      child: const Text(
                        "professeur", 
                        style: TextStyle(
                          fontSize: 25,
                          color: Colors.black,
                          fontFamily: "Arial"
                        ),
                      ),
                    ),
                    const SizedBox(
                      width: 10,
                    ),
                    ElevatedButton(
                      onPressed: () {
                        
                      },
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(Size(250, 40)),
                        backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 201, 70, 111)),
                      ),
                      child: const Text(
                        "Administrateur",
                        style: TextStyle(
                          fontSize: 25,
                          color: Colors.black,
                        ),
                      ),
                    ),
                    const SizedBox(
                      width: 10,
                    ),
                    ElevatedButton(
                      onPressed: () {
                        Navigator.of(context).push(MaterialPageRoute(
                            builder: (_) => const ConnexionDelegue()));
                      },
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(Size(250, 40)),
                        
                        backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 201, 70, 111)),
                      ),
                      child: const Text(
                        "Etudiant",
                        style: TextStyle(
                          fontSize: 25,
                          color: Colors.black,
                        ),
                      ),
                    ),
                  ],
                ),
              ]),
        ],
      ),
    )));
  }
}
