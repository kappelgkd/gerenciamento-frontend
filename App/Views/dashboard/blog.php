<div class="container mt-5">
    <h2 class="text-center text-light mb-3">Lista de Conteúdos</h2>

    <div class="row justify-content-center">
        <div class="col-lg-10 d-flex justify-content-end mb-3">
            <button id="btn-criar-conteudo" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditor">Criar Conteúdo</button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div id="list-group" class="row gy-3">
                <!-- Itens renderizados aqui -->
            </div>

            <nav class="mt-4">
                <ul id="paginacao" class="pagination justify-content-center"></ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditor" tabindex="-1" aria-labelledby="modalEditorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="max-width: 90vw;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEditorLabel">Novo Conteúdo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body px-4" style="min-height: 600px;"> <!-- Aumentei a altura mínima do body do modal -->
                <form id="formConteudo">
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input type="text" class="form-control shadow-sm" id="titulo" name="titulo" required>
                    </div>

                    <div id="container-tipos" class="mb-3">
                        <!-- Tipos de conteúdo serão inseridos aqui -->
                    </div>

                    <div class="mb-3" style="height: 400px;"> <!-- Altura maior para o CKEditor -->
                        <label for="editor" class="form-label fw-semibold">Conteúdo</label>
                        <textarea id="editor" name="conteudo" style="height: 100%;"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer px-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formConteudo" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap e ícones -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<link rel="stylesheet" href="css/blog.css" />
<!-- CKEditor 5 Classic CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<!-- Bootstrap Bundle JS para modal funcionar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Scripts adicionais -->
<script src="javascript/blog.js"></script>
<script src="javascript/index.js"></script>
