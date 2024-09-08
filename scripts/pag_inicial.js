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

