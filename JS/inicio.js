// menu de hambúrguer em celular
function menuShow() {
  let menuMobile = document.querySelector(".mobile-menu");
  if (menuMobile.classList.contains("open")) {
    menuMobile.classList.remove("open");
    document.querySelector("i").className = "fa-solid fa-bars";
  } else {
    menuMobile.classList.add("open");
    document.querySelector("i").className = "fa-solid fa-xmark fa-lg";
  }
}

// Exibe no input date a data de hoje
let chegada = document.getElementById("cheg");
let saida = document.getElementById("saida");

const dataAtual = new Date();
const fusoHorario = dataAtual.getTimezoneOffset();
dataAtual.setMinutes(dataAtual.getMinutes() - fusoHorario);

const dataLocal = dataAtual.toISOString().split("T")[0];
chegada.min = dataLocal;
saida.min = dataLocal;
