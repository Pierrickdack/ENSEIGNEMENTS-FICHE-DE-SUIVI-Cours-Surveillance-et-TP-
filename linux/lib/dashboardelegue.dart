import 'package:firstapp/fiche_suivi.dart';
import 'package:flutter/material.dart';
import 'package:firstapp/models/fiche.dart';

class DashboardDelegue extends StatefulWidget {
  const DashboardDelegue({super.key});

  @override
  State<DashboardDelegue> createState() {
    return _DashboardDelegue();
  }
}

class _DashboardDelegue extends State<DashboardDelegue> {
  List<Fiche>? fiches;
  TextEditingController search = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          backgroundColor: const Color.fromARGB(255, 2, 53, 95),
          title: const Text("DASHBOARD"),
          centerTitle: true,
        ),
        body: Container(
          decoration: const BoxDecoration(
            color: Color.fromARGB(255, 189, 209, 243),
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            mainAxisSize: MainAxisSize.max,
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              const SizedBox(height: 40),
              /*SearchBar(
                controller: search,
                leading: const Icon(Icons.search),
                hintText: "SEARCH",
                hintStyle: MaterialStateProperty.all(
                    const TextStyle(color: Colors.grey)),
                backgroundColor: MaterialStateProperty.all(
                    const Color.fromARGB(255, 204, 233, 245)),
              ),*/
              const SizedBox(
                height: 10,
              ),
              Container(
                margin: const EdgeInsets.all(25),
                padding: const EdgeInsets.only(left: 20),
                width: 350,
                height: 70,
                decoration: const BoxDecoration(
                  color: Color.fromARGB(255, 254, 250, 213),
                  border: Border(
                    top: BorderSide(color: Colors.yellow, width: 3.0),
                    left: BorderSide(color: Colors.yellow, width: 3.0),
                    bottom: BorderSide(color: Colors.yellow, width: 3.0),
                    right: BorderSide(color: Colors.yellow, width: 3.0),
                  ),
                  borderRadius: BorderRadius.all(
                    Radius.circular(10),
                  ),
                ),
                child: Row(
                  children: [
                    const Text(
                      "FICHE DE SUIVI",
                      style: TextStyle(fontSize: 18),
                    ),
                    const SizedBox(
                      width: 140,
                    ),
                    IconButton(
                      alignment: Alignment.centerRight,
                      icon: const Icon(Icons.add),
                      onPressed: () {
                        Navigator.of(context).push(
                          MaterialPageRoute(
                            builder: (_) => const FicheSuivi(),
                          ),
                        );
                      },
                      iconSize: 35,
                      style: ButtonStyle(
                        visualDensity:
                            const VisualDensity(horizontal: 0, vertical: 0),
                        alignment: Alignment.centerRight,
                        iconColor: MaterialStateProperty.all(Colors.yellow),
                      ),
                    ),
                  ],
                ),
              ),
              Container(
                margin: const EdgeInsets.all(10),
                padding: const EdgeInsets.only(left: 30, right: 30),
                child: const Text(
                  "Cette fiche permet de suivre les informations importantes concernant une séance d'enseignement.",
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                ),
              ),
              Container(
                width: 350,
                height: 70,
                margin: const EdgeInsets.all(25),
                padding: const EdgeInsets.only(left: 20),
                decoration: const BoxDecoration(
                  color: Color.fromARGB(255, 233, 255, 234),
                  border: Border(
                    top: BorderSide(color: Colors.green, width: 3.0),
                    left: BorderSide(color: Colors.green, width: 3.0),
                    bottom: BorderSide(color: Colors.green, width: 3.0),
                    right: BorderSide(color: Colors.green, width: 3.0),
                  ),
                  borderRadius: BorderRadius.all(
                    Radius.circular(10),
                  ),
                ),
                child: Row(
                  children: [
                    const Text(
                      "FICHE DE SURVEILLANCE",
                      style: TextStyle(fontSize: 18),
                    ),
                    const SizedBox(
                      width: 60,
                    ),
                    IconButton(
                      icon: const Icon(Icons.add),
                      onPressed: () {},
                      iconSize: 35,
                      style: const ButtonStyle(
                        visualDensity:
                            VisualDensity(horizontal: 0, vertical: 0),
                        alignment: Alignment.centerLeft,
                      ),
                    ),
                  ],
                ),
              ),
              Container(
                margin: const EdgeInsets.all(10),
                padding: const EdgeInsets.only(left: 30, right: 30),
                child: const Text(
                  "Cette fiche est utilisée pour consigner les informations liées a la surveillance d'examens ou de sessions de travail.",
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                ),
              ),
              Container(
                width: 350,
                height: 70,
                margin: const EdgeInsets.all(25),
                padding: const EdgeInsets.only(left: 20),
                decoration: const BoxDecoration(
                  color: Color.fromARGB(255, 202, 229, 251),
                  border: Border(
                    top: BorderSide(color: Colors.blue, width: 2.0),
                    left: BorderSide(color: Colors.blue, width: 2.0),
                    bottom: BorderSide(color: Colors.blue, width: 2.0),
                    right: BorderSide(color: Colors.blue, width: 2.0),
                  ),
                  borderRadius: BorderRadius.all(
                    Radius.circular(10),
                  ),
                ),
                child: Row(
                  children: [
                    const Text(
                      "FICHE DE STRAVAUX PRATIQUES",
                      style: TextStyle(fontSize: 18),
                    ),
                    IconButton(
                      alignment: Alignment.centerLeft,
                      icon: const Icon(Icons.add),
                      onPressed: () {},
                      iconSize: 35,
                      style: ButtonStyle(
                        visualDensity:
                            const VisualDensity(horizontal: 0, vertical: 0),
                        alignment: Alignment.centerRight,
                        iconColor: MaterialStateProperty.all(Colors.blue),
                      ),
                    ),
                  ],
                ),
              ),
              Container(
                margin: const EdgeInsets.all(10),
                padding: const EdgeInsets.only(left: 30, right: 30),
                child: const Text(
                  "Cette fiche est conçue pour enregistrer les details des travaux pratiques réalisés en laboratoires ou en salle spécialisée.",
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                ),
              ),
            ],
          ),
        ),
        bottomNavigationBar: Container(
          decoration:
              const BoxDecoration(color: Color.fromARGB(127, 189, 187, 187)),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              IconButton(
                padding: const EdgeInsets.only(left: 20, right: 20),
                iconSize: 40,
                color: const Color.fromARGB(255, 5, 48, 69),
                onPressed: () {},
                icon: const Icon(Icons.home),
              ),
              IconButton(
                padding: const EdgeInsets.only(left: 20, right: 20),
                iconSize: 40,
                color: const Color.fromARGB(255, 5, 48, 69),
                onPressed: () {},
                icon: const Icon(Icons.book),
                style: ButtonStyle(
                    iconSize: MaterialStateProperty.all(30),
                    iconColor: MaterialStateProperty.all(Colors.purple)),
              ),
              IconButton(
                padding: const EdgeInsets.only(left: 20, right: 20),
                iconSize: 40,
                color: const Color.fromARGB(255, 5, 48, 69),
                onPressed: () {},
                icon: const Icon(Icons.delete),
                style: ButtonStyle(
                    iconSize: MaterialStateProperty.all(30),
                    iconColor: MaterialStateProperty.all(Colors.purple)),
              ),
              IconButton(
                padding: const EdgeInsets.only(left: 20, right: 20),
                iconSize: 40,
                color: const Color.fromARGB(255, 5, 48, 69),
                onPressed: () {},
                icon: const Icon(Icons.person),
                style: ButtonStyle(
                    iconSize: MaterialStateProperty.all(30),
                    iconColor: MaterialStateProperty.all(Colors.purple)),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
