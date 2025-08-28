function verificarToken(){
    const token = localStorage.getItem("token");
    alert(token);
    if(!token){
        return false;
    }

    try{
        // jwt tem 3 partes; header, payload, signature
        const payloadBase64 = token.split('.')[1];
        const payloadJson = atob(payloadBase64);
        const payload = JSON.parse(payloadJson);
        
        if(!payload.exp){
            //window.location.href = '/login';
            return false;
        }

        const agora = Math.floor(Date.now() / 1000); // hora atual em segundos. Math.floor() é função para aproximar um número
        if(payload.exp < agora){
            //window.location.href = '/login';
            return false;
        }

        return true;
    }
    catch(erro){
        console.log("erro ao decodificar o token", erro);
        return false;

    }
}

