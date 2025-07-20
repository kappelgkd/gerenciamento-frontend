<script src="javascript/index.js"></script>
<script>
    if(verificarToken()){
        window.location.href = '/blog';
    }
</script>
<div class="green-animated-bg"></div>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card white-card tamanhoCard">
            <div class="card-body p-4">
                <div class="d-flex flex-column h-100">
                    <div class="text-center mb-4">
                        <h3 class="mb-1">Bem-vindo de volta</h3>
                        <p class="text-muted">Faça login para acessar sua conta</p>
                    </div>
                    
                    <form class="login-form" id="login-form">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="login" placeholder="seu@email.com" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lembrar">
                                <label class="form-check-label" for="lembrar">Lembrar-me</label>
                            </div>
                            <a href="#" class="text-decoration-none">Esqueceu a senha?</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                        
                        <div class="text-center">
                            <p class="mb-0">Não tem uma conta? <a href="#" class="text-decoration-none">Cadastre-se</a></p>
                        </div>
                    </form>
                    
                    <div class="mt-auto">
                        <div class="social-login text-center">
                            <p class="text-muted mb-2">Ou entre com</p>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-outline-primary rounded-circle social-btn">
                                    <i class="bi bi-google"></i>
                                </button>
                                <button class="btn btn-outline-primary rounded-circle social-btn">
                                    <i class="bi bi-facebook"></i>
                                </button>
                                <button class="btn btn-outline-primary rounded-circle social-btn">
                                    <i class="bi bi-apple"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="javascript/login.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css">
