<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row">
        <!-- Card de Perfil (Lateral) com altura fixa -->
        <div class="col-md-3">
            <div class="card shadow-sm rounded-lg" style="height: 600px; overflow: hidden;">
                <div class="card-body text-center">
                    <img src="img/icon.jpg" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
                    <h5 class="mb-0">Guilherme Dinamarco</h5>
                    <small class="text-muted">Desenvolvedor Web</small>
                    <p class="mt-3 text-muted">Vá e Vença.</p>
                    <hr>

                    <!-- Informações Pessoais -->
                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="mb-0">29 anos</h6>
                            <small>Idade</small>
                        </div>
                        <div class="col-6">
                            <h6 class="mb-0">Rio de Janeiro</h6>
                            <small>Localização</small>
                        </div>
                    </div>

                    <hr>

                    <!-- Links -->
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none">GitHub</a></li>
                        <li><a href="mailto:g.dinamarco@gmail.com" class="text-decoration-none">E-mail</a></li>
                        <li><a href="#" class="text-decoration-none">Site</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <!-- Cartões de Tecnologia -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Front-End -->
                <div class="col">
                    <div class="card shadow-sm border-light rounded">
                        <h5 class="card-title text-center mt-3">Front-End</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-js-square fa-3x mb-3" style="color: #f0db4f;"></i>
                                    <h5 class="card-title">JavaScript</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-css3-alt fa-3x mb-3" style="color: #2965f1;"></i>
                                    <h5 class="card-title">CSS</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-html5 fa-3x mb-3" style="color: #e34f26;"></i>
                                    <h5 class="card-title">HTML</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back-End -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card shadow-sm border-light rounded">
                        <h5 class="card-title text-center mt-3">Back-End</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-php fa-3x mb-3" style="color: #777bb3;"></i>
                                    <h5 class="card-title">PHP</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-python fa-3x mb-3" style="color: #306998;"></i>
                                    <h5 class="card-title">Python</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fas fa-file-code fa-3x mb-3" style="color: #000;"></i>
                                    <h5 class="card-title">Caché Object Script</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Infraestrutura e Banco de Dados -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card shadow-sm border-light rounded">
                        <h5 class="card-title text-center mt-3">Infra-Estrutura e Banco de Dados</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-aws fa-3x mb-3" style="color: #232F3E;"></i>
                                    <h5 class="card-title">AWS</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-git-alt fa-3x mb-3" style="color: #f1502f;"></i>
                                    <h5 class="card-title">GIT</h5>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body text-center">
                                    <i class="fab fa-linux fa-3x mb-3" style="color: #000;"></i>
                                    <h5 class="card-title">Linux</h5>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card-body text-center">
                                    <i class="fab fa-database fa-3x mb-3" style="color: #4479a1;"></i>
                                    <h5 class="card-title">MySQL</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Estilos -->
<style>
    /* Personalizando lista para remover bolinhas */
    ul.list-unstyled li {
        margin-bottom: 10px;
    }

    ul.list-unstyled a {
        color: #007bff;
        font-size: 16px;
        transition: color 0.3s;
    }

    ul.list-unstyled a:hover {
        color: #0056b3;
    }

    /* Adicionando sombra ao card */
    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Efeitos de hover nos cartões */
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Card de perfil */
    .card-body img {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: bold;
    }

    /* Estilo de hover nos links */
    .card-body a {
        text-decoration: none;
        color: #007bff;
    }

    .card-body a:hover {
        color: #0056b3;
    }
</style>
