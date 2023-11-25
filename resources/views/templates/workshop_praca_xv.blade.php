<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/fundos/workshop_praca_xv.jpg' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { text-align: center; padding-top: 120px; min-height: 500px; }
            .corpo p { font-size: 14px; }
            .corpo h1 { padding-bottom: 8px; }
            .corpo h2 { padding-bottom: 8px; }

            .rodape { text-align: center; }
            .rodape p {font-size: 12px; }

            @page {
                margin: 10%;
                margin-header: 3mm; 
	            margin-footer: 3mm; 
                background-image: url({{ ENV('ASSET_URL').'/img/fundos/workshop_praca_xv.jpg' }}); background-position: bottom right; background-repeat: no-repeat;

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
            <p style="font-size: 12px; text-align: center; margin-top: 5px;">A autenticação deste documento pode ser verificada em https://certificado.studiokem.ufsc.br/certificados/validacao/{{ $certificado->ds_hash_cer }}<p>
        </htmlpagefooter>

        <div class="corpo">
            <h2>Certificamos que</h2>
            <h1>{{ $certificado->participante->ds_nome_par }}</h1>
            <p>
                Atuou como Participante do <strong>Workshop Conexão - Praça XV ao Mar</strong>,
            </p>
            <p>
                desenvolvido pelo Laboratório de Cidades mais Humanas, Inteligentes e Sustentáveis (LabChis), da Universidade Federal de Santa Catarina (UFSC), entre os dias <strong>13 de novembro de 2023</strong> e <strong>17 de novembro de 2023<strong>, com carga horária de <strong>20</strong> horas semanais.
            </p>
            <h3>Tópicos Abordados</h3>
            <p>Escolha do Local CHIS; Definição dos problemas principais, de acordo com os atores locais; </p>
            <p>Busca de consenso sobre a solução para o principal problema do local CHIS; Detalhamento dos projetos estruturantes.</p>
        </div>
    </body>
</html>