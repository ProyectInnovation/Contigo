function parseJwt(token) {
    const base64Url = token.split('.')[1];
    const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    const jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
}

function handleCredentialResponse(response) {
    const token = response.credential;
    const datos = parseJwt(token);

    // Ahora tienes: datos.name, datos.email, datos.picture
    console.log("Usuario:", datos);

    // Enviar al backend
    fetch("include/guardar_google.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nombre: datos.name,
            correo: datos.email,
            foto: datos.picture
        })
    }).then(res => res.text())
        .then(msg => {
            alert(msg);
            window.location.href = "index.html";
        });
}
