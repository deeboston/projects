<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SupportSys | Sistema de Soporte Técnico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<script>
const chatInput = document.getElementById('chatInput');
const chatSendBtn = document.getElementById('chatSendBtn');
const chatMessages = document.getElementById('chatMessages');

const chatState = {
  fallbackAsked: false,
  awaitingContact: false
};

const advancedReplies = [
  {
    triggers: ["hola", "buenas", "hey", "hi"],
    response: "¡Hola! 👋 ¿Cómo puedo ayudarte hoy?"
  },
  {
    triggers: ["ticket", "problema", "crear ticket", "ayuda", "soporte"],
    response: "Puedes crear un ticket desde tu panel. Solo debes iniciar sesión o registrarte."
  },
  {
    triggers: ["registrar", "no tengo cuenta", "cuenta"],
    response: "Puedes registrarte gratuitamente usando el botón de arriba 📝"
  },
  {
    triggers: ["admin", "contactar", "hablar con alguien", "asesor"],
    response: "Un agente puede ayudarte. ¿Podrías dejar tu correo o número para contactarte?"
  },
  {
    triggers: ["gracias", "ok", "perfecto", "vale"],
    response: "¡Con gusto! Si necesitas más ayuda, aquí estaré 💬"
  }
];

function getReply(message) {
  const msg = message.toLowerCase();
  for (let pair of advancedReplies) {
    if (pair.triggers.some(t => msg.includes(t))) {
      return pair.response;
    }
  }

  if (chatState.awaitingContact) {
    if (msg.match(/\d{8,}|\S+@\S+\.\S+/)) {
      chatState.awaitingContact = false;
      return "📩 Gracias. Un agente te contactará pronto.";
    } else {
      return "❗ No parece un número o correo válido. Intenta de nuevo:";
    }
  }

  // Fallback
  chatState.awaitingContact = true;
  return "😅 No estoy seguro de cómo responder eso. ¿Puedes dejarnos tu email o número para que un agente te contacte?";
}

chatSendBtn.addEventListener('click', () => {
  const msg = chatInput.value.trim();
  if (!msg) return;

  // User message
  chatMessages.innerHTML += `
    <div class="text-end mb-2"><span class="badge bg-primary">${msg}</span></div>
  `;

  const reply = getReply(msg);

  setTimeout(() => {
    chatMessages.innerHTML += `
      <div class="text-start mb-2"><span class="badge bg-secondary">${reply}</span></div>
    `;
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }, 600);

  chatInput.value = "";
});
</script>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">SupportSys 🛠️</a>
    <div class="ms-auto d-flex">
      <a href="login.php" class="btn btn-outline-light">Iniciar sesión</a>
      <a href="register.php" class="btn btn-outline-info ms-2">Registrarse</a>
      <button id="themeToggle" class="btn btn-outline-warning ms-3" title="Modo Claro/Oscuro">
        <i class="bi bi-moon-fill"></i>
      </button>
    </div>
  </div>
</nav>

<!-- HERO -->
<header class="py-5 text-white text-center hero">
  <div class="container glass">
    <h1 class="display-4 fw-bold">¿Necesitas ayuda? <span class="typed-text"></span></h1>
    <p class="lead">Rápido. Confiable. Gratis para siempre.</p>
    <a href="register.php" class="btn btn-light btn-lg px-4 py-2 mt-3 fw-semibold">Empieza gratis ahora</a>
  </div>
</header>

<!-- WAVE DIVIDER -->
<div class="wave-divider">
  <svg viewBox="0 0 1440 100"><path fill="#fff" d="M0,0L1440,100L1440,0L0,0Z"></path></svg>
</div>

<!-- WHY -->
<section class="py-5 scroll-reveal bg-white">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold">¿Por qué elegir SupportSys?</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <i class="bi bi-envelope-paper fs-1 text-primary mb-2"></i>
        <h5>Ticketing Rápido</h5>
        <p>Envía solicitudes o problemas en solo segundos.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-lightning-charge fs-1 text-warning mb-2"></i>
        <h5>Soporte Eficiente</h5>
        <p>Nuestros técnicos gestionan los tickets de forma veloz.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-bar-chart-line fs-1 text-success mb-2"></i>
        <h5>Estado en Tiempo Real</h5>
        <p>Sigue el avance de tus solicitudes con actualizaciones instantáneas.</p>
      </div>
    </div>
  </div>
</section>

<!-- COUNTERS -->
<section class="py-5 bg-white scroll-reveal">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Nuestras estadísticas</h2>
    <div class="row">
      <div class="col-md-4">
        <h1 class="display-4 counter" data-target="250">0</h1>
        <p>Tickets Resueltos</p>
      </div>
      <div class="col-md-4">
        <h1 class="display-4 counter" data-target="128">0</h1>
        <p>Usuarios Activos</p>
      </div>
      <div class="col-md-4">
        <h1 class="display-4 counter" data-target="99">0</h1>
        <p>% de Satisfacción</p>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="py-5 bg-light scroll-reveal">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">¿Cómo funciona?</h2>
    <div class="row text-center">
      <div class="col-md-4"><h4>1️⃣ Regístrate</h4><p>Crea una cuenta gratuita en segundos.</p></div>
      <div class="col-md-4"><h4>2️⃣ Envía un ticket</h4><p>Describe tu problema en el panel.</p></div>
      <div class="col-md-4"><h4>3️⃣ Recibe soporte</h4><p>Consulta respuestas y estado en tu cuenta.</p></div>
    </div>
  </div>
</section>

<!-- TESTIMONIOS -->
<section class="py-5 bg-white scroll-reveal">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Lo que dicen nuestros usuarios</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <img src="assets/img/user1.jpg" class="rounded-circle mb-3" width="80" height="80" alt="Laura">
          <blockquote class="blockquote"><p>"Me ayudaron en menos de una hora."</p><footer class="blockquote-footer">Laura</footer></blockquote>
        </div>
        <div class="carousel-item">
          <img src="assets/img/user2.jpg" class="rounded-circle mb-3" width="80" height="80" alt="Carlos">
          <blockquote class="blockquote"><p>"Siempre sé el estado de mi ticket."</p><footer class="blockquote-footer">Carlos</footer></blockquote>
        </div>
        <div class="carousel-item">
          <img src="assets/img/user3.jpg" class="rounded-circle mb-3" width="80" height="80" alt="Andrea">
          <blockquote class="blockquote"><p>"Ideal para equipos IT."</p><footer class="blockquote-footer">Andrea</footer></blockquote>
        </div>
      </div>
      <button class="carousel-control-prev" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
      <button class="carousel-control-next" data-bs-target="#testimonialCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
    </div>
  </div>
</section>

<!-- SCREENSHOTS -->
<section class="py-5 bg-light scroll-reveal">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Vistas del sistema</h2>
    <div id="screenshotsCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded shadow">
        <div class="carousel-item active"><img src="assets/img/service1.png" class="d-block w-100" alt="Login Screenshot"></div>
        <div class="carousel-item"><img src="assets/img/service2.png" class="d-block w-100" alt="Dashboard Screenshot"></div>
        <div class="carousel-item"><img src="assets/img/service3.png" class="d-block w-100" alt="Admin Screenshot"></div>
      </div>
      <button class="carousel-control-prev" data-bs-target="#screenshotsCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
      <button class="carousel-control-next" data-bs-target="#screenshotsCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-5 bg-white scroll-reveal">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Preguntas Frecuentes</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">¿Cómo envío un ticket?</button></h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Regístrate, inicia sesión y llena el formulario.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">¿Cuánto tarda el soporte?</button></h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Respondemos en menos de 24h hábiles.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">¿Puedo ver mis tickets?</button></h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Sí, desde tu panel verás todos tus tickets.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA FINAL -->
<section class="py-5 bg-primary text-white text-center scroll-reveal">
  <div class="container">
    <h3 class="fw-bold">Regístrate gratis y optimiza tu soporte hoy</h3>
    <a href="register.php" class="btn btn-light btn-lg mt-3">Crear mi cuenta</a>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  <small>SupportSys © <?= date('Y') ?> | Desarrollado por D’Andre Ryan Boston</small>
</footer>

<!-- CHAT MODAL -->
<button class="btn btn-primary rounded-circle shadow" id="chatBtn" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000;" data-bs-toggle="modal" data-bs-target="#chatModal">
  <i class="bi bi-chat-dots-fill fs-4"></i>
</button>
<div class="modal fade" id="chatModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ayuda en línea</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Hola 👋🏼 ¿En qué podemos ayudarte?</p>
        <div id="chatMessages" class="mb-3" style="max-height: 200px; overflow-y: auto;"></div>
        <input type="text" id="chatInput" class="form-control mb-2" placeholder="Escribe tu mensaje...">
        <button id="chatSendBtn" class="btn btn-primary w-100">Enviar</button>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
