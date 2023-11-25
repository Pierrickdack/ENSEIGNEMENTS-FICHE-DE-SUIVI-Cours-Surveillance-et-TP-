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
  TextEditingController prof = TextEditingController();
  TextEditingController contenu = TextEditingController();
  TextEditingController sal = TextEditingController();
  TextEditingController title = TextEditingController();
  SignatureController signatureController=SignatureController(
    penStrokeWidth: 3,
    penColor: Colors.black,
    exportBackgroundColor:const Color.fromARGB(255, 205, 211, 216)
  );

  String cours = "";
  String professeur = "";
  String content = "";
  TimeOfDay timedebut = TimeOfDay.now();
  TimeOfDay timefin = TimeOfDay.now();
  String? nature;
  int? semestre;
  DateTime date = DateTime.now();
  String salle = "";
  String titreseance = '';

  @override
  Widget build(context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(actions: [
          Row(
            mainAxisAlignment: MainAxisAlignment.end,
            children: const [
              Icon(
                Icons.arrow_back,
              ),
              Center(
                child: Text("FICHE DE SUIVI"),
              )
            ],
          ),
        ]),
        body: Container(
          padding: const EdgeInsets.all(10.0),
          decoration: BoxDecoration(
              gradient: const LinearGradient(colors: [
                Color.fromARGB(255, 227, 242, 238),
                Color.fromARGB(255, 236, 251, 252)
              ], begin: Alignment.topCenter, end: Alignment.bottomCenter),
              border: Border.all(color: Colors.black),
              borderRadius: BorderRadius.circular(10.0)),
          child: ListView(
            scrollDirection: Axis.vertical,
            children: [
              TextField(
                  controller: cour,
                  decoration: const InputDecoration(
                      labelText: "libelé du cours",
                      border: OutlineInputBorder(
                          borderRadius:
                              BorderRadius.all(Radius.circular(50.0))))),
              const SizedBox(
                height: 4,
              ),
              TextField(
                controller: prof,
                decoration: const InputDecoration(
                  labelText: "Nom du professeur",
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(Radius.circular(50.0)),
                  ),
                ),
              ),
              const SizedBox(height: 4),
              TextField(
                controller: prof,
                decoration: const InputDecoration(
                  label: Text("code de la matiere"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(Radius.circular(50.0)),
                  ),
                ),
              ),
              const SizedBox(height: 4),
              TextField(
                controller: title,
                decoration: const InputDecoration(
                  label: Text("Titre de la seance"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(Radius.circular(50.0)),
                  ),
                ),
              ),
              //const TextField(),
              const SizedBox(height: 4,),
              TextField(
                controller: sal,
                decoration: const InputDecoration(
                    labelText: "Numero de salle",
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(50.0)))),
              ),
              const SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Container(
                    decoration: const BoxDecoration(
                        borderRadius: BorderRadius.all(Radius.circular(10))),
                    child: Text(timedebut.format(context)),
                  ),
                  const SizedBox(width: 10),
                  ElevatedButton(
                    onPressed: () {
                      showTimePicker(
                        context: context,
                        initialTime: TimeOfDay.now(),
                      ).then((value) {
                        if (value == null) {
                          return;
                        }
                        setState(() {
                          timedebut = value;
                        });
                      });
                    },
                    child: const Text("heure de debut"),
                  ),
                  const SizedBox(
                    width: 15,
                  ),
                  Container(
                    decoration: const BoxDecoration(
                        borderRadius: BorderRadius.all(Radius.circular(10))),
                    child: Text(timefin.format(context)),
                  ),
                  const SizedBox(width: 10),
                  ElevatedButton(
                    onPressed: () {
                      showTimePicker(
                        context: context,
                        initialTime: TimeOfDay.now(),
                      ).then((value) {
                        if (value == null) {
                          timefin = TimeOfDay.now();
                        } else {
                          setState(() {
                            timefin = value;
                          });
                        }
                      });
                    },
                    child: const Text("heure de fin"),
                  ),
                ],
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Text("${date.year}-${date.month}-${date.day}"),
                  const SizedBox(width: 10,),
                  ElevatedButton(
                      onPressed: () {
                        showDatePicker(
                                context: context,
                                initialDate: DateTime.now(),
                                firstDate: DateTime(2020),
                                lastDate: DateTime.now())
                            .then((value) {
                          if (value == null) {
                            date = DateTime.now();
                          } else {
                            setState(() {
                              date = value;
                            });
                          }
                        });
                      },
                      child: const Text('Date'))
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
                  const Text("sem 1"),
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
                      const Text("sem 2"),
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
                        setState(() {
                          activate();
                          nature = value;
                        });
                      }),
                  const Text("CM"),
                  Radio(
                      activeColor: Colors.blue,
                      value: 'TP',
                      groupValue: nature,
                      onChanged: (value) {
                        setState(() {
                          activate();
                          nature = value;
                        });
                      }),
                  const Text("TP"),
                  Radio(
                      activeColor: Colors.blue,
                      value: 'TD',
                      groupValue: nature,
                      onChanged: (value) {
                        setState(() {
                          activate();
                          nature = value;
                        });
                      }),
                  const Text("TD"),
                ],
              ),
              TextField(
                maxLines: 10,
                controller: contenu,
                decoration: const InputDecoration(
                  label: Text("contenu du cours"),
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.all(Radius.circular(10.0)),
                  ),
                ),
              ),
              const SizedBox(height: 10,),
              Row(
                children: [
                  Column(
                    children: [
                      const SizedBox(height: 20,),
                  const Text("Signature du professeur"),
                  const SizedBox(height: 7,),
                  Signature(
                    controller: signatureController ,
                    width: 250,
                    height: 200,
                    backgroundColor:const Color.fromARGB(255, 202, 215, 221),
                  ),
                    ],
                  ),
                  const SizedBox(width: 10,),
                  Column(
                    children: [
                      TextButton(onPressed: (){

                      }, 
                      style:const ButtonStyle(
                        alignment: Alignment.center,
                        backgroundColor: MaterialStatePropertyAll(Color.fromARGB(255, 230, 151, 146))), 
                      child: const Text("clear", style: TextStyle(
                        color: Colors.black,
                        fontSize: 17,
                      ),),)
                    ],
                  )
                ],
              ),

              Center(
                child: ElevatedButton(
                  onPressed: () {
                    cours = cour.text;
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
