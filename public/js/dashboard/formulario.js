const formulario = document.getElementById("formulario");

const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, números, guion y guion bajo
    contraseña: /^.{8,12}$/, // 8 a 12 digitos
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, // Correo electrónico
    telefono: /^\d{7,14}$/, // 7 a 14 números
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    direccion: /^[a-zA-Z0-9\s,.'-]{3,}$/, // Letras, números, espacios y algunos caracteres especiales
};
const validarFormulario = (e) => {
    switch(e.target.name) {
        case "user":
            if(expresiones.user.test(e.target.value)) {
            } else {
                document.getElementById('grupo__user').classList.add('formulario__grupo-incorrecto');
            }
        break;
        case "password":
            console.log('contraseña de usuario');
        break;
    }
};
inputs.forEach((input) => {
    input.addEventListener("keyup", validarFormulario);
    input.addEventListener("blur", validarFormulario);
});

formulario.addEventListener("submit", (e) => {
    e.preventDefault();
});
