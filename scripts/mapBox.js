const ORS_API_KEY = 'SUA_CHAVE_API_OPENROUTESERVICE'; // Substitua pela sua chave de API real

document.addEventListener('DOMContentLoaded', () => {
    // Inicializa o mapa
    const map = L.map('mapa').setView([0, 0], 13); // Configuração inicial para o centro do mapa

    // Adiciona a camada do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Função para definir a localização do usuário
    function setUserLocation(lat, lng) {
        map.setView([lat, lng], 13);
        L.marker([lat, lng]).addTo(map)
            .bindPopup('Você está aqui.')
            .openPopup();
    }

    // Obtém a localização do usuário
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const { latitude, longitude } = position.coords;
            setUserLocation(latitude, longitude);
        }, () => {
            alert('Não foi possível obter a localização.');
        });
    } else {
        alert('Geolocalização não é suportada pelo seu navegador.');
    }

    // Adiciona funcionalidade de busca de rotas
    document.getElementById('form-pesquisa').addEventListener('submit', async (event) => {
        event.preventDefault();
        const origem = document.getElementById('origem').value;
        const destino = document.getElementById('destino').value;

        // Codifica os endereços em coordenadas (geocodificação)
        const geocode = async (address) => {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`);
            const data = await response.json();
            if (data.length === 0) {
                throw new Error('Endereço não encontrado.');
            }
            return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
        };

        try {
            const [origLat, origLng] = await geocode(origem);
            const [destLat, destLng] = await geocode(destino);

            // Busca a rota usando OpenRouteService
            const routeResponse = await fetch(`https://api.openrouteservice.org/v2/directions/cycling-regular?api_key=${ORS_API_KEY}&start=${origLng},${origLat}&end=${destLng},${destLat}`);
            const routeData = await routeResponse.json();

            if (!routeData.routes || routeData.routes.length === 0) {
                throw new Error('Nenhuma rota encontrada.');
            }

            const route = routeData.routes[0];
            const distance = (route.summary.distance / 1000).toFixed(2); // Em km
            const duration = (route.summary.duration / 60).toFixed(0); // Em minutos

            document.getElementById('distancia').textContent = `Distância: ${distance} km`;
            document.getElementById('tempo').textContent = `Tempo Estimado: ${Math.floor(duration / 60)} horas ${duration % 60} minutos`;

            // Adiciona a rota ao mapa
            L.geoJSON(route.geometry, {
                style: () => ({
                    color: '#b2ff59',
                    weight: 4
                })
            }).addTo(map);

            // Ajusta a visão do mapa para cobrir toda a rota
            const bounds = L.latLngBounds([
                [origLat, origLng],
                [destLat, destLng]
            ]);
            map.fitBounds(bounds);

        } catch (error) {
            console.error('Erro ao buscar a rota:', error);
            alert('Não foi possível buscar a rota. Verifique os endereços e tente novamente.');
        }
    });
});
