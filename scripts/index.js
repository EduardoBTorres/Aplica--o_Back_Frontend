
const carrosselInterno = document.querySelector('.carrossel-interno');
const caixas = document.querySelectorAll('.caixa');
const anteriorBtn = document.getElementById('anterior');
const proximoBtn = document.getElementById('proximo');

let indiceAtual = 0;

function mostrarCaixa(indice) {
    const deslocamento = -indice * 100;
    carrosselInterno.style.transform = `translateX(${deslocamento}%)`;
}

proximoBtn.addEventListener('click', () => {
    indiceAtual = (indiceAtual + 1) % caixas.length;
    mostrarCaixa(indiceAtual);
});

anteriorBtn.addEventListener('click', () => {
    indiceAtual = (indiceAtual - 1 + caixas.length) % caixas.length;
    mostrarCaixa(indiceAtual);
});

let autoSlide = setInterval(() => {
    proximoBtn.click();
}, 3000);

carrosselInterno.addEventListener('mouseenter', () => {
    clearInterval(autoSlide);
});

carrosselInterno.addEventListener('mouseleave', () => {
    autoSlide = setInterval(() => {
        proximoBtn.click();
    }, 3000);
});


