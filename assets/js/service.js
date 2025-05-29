 document.getElementById('service-search').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const services = document.querySelectorAll('.service-item');

        services.forEach(service => {
            const text = service.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                service.style.display = 'block';
            } else {
                service.style.display = 'none';
            }
        });
    });
