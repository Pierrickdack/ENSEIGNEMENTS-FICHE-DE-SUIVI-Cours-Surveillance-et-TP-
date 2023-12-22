import 'dart:typed_data';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:pdf/pdf.dart';
import 'package:pdf/widgets.dart' as pdf;

class PagePdf extends StatefulWidget {
  const PagePdf({
    super.key,
    required String cours,
    required String prof,
    required String code,
    required String titre,
    required String salle,
    required TimeOfDay heuredebut,
    required TimeOfDay heurefin,
    required TimeOfDay duree,
    required DateTime date,
    required int semestre,
    required String nature,
    required String contenu,
    required Uint8List signP,
    required Uint8List signD,
  });

  @override
  State<PagePdf> createState() {
    return _PagePdf();
  }
}

class _PagePdf extends State<PagePdf> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
          appBar: AppBar(
        leading: IconButton(
          icon: const Icon(Icons.arrow_back),
          onPressed: () {
            Navigator.of(context).pop();
          },
        ),
      )),
    );
  }
}
