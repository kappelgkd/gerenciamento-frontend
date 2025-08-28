function verificarToken() {
    const token = localStorage.getItem("token");
    if (!token) {
        return false;
    }

    try {
        // jwt tem 3 partes: header, payload, signature
        const payloadBase64Url = token.split('.')[1];
        if (!payloadBase64Url) return false;

        // converter Base64URL para Base64
        const payloadBase64 = payloadBase64Url.replace(/-/g, '+').replace(/_/g, '/');

        // decodificar para JSON
        const payloadJson = atob(payloadBase64);
        const payload = JSON.parse(payloadJson);

        if (!payload.exp) {
            return false;
        }

        const agora = Math.floor(Date.now() / 1000);
        if (payload.exp < agora) {
            return false;
        }

        return true;
    } catch (erro) {
        console.log("erro ao decodificar o token", erro);
        return false;
    }
}
