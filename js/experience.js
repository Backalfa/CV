// Função para verificar se um elemento está visível no viewport
function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
  
  // Função para verificar quando a seção está visível e adicionar a classe
  function checkVisibility() {
    var elements = document.querySelectorAll(".animate-on-scroll");
    
    elements.forEach(function (element) {
      if (isElementInViewport(element)) {
        element.classList.add("in-viewport");
      }
    });
  }
  
  // Verificar a visibilidade ao carregar a página e ao rolar
  window.addEventListener("DOMContentLoaded", checkVisibility);
  window.addEventListener("scroll", checkVisibility);
  