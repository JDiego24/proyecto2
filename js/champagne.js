document.addEventListener('DOMContentLoaded', () => {
    const selectTipoChampagne = document.getElementById('champagne');

    // Fetch del archivo JSON
    fetch('champagne.json')
        .then(response => response.json())
        .then(data => {
            // Llenar el elemento select con los tipos de champán
            data.forEach(champagne => {
                const option = document.createElement('option');
                option.value = champagne.tipo;
                option.textContent = champagne.tipo;
                selectTipoChampagne.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los tipos de champán:', error));
});
