Dear <strong>{{ $name }}</strong>,
<p>
    We inform you that your {{ $tipo }} in the joint edition of the 18th International Conference on Knowledge Management (ICKM2023) 
    and the 13th International Congress on Knowledge and Innovation (CiKi2023) for issuance and validation in our system.
</p>
<p>To issue your certificate, please access the following address:</p>
<p><a href="{{ ENV('APP_URL') }}/certificados/gerar/{{ $hash }}">{{ ENV('APP_URL') }}/certificados/gerar/{{ $hash }}</a></p>
<p>To view all certificates issued with your email, go to:</p>
<p><a href="{{ ENV('APP_URL') }}/certificados/segunda-via">{{ ENV('APP_URL') }}/certificados/segunda-via</a></p>
<p>Yours sincerely,</p>
<p>Organizing committee</p>
<p>18th International Conference on Knowledge Management (ICKM2023) and 13th International Congress on Knowledge and Innovation (CiKi2023)</p>
<p style="color: red;"><strong>ATTENTION</strong>: This message was sent automatically. Please do not reply to this message.</p>