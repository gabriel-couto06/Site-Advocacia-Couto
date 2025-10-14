const element = document.querySelector('.titulo');

    function reveal() {
      const top = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;

      if (top < windowHeight - 50) { // quando estiver visível na tela
        element.classList.add('active');
      }
    }

    window.addEventListener('scroll', reveal);
    window.addEventListener('load', reveal);

     const boxes = document.querySelectorAll('.box');

    function revealBoxes() {
      const windowHeight = window.innerHeight;

      boxes.forEach(box => {
        const top = box.getBoundingClientRect().top;
        if (top < windowHeight - 50) { // quando entrar na tela
          box.classList.add('active');
        }
      });
    }

    window.addEventListener('scroll', revealBoxes);
    window.addEventListener('load', revealBoxes);

     const equipeH2 = document.querySelector('.equipe h2');
  const equipePs = document.querySelectorAll('.equipe p');

  function revealEquipe() {
    const windowHeight = window.innerHeight;

    // H2 da esquerda
    const topH2 = equipeH2.getBoundingClientRect().top;
    if (topH2 < windowHeight - 50) {
      equipeH2.classList.add('active');
    }

    // P subindo de baixo
    equipePs.forEach(p => {
      const top = p.getBoundingClientRect().top;
      if (top < windowHeight - 50) {
        p.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', revealEquipe);
  window.addEventListener('load', revealEquipe);