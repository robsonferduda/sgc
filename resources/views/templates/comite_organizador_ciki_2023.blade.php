<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/fundos/ciki_2023.jpg' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { text-align: center; padding-top: 180px; min-height: 500px; }
            .corpo p { font-size: 20px; }
            .corpo h1 { padding-bottom: 14px; }
            .corpo h2 { padding-bottom: 14px; }

            .rodape { text-align: center; }
            .rodape p {font-size: 12px; }

            @page {
                margin: 10%;
                margin-header: 3mm; 
	            margin-footer: 3mm; 
                background-image: url({{ ENV('ASSET_URL').'/img/fundos/ciki_2023.jpg' }}); background-position: bottom right; background-repeat: no-repeat;

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
            <p style="font-size: 13px; text-align: center;">The authenticity of this document can be verified in the url https://certificados.studiokem.ufsc.br/certificados/validar/{{ $certificado->ds_hash_cer }}<p>
        </htmlpagefooter>

        <div class="corpo">
            <h2>Organizing Committee Certificate</h2>
            <p>
                It is hereby certified that <strong>{{ $certificado->participante->ds_nome_par }}</strong> participated as a member of Organizing Committee in the joint edition of the 18th International Conference on Knowledge Management (ICKM2023) 
                and the 13th International Congress on Knowledge and Innovation (CiKi2023), held in Florianópolis, Brazil, from 22 to 24 November 2023, which involved 30 hours of activities. 
            </p>
        </div>
    </body>
</html>