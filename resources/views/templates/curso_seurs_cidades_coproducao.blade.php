<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/fundos/certificado_coproducao.jpg' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { text-align: center; padding-top: 120px; min-height: 500px; }
            .corpo p { font-size: 14px; }
            .corpo h1 { padding-bottom: 8px; }
            .corpo h2 { padding-bottom: 8px; }

            .rodape { text-align: center; }
            .rodape p {font-size: 12px; }

            @page {
                margin: 10%;
                margin-header: 3mm; 
	            margin-footer: 1mm; 
                background-image: url({{ ENV('ASSET_URL').'/img/fundos/certificado_coproducao.jpg' }}); background-position: bottom right; background-repeat: no-repeat;

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
            <p style="font-size: 12px; text-align: center; margin-top: 10px; padding-top: 5px;">A autenticação deste documento pode ser verificada em https://certificado.studiokem.ufsc.br/certificados/validacao/{{ $certificado->ds_hash_cer }}<p>
        </htmlpagefooter>

        <div class="corpo">
            <p style="padding-bottom: 0px; margin-bottom: 0px;">
                Certificamos que a Equipe formada por 
                <strong>{{ $certificado->metadados->where('label_metadado_cem','#autores')->first()->valor_metadado_cem }}</strong>,
            </p>
            <p style="padding-top: 0px; margin-top: 0px;">
                elaborou o projeto de municipalização da Agenda 2030 intitulado <strong>{{ $certificado->metadados->where('label_metadado_cem','#titulo')->first()->valor_metadado_cem }}</strong>, como requisito para a conclusão do <br/>
                <strong>Curso CEURS Cidades</strong>, ofertado pelo <strong>Grupo de Pesquisa Coprodução de Commons Digitais</strong> do <br/>
                <strong>Programa de Pós-Graduação em Engenharia e Gestão do Conhecimento</strong>, da <strong>Universidade Federal de Santa Catarina</strong>.
            </p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p>Florianópolis, {{ date("d") }} de dezembro de {{ date("Y") }}.</p>   
            <p></p>
            <div style="text-align: center; margin-top: 70px;">
                <p>________________________</p>
                <p style="margin-bottom: 0px; padding-bottom: 0px;">Roberto Carlos dos Santos Pacheco</p>
                <p style="margin-top: 0px; padding-top: 0px;">Coordenador</p>
            </div>
        </div>
    </body>
</html>