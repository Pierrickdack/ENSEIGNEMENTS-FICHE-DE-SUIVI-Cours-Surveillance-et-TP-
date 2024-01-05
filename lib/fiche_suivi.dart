import 'dart:ffi';
import 'dart:typed_data';
import 'package:firstapp/accueil_page.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:signature/signature.dart';
import 'package:firstapp/pagepdf.dart';
import 'dart:typed_data';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:pdf/pdf.dart';
import 'package:pdf/widgets.dart' as pw;
import 'package:path/path.dart';
import 'package:path_provider/path_provider.dart';

class FicheSuivi extends StatefulWidget {
  const FicheSuivi({super.key});

  @override
  State<FicheSuivi> createState() {
    return _FicheSuivi();
  }
}

class _FicheSuivi extends State<FicheSuivi> {
  TextEditingController cour = TextEditingController();
  TextEditingController cod = TextEditingController();
  TextEditingController prof = TextEditingController();
  TextEditingController contenu = TextEditingController();
  TextEditingController sal = TextEditingController();
  TextEditingController title = TextEditingController();
  SignatureController signatureControllerP = SignatureController(
      penStrokeWidth: 3,
      penColor: Colors.black,
      exportBackgroundColor: const Color.fromARGB(255, 205, 211, 216));
  SignatureController signatureControllerD = SignatureController(
      penStrokeWidth: 3,
      penColor: Colors.black,
      exportBackgroundColor: const Color.fromARGB(255, 205, 211, 216));
  Uint8List? signD;
  TextEditingController totalHeure = TextEditingController();
  Uint8List? signP;

  String data = "";

  String cours = "";
  String code = "";
  String professeur = "";
  String content = "";
  TimeOfDay timedebut = TimeOfDay.now();
  TimeOfDay timefin = TimeOfDay.now();
  String nature = "";
  int semestre = 0;
  DateTime date = DateTime.now();
  String salle = "";
  String titreseance = '';
  TimeOfDay total = TimeOfDay.now();

  @override
  Widget build(context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        resizeToAvoidBottomInset: false,
        appBar: AppBar(
          actions: [
            IconButton(
              onPressed: () async {},
              icon: const Icon(Icons.upload),
            )
          ],
          backgroundColor: const Color.fromARGB(255, 2, 53, 95),
          leading: IconButton(
            icon: const Icon(Icons.arrow_back),
            onPressed: () {
              Navigator.of(context).pop();
            },
          ),
          title: const Text("FICHE DE SUIVI"),
          centerTitle: true,
        ),
        body: Container(
          alignment: Alignment.center,
          padding: const EdgeInsets.all(25.0),
          decoration: BoxDecoration(
            gradient: const LinearGradient(colors: [
              Color.fromARGB(255, 227, 242, 238),
              Color.fromARGB(255, 236, 251, 252)
            ], begin: Alignment.topCenter, end: Alignment.bottomCenter),
            border: Border.all(color: Colors.black),
            borderRadius: BorderRadius.circular(10.0),
          ),
          child: ListView(
            scrollDirection: Axis.vertical,
            children: [
              TextField(
                controller: cour,
                decoration: const InputDecoration(
                  labelText: "libelé du cours",
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(50.0),
                    ),
                  ),
                ),
              ),
              const SizedBox(
                height: 5,
              ),
              TextField(
                controller: prof,
                decoration: const InputDecoration(
                  label: Text("Nom du professeur"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(50.0),
                    ),
                  ),
                ),
              ),
              const SizedBox(height: 4),
              TextField(
                controller: cod,
                decoration: const InputDecoration(
                  label: Text("code de la matiere"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(50.0),
                    ),
                  ),
                ),
              ),
              const SizedBox(height: 4),
              TextField(
                controller: title,
                decoration: const InputDecoration(
                  label: Text("Titre de la seance"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(50.0),
                    ),
                  ),
                ),
              ),
              //const TextField(),
              const SizedBox(
                height: 5,
              ),
              TextField(
                controller: sal,
                decoration: const InputDecoration(
                  labelText: "Numero de salle",
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(50.0),
                    ),
                  ),
                ),
              ),
              const SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Column(
                    children: [
                      Container(
                        decoration: const BoxDecoration(
                          borderRadius: BorderRadius.all(
                            Radius.circular(10),
                          ),
                        ),
                        child: Text(
                          timedebut.format(context),
                          style: const TextStyle(fontSize: 18),
                        ),
                      ),
                      const SizedBox(height: 10),
                      ElevatedButton(
                        style: ButtonStyle(
                          backgroundColor: MaterialStateProperty.all(
                            const Color.fromARGB(255, 2, 53, 95),
                          ),
                        ),
                        onPressed: () {
                          showTimePicker(
                            context: context,
                            initialTime: TimeOfDay.now(),
                          ).then(
                            (value) {
                              if (value == null) {
                                return;
                              }
                              setState(
                                () {
                                  timedebut = value;
                                },
                              );
                            },
                          );
                        },
                        child: const Text(
                          "Heure de debut",
                          style: TextStyle(fontSize: 18),
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(
                    width: 30,
                  ),
                  Column(
                    children: [
                      Container(
                        decoration: const BoxDecoration(
                          borderRadius: BorderRadius.all(
                            Radius.circular(10),
                          ),
                        ),
                        child: Text(
                          timefin.format(context),
                          style: const TextStyle(fontSize: 18),
                        ),
                      ),
                      const SizedBox(height: 10),
                      ElevatedButton(
                        style: ButtonStyle(
                          backgroundColor: MaterialStateProperty.all(
                            const Color.fromARGB(255, 2, 53, 95),
                          ),
                        ),
                        onPressed: () {
                          showTimePicker(
                            context: context,
                            initialTime: TimeOfDay.now(),
                          ).then(
                            (value) {
                              if (value == null ||
                                  value.hour < timedebut.hour ||
                                  (value.hour == timedebut.hour &&
                                      value.minute < timedebut.minute)) {
                                timefin = timedebut;
                                setState(
                                  () {
                                    data =
                                        "l'heure de fin est superieure a l'heure de debut";
                                  },
                                );
                              } else {
                                setState(
                                  () {
                                    data = "";
                                    timefin = value;
                                    int totaldebut =
                                        timedebut.hour * 60 + timedebut.minute;
                                    int totalfin =
                                        timefin.hour * 60 + timefin.minute;
                                    int result = totalfin - totaldebut;
                                    TimeOfDay remplace = TimeOfDay(
                                        hour: (result - (result % 60)) ~/ 60,
                                        minute: result % 60);

                                    total = remplace;
                                  },
                                );
                              }
                            },
                          );
                        },
                        child: const Text(
                          "Heure de fin",
                          style: TextStyle(
                            fontSize: 18,
                          ),
                        ),
                      ),
                    ],
                  ),
                ],
              ),
              const SizedBox(
                height: 10,
              ),
              SizedBox(
                height: 35,
                child: Text(
                  data,
                  style: const TextStyle(
                    color: Colors.red,
                    fontSize: 17,
                  ),
                ),
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                mainAxisSize: MainAxisSize.min,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Container(
                    padding: const EdgeInsets.all(10),
                    decoration: BoxDecoration(
                      borderRadius: const BorderRadius.all(Radius.circular(10)),
                      border: Border.all(
                        width: 3,
                        color: const Color.fromARGB(255, 2, 53, 95),
                      ),
                    ),
                    child: Text(
                      "Durée: ${total.format(context)}",
                      style: const TextStyle(
                        fontSize: 25,
                      ),
                    ),
                  ),
                ],
              ),
              const SizedBox(
                height: 20,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text(
                    "${date.year}-${date.month}-${date.day}",
                    style: const TextStyle(fontSize: 20),
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  ElevatedButton(
                    style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all(
                        const Color.fromARGB(255, 2, 53, 95),
                      ),
                    ),
                    onPressed: () {
                      showDatePicker(
                        context: context,
                        initialDate: DateTime.now(),
                        firstDate: DateTime(2020),
                        lastDate: DateTime.now(),
                      ).then((value) {
                        if (value == null) {
                          date = DateTime.now();
                        } else {
                          setState(() {
                            date = value;
                          });
                        }
                      });
                    },
                    child: const Text(
                      'Date',
                      style: TextStyle(fontSize: 20),
                    ),
                  )
                ],
              ),

              Row(
                children: [
                  const Text("Semestre"),
                  Radio(
                      activeColor: Colors.blue,
                      value: 1,
                      groupValue: semestre,
                      onChanged: (value) {
                        setState(() {
                          activate();
                          semestre = value!;
                        });
                      }),
                  const Text("semestre 1"),
                  Radio(
                      activeColor: Colors.blue,
                      value: 2,
                      groupValue: semestre,
                      onChanged: (value) {
                        setState(() {
                          activate();
                          semestre = value!;
                        });
                      }),
                  const Text("semestre 2"),
                ],
              ),
              Row(
                children: [
                  const Text("Nature du cours: "),
                  Radio(
                    activeColor: Colors.blue,
                    value: 'CM',
                    groupValue: nature,
                    onChanged: (value) {
                      setState(
                        () {
                          activate();
                          nature = value!;
                        },
                      );
                    },
                  ),
                  const Text("CM"),
                  Radio(
                    activeColor: Colors.blue,
                    value: 'TP',
                    groupValue: nature,
                    onChanged: (value) {
                      setState(
                        () {
                          activate();
                          nature = value!;
                        },
                      );
                    },
                  ),
                  const Text("TP"),
                  Radio(
                    activeColor: Colors.blue,
                    value: 'TD',
                    groupValue: nature,
                    onChanged: (value) {
                      setState(
                        () {
                          activate();
                          nature = value!;
                        },
                      );
                    },
                  ),
                  const Text("TD"),
                ],
              ),
              TextField(
                maxLines: 10,
                controller: contenu,
                decoration: const InputDecoration(
                  label: Text("contenu du cours"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(
                      Radius.circular(10.0),
                    ),
                  ),
                ),
              ),
              const SizedBox(
                height: 10,
              ),
              Row(
                children: [
                  Column(
                    children: [
                      const SizedBox(
                        height: 20,
                      ),
                      const Text("Signature du professeur"),
                      const SizedBox(
                        height: 7,
                      ),
                      Signature(
                        controller: signatureControllerP,
                        width: 250,
                        height: 200,
                        backgroundColor:
                            const Color.fromARGB(255, 202, 215, 221),
                      ),
                    ],
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  Column(
                    children: [
                      TextButton(
                        onPressed: () {
                          signatureControllerP.clear();
                        },
                        style: const ButtonStyle(
                          alignment: Alignment.center,
                          shape: MaterialStatePropertyAll(
                            RoundedRectangleBorder(
                              borderRadius: BorderRadius.all(
                                Radius.circular(50),
                              ),
                            ),
                          ),
                          backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 230, 151, 146),
                          ),
                        ),
                        child: const Text(
                          "clean",
                          style: TextStyle(
                            color: Colors.black,
                            fontSize: 17,
                          ),
                        ),
                      ),
                      TextButton(
                        onPressed: () async {
                          signP = await signatureControllerP.toPngBytes();
                        },
                        style: const ButtonStyle(
                          alignment: Alignment.center,
                          shape: MaterialStatePropertyAll(
                            RoundedRectangleBorder(
                              borderRadius: BorderRadius.all(
                                Radius.circular(50),
                              ),
                            ),
                          ),
                          backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 138, 241, 141),
                          ),
                        ),
                        child: const Text(
                          "enreg",
                          style: TextStyle(color: Colors.black, fontSize: 17),
                        ),
                      )
                    ],
                  )
                ],
              ),
              Row(
                children: [
                  Column(
                    children: [
                      const SizedBox(
                        height: 20,
                      ),
                      const Text("Signature du délgué"),
                      const SizedBox(
                        height: 7,
                      ),
                      Signature(
                        controller: signatureControllerD,
                        width: 250,
                        height: 200,
                        backgroundColor:
                            const Color.fromARGB(255, 202, 215, 221),
                      ),
                    ],
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  Column(
                    children: [
                      TextButton(
                        onPressed: () async {
                          signatureControllerD.clear();
                        },
                        style: const ButtonStyle(
                          alignment: Alignment.center,
                          shape:
                              MaterialStatePropertyAll(RoundedRectangleBorder(
                            borderRadius: BorderRadius.all(
                              Radius.circular(50),
                            ),
                          )),
                          backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 230, 151, 146),
                          ),
                        ),
                        child: const Text(
                          "clean",
                          style: TextStyle(
                            color: Colors.black,
                            fontSize: 17,
                          ),
                        ),
                      ),
                      TextButton(
                        onPressed: () async {
                          signD = await signatureControllerD.toPngBytes();
                        },
                        style: const ButtonStyle(
                          alignment: Alignment.center,
                          shape: MaterialStatePropertyAll(
                            RoundedRectangleBorder(
                              borderRadius: BorderRadius.all(
                                Radius.circular(50),
                              ),
                            ),
                          ),
                          backgroundColor: MaterialStatePropertyAll(
                            Color.fromARGB(255, 138, 241, 141),
                          ),
                        ),
                        child: const Text(
                          "enreg",
                          style: TextStyle(color: Colors.black, fontSize: 17),
                        ),
                      )
                    ],
                  )
                ],
              ),
              const SizedBox(
                height: 20,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  ElevatedButton(
                    style: ButtonStyle(
                        backgroundColor:
                            MaterialStateProperty.all(Colors.green)),
                    onPressed: () async {
                      if (cour.text.isEmpty ||
                          prof.text.isEmpty ||
                          cod.text.isEmpty ||
                          title.text.isEmpty ||
                          sal.text.isEmpty ||
                          (total.hour == 00 && total.minute == 00) ||
                          nature == "" ||
                          semestre == 0 ||
                          contenu.text.isEmpty ||
                          signatureControllerP.isEmpty ||
                          signatureControllerD.isEmpty) {
                        showCupertinoModalPopup(
                            context: context,
                            builder: (_) {
                              return AlertDialog(
                                title: const Text(
                                  "Alerte",
                                  style: TextStyle(
                                    color: Colors.red,
                                    fontSize: 30,
                                  ),
                                ),
                                content: Column(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  mainAxisSize: MainAxisSize.min,
                                  crossAxisAlignment: CrossAxisAlignment.center,
                                  children: [
                                    const Text(
                                      "Vous ne pouvez pas enregistrer cette fiche il manque une information",
                                      style: TextStyle(fontSize: 16),
                                    ),
                                    const SizedBox(
                                      height: 15,
                                    ),
                                    ElevatedButton(
                                      style: ButtonStyle(
                                          backgroundColor:
                                              MaterialStateProperty.all(
                                                  Colors.green)),
                                      onPressed: () {
                                        Navigator.of(context).pop();
                                      },
                                      child: const Text(
                                        "OK",
                                        style: TextStyle(fontSize: 18),
                                      ),
                                    ),
                                  ],
                                ),
                              );
                            });
                      } else {
                        //creation du pdf et enregistrement dans le telephone
                        getExternalStorageDirectory();
                        try {
                          final dossierAcces =
                              await getApplicationDocumentsDirectory();
                          final chemin = dossierAcces.path;
                          final cheminPers = '$chemin/ictfollow';
                          final dossierPers = Directory(cheminPers);
                          if (!dossierPers.existsSync()) {
                            dossierPers.createSync();
                            print("Le dossier a été crée avec succès");
                          }
                        } catch (Exe) {
                          print(Exe.toString());
                          print("le dossier existe deja ");
                        }
                        cours = cour.text;
                        professeur = prof.text;
                        code = cod.text;
                        titreseance = title.text;
                        salle = sal.text;
                        content = contenu.text;
                        signD = await signatureControllerD.toPngBytes();
                        signP = await signatureControllerP.toPngBytes();
                        // ignore: use_build_context_synchronously
                        Navigator.of(context).push(
                          MaterialPageRoute(
                            builder: (_) => PagePdf(
                                cours: cours,
                                prof: professeur,
                                code: code,
                                titre: titreseance,
                                salle: salle,
                                heuredebut: timedebut,
                                heurefin: timefin,
                                duree: total,
                                date: date,
                                semestre: semestre,
                                nature: nature,
                                contenu: content,
                                signP: signP!,
                                signD: signD!),
                          ),
                        );
                      }
                    },
                    child: const Text(
                      "Valider",
                      style: TextStyle(fontSize: 18),
                    ),
                  ),
                  const SizedBox(
                    width: 20,
                  ),
                  ElevatedButton(
                      style: ButtonStyle(
                          backgroundColor:
                              MaterialStateProperty.all(Colors.red)),
                      onPressed: () {
                        setState(() {
                          cour.clear();
                          cod.clear();
                          prof.clear();
                          contenu.clear();
                          title.clear();
                          sal.clear();
                          data = "";
                          timedebut = TimeOfDay.now();
                          timefin = TimeOfDay.now();
                          total = const TimeOfDay(hour: 00, minute: 00);
                          date = DateTime.now();
                          semestre = 0;
                          nature = "";
                          contenu.clear();
                          signatureControllerP.clear();
                          signatureControllerD.clear();
                        });
                      },
                      child: const Text(
                        "Clear",
                        style: TextStyle(fontSize: 18),
                      ))
                ],
              ),
            ],
          ),
        ),
        //bottomNavigationBar: ,
      ),
    );
  }
}
