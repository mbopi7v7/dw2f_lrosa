import { listarDependencias, insertarDependencia } from "./api.js";

document.addEventListener("DOMContentLoaded", async () => {
    const form = document.getElementById("formDependencia");
    const tabla = document.getElementById("tablaDependencias");

    // Carga inicial
    const data = await listarDependencias();
    localStorage.setItem("dependencias", JSON.stringify(data.datos));
    renderTabla(data.datos);

    // Evento submit
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const datos = Object.fromEntries(new FormData(form));
        const res = await insertarDependencia(datos);

        if(res.estado === "ok"){
            mostrarMensaje(res.mensaje,"success");
            const nuevaLista = await listarDependencias();
            localStorage.setItem("dependencias", JSON.stringify(nuevaLista.datos));
            renderTabla(nuevaLista.datos);
            form.reset();
        } else {
            mostrarMensaje(res.mensaje,"danger");
        }
    });

    function renderTabla(lista) {
        tabla.innerHTML = "";
        lista.forEach(dep => {
            tabla.innerHTML += `
                <tr>
                    <td>${dep.id}</td>
                    <td>${dep.nombre}</td>
                    <td>${dep.tipo}</td>
                    <td>${dep.edificio}</td>
                    <td>${dep.piso}</td>
                    <td>${dep.responsable}</td>
                    <td>${dep.telefono}</td>
                    <td>${dep.correo}</td>
                    <td>${dep.estado}</td>
                </tr>`;
        });
    }

    function mostrarMensaje(texto, tipo="success") {
        const msg = document.getElementById("mensajes");
        msg.className = `alert alert-${tipo}`;
        msg.textContent = texto;
        msg.classList.remove("d-none");
    }
});
