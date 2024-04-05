<?php get_header(); ?>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Insere o comentário no WordPress
    $comment_data = array(
        'comment_author' => $nome,
        'comment_author_email' => $email,
        'comment_content' => $mensagem,
        'comment_type' => 'comment', // Pode ser 'comment', 'trackback', 'pingback', ou um tipo personalizado
        'comment_meta' => array(
            'telefone' => $telefone
        )
    );

    $comment_id = wp_insert_comment($comment_data);

    if ($comment_id) {
        echo "Comentário inserido com sucesso!";
        // Envio de e-mail
        $to = 'contato@contrail.com.br'; // Substitua pelo seu endereço de e-mail
        $subject = 'Contrail - Novo Formulário de Contato recebido';
        
        // Construindo o corpo do e-mail com HTML
        $message = '<html><body>';
        $message .= '<h2 style="color: #007749;">Contrail - Formulário de Contato recebido</h2>';
        $message .= '<p><strong>Nome:</strong> ' . $nome . '</p>';
        $message .= '<p><strong>Email:</strong> ' . $email . '</p>';
        $message .= '<p><strong>Telefone:</strong> ' . $telefone . '</p>';
        $message .= '<p><strong>Mensagem:</strong><br>' . nl2br($mensagem) . '</p>';
        $message .= '</body></html>';
        
        // Adicionando estilos CSS embutidos
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: Formulário Contato Site Contrail <contato@contrail.com.br>',
            'Reply-To: ' . $nome . ' <' . $email . '>'
        );

        wp_mail($to, $subject, $message, $headers);
    } else {
        echo "Ocorreu um erro ao inserir o comentário.";
    }
}
?>

<br><br>
<div class="hero">
    <div class="mt-5 pt-5 float-left" data-aos="fade-right">
        <div class="text-center m-2">
            <h1 style="text-shadow: 2px 2px black;" style="font-size:2vw;" class="ml-2 mt-5 text-white pt-5 ml-0">&nbsp;Soluções Eficientes na<br> Logística de Contêineres</h1>
            <p class="text-white d-xl-block  d-lg-block d-md-block d-none p-3" style="font-size:1vw;">A Contrail oferece soluções logísticas multimodais aos<br>seus clientes combinando a confiabilidade ferroviária<br> e a flexibilidade rodoviária</p>
        </div>
    </div>
</div>
<!-- PARCEIROS -->
<section>
    <h2 id="vantagensH1" class="h2-responsive mt-3 pt-5 pl-4 pt-2 font-weight-bold" style="z-index:20;position:relative;color:#05452E;">SOLIDEZ FINANCEIRA E OPERACIONAL</h2>
    <div class="row text-center align-items-center mt-n5 p-5">
        <!-- Conteúdo dos parceiros -->
    </div>
</section>
<h2 id="vantagensH1" class="mt-3 ml-4 font-weight-bold" style="z-index:20;position:relative;color:#05452E;">PRINCIPAIS VANTAGENS</h2>
<section class="container p-3">
    <!-- Vantagens -->
</section>
<section>
    <div class="row">
        <div class="col-md-6 bg-dark p-2 text-center">
            <h2 class="text-center text-white p-5">SUSTENTABILIDADE</h2>
            <p class="text-center m-2 d-md-block d-none p-5" style="font-size:2vw;">Carga de 1 trem equivale a<br>42 caminhões</p>
            <!-- Conteúdo da sustentabilidade -->
        </div>
        <div class="col-md-6 nature" data-aos="flip-right">
        </div>
    </div>
</section>

<div id="faleConosco" style="z-index:20;position:relative;" class="w-100 parallax py-5">
    <div class="container" data-aos="zoom-in-up">
        <div class="mx-auto rounded p-5 w-100" style="background:#007351;">
            <h3 class="h3 m-3 text-center text-white font-weight-bold">Fale Conosco!</h3>
            <p class="text-white">Tem alguma dúvida, sugestão ou crítica a fazer? Então entre em contato conosco. Suas dúvidas serão esclarecidas e sua opinião é fundamental para o nosso aperfeiçoamento.</p>
            <form method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Seu nome" name="nome" aria-label="Nome" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Seu email" name="email" aria-label="Email" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Seu telefone" name="telefone" aria-label="Telefone" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <textarea class="form-control" placeholder="Mensagem" name="mensagem" aria-label="Mensagem" aria-describedby="basic-addon1"></textarea>
                </div>
                <button type="submit" class="btn btn-success float-right" name="enviar">ENVIAR</button>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
