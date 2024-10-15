const html = document.documentElement; // Referencia al elemento raíz del documento (HTML).
const body = document.body; // Referencia al elemento del cuerpo del documento (BODY).
const menuLinks = document.querySelectorAll(".admin-menu a"); // Selecciona todos los enlaces dentro del menú de administración.
const collapseBtn = document.querySelector(".admin-menu .collapse-btn"); // Selecciona el botón para colapsar el menú.
const toggleMobileMenu = document.querySelector(".toggle-mob-menu"); // Selecciona el botón para alternar el menú móvil.
const switchInput = document.querySelector(".switch input"); // Selecciona el input del switch para cambiar el modo.
const switchLabel = document.querySelector(".switch label"); // Selecciona la etiqueta del switch.
const switchLabelText = switchLabel.querySelector("span:last-child"); // Selecciona el texto del switch (último span dentro de la etiqueta).
const collapsedClass = "collapsed"; // Clase utilizada para indicar que el menú está colapsado.
const lightModeClass = "light-mode"; // Clase utilizada para indicar que el modo claro está activo.

/*TOGGLE HEADER STATE*/
collapseBtn.addEventListener("click", function () {
  // Alterna la clase 'collapsed' en el body al hacer clic en el botón de colapso.
  body.classList.toggle(collapsedClass);
  // Cambia el atributo 'aria-expanded' entre 'true' y 'false' para accesibilidad.
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  // Cambia el atributo 'aria-label' entre 'collapse menu' y 'expand menu' para accesibilidad.
  this.getAttribute("aria-label") == "collapse menu"
    ? this.setAttribute("aria-label", "expand menu")
    : this.setAttribute("aria-label", "collapse menu");
});

/*TOGGLE MOBILE MENU*/
toggleMobileMenu.addEventListener("click", function () {
  // Alterna la clase 'mob-menu-opened' en el body al hacer clic en el botón del menú móvil.
  body.classList.toggle("mob-menu-opened");
  // Cambia el atributo 'aria-expanded' entre 'true' y 'false' para accesibilidad.
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  // Cambia el atributo 'aria-label' entre 'open menu' y 'close menu' para accesibilidad.
  this.getAttribute("aria-label") == "open menu"
    ? this.setAttribute("aria-label", "close menu")
    : this.setAttribute("aria-label", "open menu");
});

/*SHOW TOOLTIP ON MENU LINK HOVER*/
for (const link of menuLinks) {
  // Añade un evento de 'mouseenter' a cada enlace del menú.
  link.addEventListener("mouseenter", function () {
    // Si el menú está colapsado y el ancho de la ventana es mayor a 768px, muestra la información del tooltip.
    if (
      body.classList.contains(collapsedClass) &&
      window.matchMedia("(min-width: 768px)").matches
    ) {
      const tooltip = this.querySelector("span").textContent; // Obtiene el texto del tooltip desde el span dentro del enlace.
      this.setAttribute("title", tooltip); // Establece el texto del tooltip como el atributo 'title' del enlace.
    } else {
      this.removeAttribute("title"); // Elimina el atributo 'title' si no se cumplen las condiciones.
    }
  });
}

/*TOGGLE LIGHT/DARK MODE*/
if (localStorage.getItem("dark-mode") === "false") {
  // Si el modo oscuro está desactivado en localStorage, activa el modo claro.
  html.classList.add(lightModeClass);
  switchInput.checked = false; // Desmarca el switch.
  switchLabelText.textContent = "Light"; // Cambia el texto del switch a "Light".
}

// Añade un evento de 'input' al switch para alternar entre modos.
switchInput.addEventListener("input", function () {
  html.classList.toggle(lightModeClass); // Alterna la clase 'light-mode' en el elemento HTML.
  if (html.classList.contains(lightModeClass)) {
    // Si el modo claro está activo, actualiza el texto y localStorage.
    switchLabelText.textContent = "Light"; // Cambia el texto a "Light".
    localStorage.setItem("dark-mode", "false"); // Almacena que el modo oscuro está desactivado.
  } else {
    // Si el modo claro no está activo, actualiza el texto y localStorage.
    switchLabelText.textContent = "Dark"; // Cambia el texto a "Dark".
    localStorage.setItem("dark-mode", "true"); // Almacena que el modo oscuro está activado.
  }
});
