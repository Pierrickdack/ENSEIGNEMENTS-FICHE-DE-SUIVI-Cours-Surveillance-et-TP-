import 'dart:ffi';
import 'dart:typed_data';

import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

import 'package:signature/signature.dart';

//import 'package:flutter/cupertino.dart';

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
  TimeOfDay timetotal = TimeOfDay.now();
  String? nature;
  int? semestre;
  DateTime date = DateTime.now();
  String salle = "";
  String titreseance = '';
  String total = "Total d'heure de cours";

  @override
  Widget build(context) {
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
          title: const Text("FICHE DE SUIVI"),
          centerTitle: true,
        ),
        body: Container(
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
                                timefin = TimeOfDay.now();
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
                                  },
                                );
                              }
                            },
                          );
                        },
                        child: const Text(
                          "Heure de fin",
                          style: TextStyle(fontSize: 18),
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
              SizedBox(
                child: Row(
                  children: [
                    Text(
                      total,
                      style: const TextStyle(fontSize: 20),
                    ),
                    TextButton(
                      onPressed: () {
                        setState(() {
                          int totaldebut =
                              timedebut.hour * 60 + timedebut.minute;
                          int totalfin = timefin.hour * 60 + timefin.minute;
                          int result = totalfin - totaldebut;
                          timetotal.replacing(
                              hour: ((result - result % 60) ~/ 60).toInt(),
                              minute: result % 60);
                          total = timetotal.format(context);
                        });
                      },
                      child: const Text("calculer"),
                    )
                  ],
                ),
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
                    child: const Text('Date'),
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
                          semestre = value;
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
                          semestre = value;
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
                          nature = value;
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
                          nature = value;
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
                          nature = value;
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
                          signP = await signatureControllerD.toPngBytes();
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

              Center(
                child: ElevatedButton(
                  onPressed: () {
                    cours = cour.text;
                    code = cod.text;
                    professeur = prof.text;
                    content = contenu.text;
                    titreseance = title.text;
                    salle = sal.text;
                  },
                  child: const Text("valider"),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
