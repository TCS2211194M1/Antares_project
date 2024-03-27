// Array de mensajes para el carrusel
const messages = [
    "Descubre las mejores ofertas en hosting web",
    "Potencia tu negocio en línea con nuestra plataforma confiable",
    "¡Aprovecha nuestros descuentos exclusivos!"
  ];
  
  // Función para cambiar el mensaje del héroe
  function changeMessage() {
    const heroMessage = document.getElementById('hero-message');
    let index = 0;
  
    // Función recursiva para cambiar los mensajes cada 5 segundos
    function updateMessage() {
      heroMessage.textContent = messages[index];
      index = (index + 1) % messages.length;
      setTimeout(updateMessage, 5000); // Cambiar mensaje cada 5 segundos
    }
  
    // Iniciar el carrusel de mensajes
    updateMessage();
  }
  
  // Llamar a la función para iniciar el carrusel de mensajes
  changeMessage();
  
