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
      debugShowCheckedModeBanner: true,
      home: Scaffold(
        body: SizedBox(
          width: double.infinity,
          height: double.infinity,
          child: Container(
            padding: const EdgeInsets.all(30),
            decoration:
                const BoxDecoration(color: Color.fromARGB(255, 2, 53, 95)),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              mainAxisSize: MainAxisSize.max,
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                const Text(
                  "BIENVENUE SUR NOTRE PLATE FORME DE GESTION DES ENSEIGNEMENTS",
                  style: TextStyle(
                      fontSize: 28,
                      color: Colors.white,
                      fontFamily: "Times New Roman"),
                  textAlign: TextAlign.center,
                ),
                //Image.asset("assets/images/logouniv.jpg",),
                const SizedBox(
                  height: 130,
                ),
                const Text(
                  "Connecter vous en tant que:",
                  textAlign: TextAlign.center,
                  style: TextStyle(
                    fontStyle: FontStyle.italic,
                    fontSize: 25,
                    fontWeight: FontWeight.bold,
                    color: Colors.white,
                  ),
                ),
                const SizedBox(
                  height: 50,
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    ElevatedButton(
                      onPressed: () {},
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(
                          Size(250, 40),
                        ),
                        backgroundColor: MaterialStatePropertyAll(
                          Color.fromARGB(255, 203, 97, 129),
                        ),
                      ),
                      child: const Text(
                        "Professeur",
                        style: TextStyle(
                            fontSize: 25,
                            color: Colors.black,
                            fontFamily: "Arial"),
                      ),
                    ),
                    const SizedBox(
                      width: 20,
                    ),
                    ElevatedButton(
                      onPressed: () {},
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(Size(250, 40)),
                        backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 203, 97, 129)),
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
                      width: 20,
                    ),
                    ElevatedButton(
                      onPressed: () {
                        Navigator.of(context).push(
                          MaterialPageRoute(
                            builder: (_) => const ConnexionDelegue(),
                          ),
                        );
                      },
                      style: const ButtonStyle(
                        fixedSize: MaterialStatePropertyAll(Size(250, 40)),
                        backgroundColor: MaterialStatePropertyAll(
                          Color.fromARGB(255, 203, 97, 129),
                        ),
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
              ],
            ),
          ),
        ),
      ),
    );
  }
}
