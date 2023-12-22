import 'package:firstapp/dashboardelegue.dart';
import 'package:firstapp/fiche_suivi.dart';
import 'package:firstapp/accueil_page.dart';
import 'package:firstapp/pagepdf.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        resizeToAvoidBottomInset: true,
        body: FicheSuivi(),
      ),
    ),
  );
}
