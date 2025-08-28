// Funcionalidade para mostrar/esconder senha
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function () {
        const passwordInput = this.previousElementSibling;
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });
});

// função para autenticação
document.getElementById('login-form').addEventListener('submit', async function (e) {
    e.preventDefault(); // Evita o envio padrão do formulário

    const login = document.getElementById('login').value;
    const senha = document.getElementById('senha').value;
    
    try {
        const response = await fetch('https://api.kappelgkd.com.br/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ login, senha })
        });

        const data = await response.json();
        // alert(data);
        if (response.ok) {
            // console.log(data);
            localStorage.setItem('token',data.token);
            // alert('Login bem sucedido.');
            window.location.href = '/blog';
            
        } else {
            alert(data.message);
            //document.getElementById('message').innerText = data.message || 'Falha no login';
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        //document.getElementById('message').innerText = 'Erro de conexão com a API';
    }
});
