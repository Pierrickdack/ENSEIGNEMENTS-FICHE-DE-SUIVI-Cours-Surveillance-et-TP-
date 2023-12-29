<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

<!-- Script pour le ToggleMenu -->
<script>
    let menuToggle = document.querySelector('.menuToggle');
    let sidebar = document.querySelector('.sidebar');
    let logoutModal = document.getElementById('logoutModal');

    menuToggle.onclick = function () {
        menuToggle.classList.toggle('active');
        sidebar.classList.toggle('active');
    }

    let Menulist = document.querySelectorAll('.Menulist li');

    function activeLink() {
        Menulist.forEach((item) => item.classList.remove('active'));
        this.classList.add('active')
    }

    Menulist.forEach((item) => item.addEventListener('click', activeLink));

    // Nouvelle fonction pour ouvrir le modal
    function openModal() {
        logoutModal.style.display = 'block';
    }

    function closeModal() {
        logoutModal.style.display = 'none';
    }

    function confirmLogout() {
        window.location.href = '../index.php';
    }


</script>
