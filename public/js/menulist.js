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
    this.classList.add('active');
}

Menulist.forEach((item) => item.addEventListener('click', activeLink));
