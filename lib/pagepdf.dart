import 'dart:typed_data';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:pdf/pdf.dart';
import 'package:pdf/widgets.dart' as pw;

class PagePdf extends StatefulWidget {
  const PagePdf({
    Key? key,
    required this.cours,
    required this.prof,
    required this.code,
    required this.titre,
    required this.salle,
    required this.heuredebut,
    required this.heurefin,
    required this.duree,
    required this.date,
    required this.semestre,
    required this.nature,
    required this.contenu,
    required this.signP,
    required this.signD,
  }) : super(key: key);

  final String cours;
  final String prof;
  final String code;
  final String titre;
  final String salle;
  final TimeOfDay heuredebut;
  final TimeOfDay heurefin;
  final TimeOfDay duree;
  final DateTime date;
  final int semestre;
  final String nature;
  final String contenu;
  final Uint8List signP;
  final Uint8List signD;

  @override
  State<PagePdf> createState() {
    return _PagePdf();
  }
}

class _PagePdf extends State<PagePdf> {
  final fichepdf = pw.Document;

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          centerTitle: true,
          title: const Text(
            "APERCU",
            style: TextStyle(
              fontSize: 22,
            ),
          ),
          backgroundColor: const Color.fromARGB(255, 2, 53, 95),
          leading: IconButton(
            icon: const Icon(Icons.arrow_back),
            onPressed: () {
              Navigator.of(context).pop();
            },
          ),
          actions: [
            TextButton(
              onPressed: () {},
              child: const Text(
                "Modifier",
                style: TextStyle(
                  fontSize: 18,
                  color: Color.fromARGB(255, 206, 205, 205),
                ),
              ),
            )
          ],
        ),
        body: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          mainAxisSize: MainAxisSize.min,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Container(
              margin: const EdgeInsets.only(left: 15, right: 15),
              child: Row(
                children: [
                  Column(
                    children: const [
                      Text(
                        "REPUBLIQUE DU CAMEROUN",
                        style: TextStyle(fontSize: 10),
                      ),
                      Text(
                        "BLABLABLA",
                        style: TextStyle(fontSize: 10),
                      ),
                      Text(
                        "REPUBLIQUE DU CAMEROUN",
                        style: TextStyle(fontSize: 10),
                      )
                    ],
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  Image.asset(
                    "assets/images/logouniv.jpg",
                    width: 90,
                    height: 90,
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  Column(
                    children: const [
                      Text("REPUBLIQUE DU CAMEROUN",
                          style: TextStyle(fontSize: 10)),
                      Text("BLABLABLA", style: TextStyle(fontSize: 10)),
                      Text("REPUBLIQUE DU CAMEROUN",
                          style: TextStyle(fontSize: 10))
                    ],
                  ),
                ],
              ),
            ),
            const SizedBox(
              height: 30,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Libellé du cours: ",
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  widget.cours,
                  style: const TextStyle(
                    fontSize: 20,
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Nom du professeur: ",
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  widget.prof,
                  style: const TextStyle(
                    fontSize: 20,
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Code de la matière :",
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  widget.code,
                  style: const TextStyle(
                    fontSize: 20,
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Titre de la séance :",
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  widget.titre,
                  style: const TextStyle(
                    fontSize: 20,
                  ),
                ),
              ],
            ),
            const SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Numéro de la salle :",
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                ),
                Text(
                  widget.salle,
                  style: const TextStyle(
                    fontSize: 20,
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
