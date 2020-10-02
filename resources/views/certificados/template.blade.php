<html>
    <head>
        <style>
            body { background-image: url({{ ENV('ASSET_URL').'/img/modelos/certf_diretor_coordenador_limpo.jpg' }}); background-position: bottom right; background-repeat: no-repeat; }
            .corpo { padding-top: 200px; }
        </style>
    </head>
    <body>
        <div class="corpo">
            {!! $certificado->de_texto_certificado !!}
            {{ ENV('ASSET_URL').'/uploads/modelos/certf_diretor_coordenador_limpo.jpg' }}
        </div>
    </body>
</html>
