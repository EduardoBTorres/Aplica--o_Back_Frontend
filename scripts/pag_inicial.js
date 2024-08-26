document.addEventListener('DOMContentLoaded', () => {
    const infoAdicionais = document.getElementById('info-adicionais');
    const toggleButton = document.getElementById('toggle-info');

    // Mostrar/ocultar informações adicionais
    toggleButton.addEventListener('click', () => {
        if (infoAdicionais.style.display === 'none' || infoAdicionais.style.display === '') {
            infoAdicionais.style.display = 'block';
            toggleButton.textContent = 'Ocultar Informações Adicionais';
        } else {
            infoAdicionais.style.display = 'none';
            toggleButton.textContent = 'Mostrar Informações Adicionais';
        }
    });

    // Adicionar classe "ativo" ao menu item ativo
    const currentLocation = location.href;
    const menuItems = document.querySelectorAll('.navegacao .menu-item');

    menuItems.forEach(item => {
        if (item.href === currentLocation) {
            item.classList.add('ativo');
        }
    });

    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');
    const intervaloTempo = 5000; // Tempo de exibição de cada slide em milissegundos

    function mostrarSlide(index) {
        slides.forEach(slide => slide.style.display = 'none');
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].style.display = 'flex';
    }

    function mudarSlide(direcao) {
        mostrarSlide(currentSlide + direcao);
        resetarIntervalo();
    }

    // Função para auto-avançar os slides
    function autoAvancarSlide() {
        mudarSlide(1);
    }

    // Intervalo para trocar automaticamente os slides
    let intervalo = setInterval(autoAvancarSlide, intervaloTempo);

    // Função para resetar o intervalo quando o usuário navega manualmente
    function resetarIntervalo() {
        clearInterval(intervalo);
        intervalo = setInterval(autoAvancarSlide, intervaloTempo);
    }

    // Inicializa o primeiro slide
    mostrarSlide(currentSlide);

    // Eventos para as setas de navegação
    document.querySelector('.prev').addEventListener('click', () => mudarSlide(-1));
    document.querySelector('.next').addEventListener('click', () => mudarSlide(1));

    // API de Geolocalização
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            console.log(`Latitude: ${lat}, Longitude: ${lon}`);
        }, error => {
            console.error('Erro ao obter localização', error);
        });
    } else {
        console.error('Geolocalização não é suportada pelo navegador.');
    }
});
