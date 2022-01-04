<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/fundos/ceurs.jpg' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { text-align: center; padding-top: 120px; min-height: 500px; }
            .corpo p { font-size: 16px; }
            .corpo h1 { padding-bottom: 14px; }
            .corpo h2 { padding-bottom: 14px; }

            .rodape { text-align: center; }
            .rodape p {font-size: 12px; }

            @page {
                margin: 10%;
                margin-header: 3mm; 
	            margin-footer: 3mm; 
                background-image: url({{ ENV('ASSET_URL').'/img/fundos/ceurs.jpg' }}); background-position: bottom right; background-repeat: no-repeat;

                header: page-header;
		        footer: page-footer;
            }

            @page-footer {
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <htmlpagefooter name="page-footer">
            <p style="font-size: 13px; text-align: center;">A autenticação deste documento pode ser verificada em https://certificado.studiokem.ufsc.br/certificados/validacao/{{ $certificado->ds_hash_cer }}<p>
        </htmlpagefooter>

        <div class="corpo">
            <h2>Certificamos que</h2>
            <h1>{{ $certificado->participante->ds_nome_par }}</h1>
            <p>
                atuou como Participante da CAPACITAÇÃO EM MUNICIPALIZAÇÃO DA AGENDA 2030 
            </p>
            <p>
                realizado no período de 01/10/2021 a 31/10/2021 com carga horária de 10 horas.
            </p>
            <p>Esta atividade está amparada pelo Projeto de Extensão intitulado: Curso Introdutório à Municipalização da Agenda 2030</p>

            <h3>Tópicos Abordados</h3>
            <p>Introdução à Agenda 2030</p>
            <p>Gestão de Cidades</p>
            <p>Municipalização da Agenda 2030</p>
        </div>
    </body>
</html>