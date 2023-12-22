import 'package:firstapp/accueil_page.dart';
import 'package:firstapp/dashboardelegue.dart';
import 'package:firstapp/fiche_suivi.dart';
import 'package:flutter/material.dart';

class ConnexionDelegue extends StatefulWidget {
  const ConnexionDelegue({super.key});

  @override
  State<ConnexionDelegue> createState() {
    return _ConnexionDelegue();
  }
}

class _ConnexionDelegue extends State<ConnexionDelegue> {
  TextEditingController nom = TextEditingController();
  TextEditingController matricule = TextEditingController();
  TextEditingController code = TextEditingController();

  String name = "";
  String matricul = "";
  String cod = "";
  String errroeText = "";

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        resizeToAvoidBottomInset: false,
        appBar: AppBar(
          backgroundColor: const Color.fromARGB(255, 2, 53, 95),
          leading: IconButton(
            icon: const Icon(Icons.arrow_back),
            onPressed: () {
              Navigator.of(context).pop();
            },
          ),
          title: const Text("CONNEXION"),
          centerTitle: true,
        ),
        body: Container(
          decoration:
              const BoxDecoration(color: Color.fromARGB(255, 230, 251, 226)),
          child: Container(
            padding: const EdgeInsets.symmetric(),
            margin: const EdgeInsets.all(40),
            child: ListView(
              children: [
                Column(
                  crossAxisAlignment: CrossAxisAlignment.center,
                  mainAxisAlignment: MainAxisAlignment.center,
                  mainAxisSize: MainAxisSize.max,
                  children: [
                    const Text(
                      "CONNEXION",
                      style: TextStyle(fontSize: 40, color: Colors.black),
                    ),
                    const SizedBox(
                      height: 100,
                    ),
                    SizedBox(
                      height: 20,
                      width: 5,
                      child: Text(
                        errroeText,
                        style: const TextStyle(color: Colors.red),
                      ),
                    ),
                    TextField(
                      controller: nom,
                      decoration: const InputDecoration(
                        label: Text(
                          "nom et prenom",
                          style: TextStyle(
                            color: Colors.black,
                          ),
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Colors.blue),
                          borderRadius: BorderRadius.all(
                            Radius.circular(30),
                          ),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 15,
                    ),
                    TextField(
                      controller: matricule,
                      decoration: const InputDecoration(
                        label: Text(
                          "matricule",
                          style: TextStyle(
                            color: Colors.black,
                          ),
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Colors.blue),
                          borderRadius: BorderRadius.all(
                            Radius.circular(30),
                          ),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 15,
                    ),
                    TextField(
                      controller: code,
                      decoration: const InputDecoration(
                        label: Text(
                          "code",
                          style: TextStyle(
                            color: Colors.black,
                          ),
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color.fromARGB(255, 128, 130, 132),
                          ),
                          borderRadius: BorderRadius.all(
                            Radius.circular(30),
                          ),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 40,
                    ),
                    TextButton(
                      onPressed: () {},
                      child: const Text(
                        "Mot de passe oublié ?",
                        style: TextStyle(
                            fontSize: 20, fontStyle: FontStyle.italic),
                      ),
                    ),
                    ElevatedButton(
                      onPressed: () {
                        if (nom.text.isEmpty ||
                            code.text.isEmpty ||
                            matricule.text.isEmpty) {
                          errroeText =
                              "Vous devez remplir tous les champs avant soumission";
                        } else {
                          Navigator.of(context).push(
                            MaterialPageRoute(
                              builder: (_) => const DashboardDelegue(),
                            ),
                          );
                        }
                      },
                      style: ButtonStyle(
                        backgroundColor: MaterialStateProperty.all(
                            const Color.fromARGB(255, 2, 53, 95)),
                      ),
                      child: const Text(
                        "Se connecter",
                        style: TextStyle(fontSize: 20),
                        textAlign: TextAlign.center,
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
