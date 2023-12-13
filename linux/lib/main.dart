import 'package:firstapp/connexion_delegu%C3%A9.dart';
import 'package:firstapp/dashboardelegue.dart';
import 'package:firstapp/fiche_suivi.dart';
import 'package:firstapp/accueil_page.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        resizeToAvoidBottomInset: true,
        body: AccueilPage(),
      ),
    ),
  );
}
