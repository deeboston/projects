// Activate scroll reveal fallback
document.documentElement.classList.remove('no-js');

document.addEventListener("DOMContentLoaded", () => {
  // ========================
  // Typed.js Animation
  // ========================
  if (document.querySelector('.typed-text')) {
    new Typed('.typed-text', {
      strings: ["Envía un ticket", "Recibe soporte", "Resuelve tus dudas"],
      typeSpeed: 50,
      backSpeed: 25,
      loop: true
    });
  }

  // ========================
  // Scroll Reveal
  // ========================
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("revealed");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

  // ========================
  // Counter Up Effect
  // ========================
  document.querySelectorAll('.counter').forEach(counter => {
    const update = () => {
      const target = +counter.getAttribute('data-target');
      const count = +counter.innerText;
      const increment = target / 50;
      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(update, 40);
      } else {
        counter.innerText = target;
      }
    };
    update();
  });

  // ========================
  // Theme Toggle
  // ========================
  const toggle = document.getElementById('themeToggle');
  if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
  }

  toggle?.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const mode = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', mode);
  });

  // ========================
  // ChatBot Logic
  // ========================
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

  function renderMessage(message, sender = 'bot') {
    const bubble = document.createElement('div');
    bubble.className = `chat-bubble ${sender}`;
    bubble.innerText = message;
    chatMessages.appendChild(bubble);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function getReply(msg) {
    const message = msg.toLowerCase();

    for (let pair of advancedReplies) {
      if (pair.triggers.some(t => message.includes(t))) {
        return pair.response;
      }
    }

    if (chatState.awaitingContact) {
      if (message.match(/\d{8,}|\S+@\S+\.\S+/)) {
        chatState.awaitingContact = false;
        return "📩 Gracias. Un agente te contactará pronto.";
      } else {
        return "❗ No parece un número o correo válido. Intenta de nuevo:";
      }
    }

    chatState.awaitingContact = true;
    return "😅 No estoy seguro de cómo responder eso. ¿Puedes dejarnos tu email o número para que un agente te contacte?";
  }

  chatSendBtn?.addEventListener('click', () => {
    const msg = chatInput.value.trim();
    if (!msg) return;

    renderMessage(msg, 'user');
    chatInput.value = '';

    const typing = document.createElement('div');
    typing.className = 'typing-indicator';
    typing.innerText = 'Escribiendo...';
    chatMessages.appendChild(typing);
    chatMessages.scrollTop = chatMessages.scrollHeight;

    setTimeout(() => {
      typing.remove();
      const reply = getReply(msg);
      renderMessage(reply, 'bot');
    }, 800);
  });
});
