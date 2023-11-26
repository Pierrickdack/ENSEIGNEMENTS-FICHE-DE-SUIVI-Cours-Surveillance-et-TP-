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

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          
          title: const Text("Connexion", textAlign: TextAlign.center,),
        ),
        body: SizedBox(
          width: double.infinity,
          height: double.infinity,
          child: Stack(
            fit: StackFit.expand,
            children: [
            Image.asset("assets/images/imagefond2.jpg", 
              fit: BoxFit.fill,),
            Column(
              mainAxisAlignment: MainAxisAlignment.center,
              mainAxisSize: MainAxisSize.max,
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                const Text("CONNEXION"),
                const SizedBox(
                  height: 50,
                ),
                TextField(
                  controller: nom,
                  decoration: const InputDecoration(
                      label: Text("name", 
                        style: TextStyle(
                          color: Color.fromARGB(255, 208, 220, 233)),),
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.all(Radius.circular(30))),
                          ),
                ),
                const SizedBox(
                  height: 10,
                ),
                TextField(
                  controller: matricule,
                  decoration: const InputDecoration(
                    label: Text("matricule", style: TextStyle(color: Color.fromARGB(255, 208, 220, 233)),),
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(30))),
                  ),
                ),
                TextField(
                  controller: code,
                  decoration: const InputDecoration(
                    label: Text("code", style: TextStyle(color: Color.fromARGB(255, 208, 220, 233)),),
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(30))),
                  ),
                ),
                ElevatedButton(onPressed: () {
                  
                }, child: const Text("submit", textAlign: TextAlign.center,))
              ],
            )
          ]),
        ),
      ),
    );
  }
}
