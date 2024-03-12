// Elemento do menu toggle
var menuToggle = document.getElementById("menuToggle");

// Script para mostrar/ocultar o menu e alterar o ícone de hambúrguer para "X"
menuToggle.addEventListener("change", function () {
  // Altera o ícone de hambúrguer para "X"
  var menuIcon = document.getElementById("menuIcon");
  menuIcon.innerHTML = this.checked ? "&#10006;" : "&#9776;";

  // Adiciona ou remove a classe 'menu-open' no elemento aside
  var aside = document.querySelector("aside");
  aside.style.width = this.checked ? "300px" : "84px";
  aside.classList.toggle("menu-open", this.checked);
});
