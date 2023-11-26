<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/fundos/workshop_praca_xv.png' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { text-align: center; padding-top: 45px; min-height: 500px; }
            .corpo p { font-size: 14px; }
            .corpo h1 { padding-bottom: 8px; }
            .corpo h2 { padding-bottom: 8px; }

            .rodape { text-align: center; }
            .rodape p {font-size: 12px; }

            @page {
                margin: 10%;
                margin-header: 3mm; 
	            margin-footer: 1mm; 
                background-image: url({{ ENV('ASSET_URL').'/img/fundos/workshop_praca_xv.png' }}); background-position: bottom right; background-repeat: no-repeat;

                header: page-header;
		        footer: page-footer;
            }

            @page-footer {
                padding-top: 5px;
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <htmlpagefooter name="page-footer">
            <p style="font-size: 12px; color: white; text-align: center; margin-top: 10px; padding-top: 10px;">A autenticação deste documento pode ser verificada em https://certificado.studiokem.ufsc.br/certificados/validacao/{{ $certificado->ds_hash_cer }}<p>
        </htmlpagefooter>

        <div class="corpo">
            <h2>Certificamos que</h2>
            <h1>{{ $certificado->participante->ds_nome_par }}</h1>
            <p>
                Atuou como PARTICIPANTE do <strong>Workshop Conexão - Praça XV ao Mar</strong>,
                desenvolvido pelo <strong>Laboratório de Cidades mais Humanas, Inteligentes e Sustentáveis (LabCHIS)</strong>, da <strong>Universidade Federal de Santa Catarina (UFSC)</strong>, entre os dias <strong>13 de novembro de 2023</strong> e <strong>17 de novembro de 2023</strong>, com carga horária de <strong>20</strong> horas semanais.
            </p>
            <h4>Tópicos Abordados</h4>
            <p>Escolha do Local CHIS; Definição dos problemas principais, de acordo com os atores locais; </p>
            <p>Busca de consenso sobre a solução para o principal problema do local CHIS; Detalhamento dos projetos estruturantes.</p>
        </div>
    </body>
</html>