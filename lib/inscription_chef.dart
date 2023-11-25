import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';

class InscriptionChef extends StatefulWidget{
  const InscriptionChef({super.key});


  @override
  State<InscriptionChef> createState() {
    return _InscriptionChef();
  }
}

class _InscriptionChef extends State<InscriptionChef>{

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title:const Text("CONNEXION"),
          centerTitle: true,
          backgroundColor: Colors.blue,
        ),
        body: const Text("connexion"),
      ),
    );
  }
}

