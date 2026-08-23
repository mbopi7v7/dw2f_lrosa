const API_URL = "api/api.php";

export async function listarDependencias() {
    const res = await fetch(`${API_URL}?action=listar`);
    return await res.json();
}

export async function insertarDependencia(datos) {
    const formData = new FormData();
    for (let key in datos) {
        formData.append(key, datos[key]);
    }
    const res = await fetch(API_URL, { method: "POST", body: formData });
    return await res.json();
}
