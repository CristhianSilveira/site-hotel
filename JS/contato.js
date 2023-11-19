function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('i').className = 'fa-solid fa-bars';
    } else {
        menuMobile.classList.add('open');
        document.querySelector('i').className = 'fa-solid fa-xmark fa-lg';
    }
}


// Mensagem de erro ou sucesso no form de contato
const contato = document.getElementById('form');
const formMsg = document.getElementById('form-msg');

contato.addEventListener('submit', function (event) {
    event.preventDefault();

    formMsg.style.display = 'block';

    const nome = document.getElementById('name');
    const email = document.getElementById('email');
    const assunto = document.getElementById('assunto');
    const mensagem = document.getElementById('msg');

    if (nome.value === "" || email.value === "" || assunto.value === '') {
        formMsg.style.backgroundColor = '#FF0000';
        formMsg.style.color = 'white';
        formMsg.innerHTML = "Por favor, preencha todos os campos obrigatórios.";
    
    } else {
        formMsg.innerHTML = "Mensagem enviada com sucesso!";
        formMsg.style.backgroundColor = '#126E51';
        nome.value = '';
        email.value = ''; 
        assunto.value = '';
        mensagem.value = '';
    }
    setTimeout(function () {
        formMsg.style.display = 'none';
        formMsg.innerHTML = "";
    }, 5000);
    
});