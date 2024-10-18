function searchJobs() {
    const query = document.getElementById('search').value;
    // Lógica para buscar vagas com base na consulta
    console.log(`Buscando vagas para: ${query}`);
}

function filterJobs() {
    const jobType = document.getElementById('job-type').value;
    const area = document.getElementById('area').value;
    // Lógica para filtrar vagas
    console.log(`Filtrando vagas: ${jobType}, Área: ${area}`);
}
// Função para rolagem suave
document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
let currentSlide = 0;

function moveSlide(direction) {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    // Atualiza o índice do slide atual
    currentSlide += direction;

    // Loop para o início/fim do carrossel
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }

    // Mover o carrossel
    const carousel = document.querySelector('.carousel');
    const offset = -currentSlide * 100; // A quantidade de movimento depende do slide atual
    carousel.style.transform = `translateX(${offset}%)`;
}

// Adicionar rolagem automática (opcional)
setInterval(() => moveSlide(1), 8000); // Muda de slide a cada 5 segundos

//Lógica de Busca (//
function searchJobs() {
    const jobTitle = document.getElementById('job-title').value;
    const location = document.getElementById('location').value;

    // Aqui você pode implementar a lógica de busca, como filtrar um array de vagas.
    alert(`Buscando vagas para "${jobTitle}" em "${location}"`);
}
// Add event listeners to navigation menu items
document.querySelectorAll('nav ul li a').forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        // Add functionality to navigation menu items
    });
});

// Add event listener to search button
document.querySelector('.search-bar button[type="button"]').addEventListener('click', (e) => {
    e.preventDefault();
    searchJobs();
});

// Add event listener to carousel controls
document.querySelectorAll('.carousel-control-prev, .carousel-control-next').forEach((control) => {
    control.addEventListener('click', (e) => {
        e.preventDefault();
        moveSlide(control.dataset.slide);
    });
});
