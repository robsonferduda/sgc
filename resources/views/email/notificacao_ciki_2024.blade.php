Prezado (a) <strong>{{ $name }}</strong>,
<p>Informamos que seu certificado de {{ $tipo }} no XIV Congreso Internacional de Conocimiento e Innovación - ciKi está disponível para emissão e validação em nosso sistema.</p>
<p>Para emitir seu certificado, acesse o seguinte endereço:</p>
<p><a href="{{ ENV('APP_URL') }}/certificados/gerar/{{ $hash }}">{{ ENV('APP_URL') }}/certificados/gerar/{{ $hash }}</a></p>
<p>Para visualizar todos os certificados emitidos com seu email acesse:</p>
<p><a href="{{ ENV('APP_URL') }}/certificados/segunda-via">{{ ENV('APP_URL') }}/certificados/segunda-via</a></p>
<p>Atenciosamente,</p>
<p>Comissão Organizadora do Congresso Internacional de Conhecimento e Inovação 2024</p>
<p style="color: red;"><strong>ATENÇÃO</strong>: Esta mensagem foi enviada automaticamente. Por favor, não responda a esta mensagem.</p>