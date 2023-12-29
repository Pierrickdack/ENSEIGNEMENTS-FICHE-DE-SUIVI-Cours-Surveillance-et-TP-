@extends('base_fiche')
@section('title', 'Fiche De Suivi')

@section('styles')
		<link rel="stylesheet" href="{{ asset('css/fiche.css') }}">
@endsection

@section('scripts')
    <script type="module" src="JS/fiche.js"></script>
@endsection


@section('content')
    <a href="{{ route('accueilDel') }}" class="returnLink">
        <button class="returnButton">
            <i class="fas fa-arrow-left"></i>
        </button>
    </a>

    <div class="form-container">
        <h2>Université de Yaoundé I</h2>
        <header>
            <div class="logo">
                <img src="{{ asset('asset/Images/UY1.png') }}" alt="Logo de l'université">
                <h1>Fiche de cours</h1>
            </div>
        </header>

        <form action="{{ route('enregistrer-fiche') }}" method="post" class="needs-validation" id="ficheForm" novalidate>
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="titreSeance">Titre de la séance</label>
                    <input type="text" id="titreSeance" name="titreSeance" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="semestre">Semestre</label>
                    <select id="semestre" name="semestre" required>
                        <option value="0"></option>
                        <option value="1">Semestre 1</option>
                        <option value="2">Semestre 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="typeSeance">Type de séance</label>
                    <select id="typeSeance" name="typeSeance" required>
                        <option value="CM"></option>
                        <option value="CM">Cours magistral (CM)</option>
                        <option value="TP">Surveillance</option>
                        <option value="Surveillance">Travaux pratiques (TP)</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="codeCours">Code du cours</label>
                    <input type="text" id="codeCours" name="codeCours" required>
                </div>
                <div class="form-group">
                    <label for="enseignant">Nom de l'enseignant</label>
                    <input type="text" id="enseignant" name="enseignant" required>
                </div>
                <div class="form-group">
                    <label for="salle">Nom de la salle</label>
                    <input type="text" id="salle" name="salle" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="heureDebut">Heure de début</label>
                    <input type="time" id="heureDebut" name="heureDebut" required>
                </div>
                <div class="form-group">
                    <label for="heureFin">Heure de fin</label>
                    <input type="time" id="heureFin" name="heureFin" required>
                </div>
                <div class="form-group">
                    <label for="totalHeures">Total d'heures</label>
                    <input type="text" id="totalHeures" name="totalHeures" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea id="contenu" name="contenu" rows="4" required></textarea>
            </div>

            <!-- Ajout des cadres pour les signatures -->
            <div class="form-sign-row">
                <div class="form-sign">
                    <label for="signatureDelegue">Signature du Délégué</label>
                    <div id="signatureDelegueBox" class="signature-box"></div>
                    <button type="button" onclick="clearSignature('signatureDelegueBox')" class="cancel-btn"><i class="fas fa-trash"></i></button>
                </div>
                <div class="form-sign">
                    <label for="signatureProf">Signature du Professeur</label>
                    <div id="signatureProfBox" class="signature-box"></div>
                    <button type="button" onclick="clearSignature('signatureProfBox')" class="cancel-btn"><i class="fas fa-trash"></i></button>
                </div>
            </div><br>

            <div class="form-group">
                <div class="toggle-container">
                    <label class="switch">
                        <input type="checkbox" id="confidentialite-toggle" name="confidentialite" class="toggle-input">
                        <span class="slider round"> </span>
                    </label>
                    J'approuve l'authenticité de ce document !
                </div>
            </div>

            <!-- Boutons de confirmation de la fiche -->
            <div class="form-btn">
                <button type="button" id="enregistrerBtn">Enregistrer</button>
                <button type="button" id="annulerBtn" onclick="resetForm()">Annuler</button>
            </div>

        </form>
    </div>

    <!-- Modal de confirmation de la fiche -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeConfirmationModal()">&times;</span>
            <label for="fileName">Nom du fichier PDF</label>
            <input type="text" id="fileName" placeholder="Nom du fichier">
            <button class="confirm-btn" id="confirmationOuiBtn">Télécharger</button>
            <button class="cancel-btn" onclick="closeConfirmationModal()">Annuler</button>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2022–2023 ICT4D</p>
    </footer>

    <script>
        function enregistrerFiche() {
            // Récupérez les données du formulaire
            var formData = new FormData(document.getElementById("ficheForm"));

            // Effectuez une requête Ajax vers la route de sauvegarde
            $.ajax({
                url: "{{ route('enregistrer-fiche') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Réinitialisez le formulaire et affichez un message de succès
                    document.getElementById("ficheForm").reset();
                },
                error: function(xhr, status, error) {
                    // Gérez les erreurs de la requête Ajax
                    alert("Une erreur s'est produite lors de la sauvegarde de la fiche.");
                    console.log(xhr.responseText);
                }
            });
        }

        function convertToImage(signatureBoxId) {
            var signatureBox = document.getElementById(signatureBoxId);
            var canvas = signatureBox.querySelector('canvas');
            return canvas.toDataURL('image/png');
        }


        // Fonction pour enregistrer les signatures
        function saveSignatures() {
            var signatureDelegue = convertToImage("signatureDelegueBox");
            var signatureProf = convertToImage("signatureProfBox");

            // Vous pouvez maintenant envoyer les signatures au serveur ou effectuer d'autres actions nécessaires
            console.log('Signature du délégué:', signatureDelegue);
            console.log('Signature du professeur:', signatureProf);
        }

        // Fonction pour vérifier si une signature est présente
        function aSigne(signatureBoxId) {
            var signatureBox = document.getElementById(signatureBoxId);
            var canvas = signatureBox.querySelector('canvas');
            var ctx = canvas.getContext('2d');
            var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height).data;

            // Vérifier si l'image contient des pixels autres que transparents
            for (var i = 0; i < imageData.length; i += 4) {
                if (imageData[i + 3] !== 0) {
                    return true;
                }
            }

            return false;
        }
        // Fonctions pour les signatures
        function initSignature(signatureBoxId) {
            var canvas = document.createElement("canvas");
            var signatureBox = document.getElementById(signatureBoxId);
            signatureBox.appendChild(canvas);

            var ctx = canvas.getContext("2d");
            var drawing = false;

            function startDrawing(e) {
                drawing = true;
                ctx.beginPath();
                var rect = canvas.getBoundingClientRect();
                ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
            }

            function draw(e) {
                if (!drawing) return;
                var rect = canvas.getBoundingClientRect();
                ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
                ctx.stroke();
            }

            function endDrawing() {
                drawing = false;
            }

            // Gestionnaire d'événements pour le début, le dessin, la fin et l'annulation du dessin
            canvas.addEventListener("mousedown", startDrawing);
            canvas.addEventListener("mousemove", draw);
            canvas.addEventListener("mouseup", endDrawing);
            canvas.addEventListener("mouseout", endDrawing);
        }


        function clearSignature(signatureBoxId) {
            var signatureBox = document.getElementById(signatureBoxId);
            var canvas = signatureBox.querySelector("canvas");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }
        // Appel des fonctions pour initialiser les signatures
        document.addEventListener("DOMContentLoaded", function () {
            initSignature("signatureDelegueBox");
            initSignature("signatureProfBox");
        });


        // Fonction pour ouvrir le modal de confirmation
        function openConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'block';
        }

        // Fonction pour fermer le modal de confirmation
        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }


        document.addEventListener('DOMContentLoaded', function () {
            // Fonction pour calculer le total d'heures
            function calculerTotalHeures() {
                var heureDebut = document.getElementById('heureDebut').value;
                var heureFin = document.getElementById('heureFin').value;

                // Convertir les heures en objets Date
                var debut = new Date('1970-01-01T' + heureDebut + 'Z');
                var fin = new Date('1970-01-01T' + heureFin + 'Z');

                // Calculer la différence en millisecondes
                var difference = fin - debut;

                // Calculer les heures et les minutes
                var totalHeures = Math.floor(difference / (1000 * 60 * 60));
                var totalMinutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));

                // Mettre à jour le champ du total d'heures
                document.getElementById('totalHeures').value = totalHeures + " heure(s) : " + totalMinutes + " min";
            }

            // Écouter les changements dans les champs d'heure
            document.getElementById('heureDebut').addEventListener('input', calculerTotalHeures);
            document.getElementById('heureFin').addEventListener('input', calculerTotalHeures);

            // Fonction pour générer le document PDF
            function genererPDF() {
                // Ouvrir le modal de confirmation
                openConfirmationModal();
            }

            // Fonction pour ouvrir le modal de confirmation
            function openConfirmationModal() {
                document.getElementById('confirmationModal').style.display = 'block';
            }

            // Fonction pour fermer le modal de confirmation
            function closeConfirmationModal() {
                document.getElementById('confirmationModal').style.display = 'none';
            }


            function genererPDFetTelecharger() {
                var pdf = new jsPDF();
                var fileName = document.getElementById('fileName').value;

                if (!fileName) {
                    alert('Veuillez entrer un nom de fichier.');
                    return;
                }

                // Ajouter le titre "Université de Yaoundé 1" au-dessus du logo
                pdf.setFontSize(14);
                pdf.text(105, 20, "Université de Yaoundé 1", { align: 'center' });

                // Ajouter l'en-tête avec le logo de l'université au milieu du format A4
                var imgLogo = new Image();
                imgLogo.src = "{{ asset('asset/Images/UY1.png') }}";
                var logoWidth = 28;  // Nouvelle largeur du logo
                var logoHeight = 28; // Nouvelle hauteur du logo
                pdf.addImage(imgLogo, 'PNG', 85, 30, logoWidth, logoHeight);

                // Ajouter le titre "Fiche de suivi de cours" en dessous du logo
                pdf.setFontSize(16);
                pdf.text(105, 75, "Fiche de suivi de cours", { align: 'center' });

                // Réinitialiser la taille de police
                pdf.setFontSize(12);

                // Ajouter les informations du formulaire au document PDF
                var formData = [
                    { label: "Semestre", value: document.getElementById('semestre').value },
                    { label: "Date", value: document.getElementById('date').value },
                    { label: "Code du cours", value: document.getElementById('codeCours').value },
                    { label: "Heure de début", value: document.getElementById('heureDebut').value },
                    { label: "Heure de fin", value: document.getElementById('heureFin').value },
                    { label: "Total d'heures", value: document.getElementById('totalHeures').value },
                    { label: "Nom de l'enseignant", value: document.getElementById('enseignant').value },
                    { label: "Nom de la salle", value: document.getElementById('salle').value },
                    { label: "Type de séance", value: document.getElementById('typeSeance').value },
                    { label: "Titre de la séance", value: document.getElementById('titreSeance').value },
                ];

                // Position initiale pour les informations du formulaire
                var xPos = 20;
                var yPos = 120;

                // Ajouter les informations du formulaire deux à deux
                for (var i = 0; i < formData.length; i += 2) {
                    pdf.text(xPos, yPos, formData[i].label + ": " + formData[i].value);
                    if (i + 1 < formData.length) {
                        pdf.text(xPos + 100, yPos, formData[i + 1].label + ": " + formData[i + 1].value);
                    }
                    yPos += 10;
                }

                // Ajouter le champ "Contenu"
                pdf.text(xPos, yPos + 10, "Progression : " + document.getElementById('contenu').value);

                // Ajouter les cadres pour les signatures
                pdf.text(xPos, yPos + 40, "Signature du Délégué");
                pdf.text(xPos + 80, yPos + 40, "Signature du Professeur");

                // Ajouter les images des signatures
                var imgDelegue = new Image();
                var canvasDelegue = document.getElementById('signatureDelegueBox').querySelector('canvas');
                imgDelegue.src = canvasDelegue.toDataURL('image/png');
                pdf.addImage(imgDelegue, 'PNG', xPos, yPos + 50, 50, 20); // Ajustez les coordonnées et dimensions

                var imgProf = new Image();
                var canvasProf = document.getElementById('signatureProfBox').querySelector('canvas');
                imgProf.src = canvasProf.toDataURL('image/png');
                pdf.addImage(imgProf, 'PNG', xPos + 80, yPos + 50, 50, 20); // Ajustez les coordonnées et dimensions

                // Convertir le contenu en Data URL
                var pdfData = pdf.output("datauristring");

                // Créer un élément d'ancrage invisible
                var link = document.createElement("a");
                link.href = pdfData;
                link.download = fileName + '.pdf';

                // Ajouter l'élément au document
                document.body.appendChild(link);

                // Simuler le clic sur l'élément d'ancrage
                link.click();

                // Retirer l'élément du document
                document.body.removeChild(link);
            }

            // Écouter le clic sur le bouton "Enregistrer"
            document.getElementById('enregistrerBtn').addEventListener('click', genererPDF);

            // Écouter le clic sur le bouton "Oui" dans le modal de confirmation
            document.getElementById('confirmationOuiBtn').addEventListener('click', function () {
                // Fermer le modal de confirmation
                closeConfirmationModal();
                enregistrerFiche();
                genererPDFetTelecharger();
            });

            // Écouter le clic sur le bouton "Non" dans le modal de confirmation
            document.getElementById('confirmationNonBtn').addEventListener('click', closeConfirmationModal);

            function submitForm() {
                document.getElementById('ficheForm').submit();
            }
        });
    </script>
@endsection
