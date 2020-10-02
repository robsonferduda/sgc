<?php

namespace App\Http\Controllers;

use PDF;
use App\CertificadoCiki;
use App\ParticipanteCiki;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('certificados/index');
    }

    public function validar(Request $request)
    {
        $dados = CertificadoCiki::where('de_hash', $request->chave)->with('participante')->with('situacao')->first();

        if($dados){
      
            return redirect('validar')->with(['certificado' => $dados])->withInput();

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('validar')->withInput();
        }

    }

    public function emitir(Request $request)
    {
        $dados = ParticipanteCiki::where('nr_documento', $request->chave)->with('certificado')->get();

        if($dados){
      
            return redirect('emitir')->with(['dados' => $dados])->withInput();

        }else{
            Flash::error("Não foi encontrado nenhum participante com o código informado");
            return redirect('emitir')->withInput();
        }

    }

    public function gerarCertificadoPdf($codigo)
    {
        $dados = CertificadoCiki::where('de_hash', $codigo)->with('participante')->first();

        if($dados){

            $nome_arquivo = 'certificado_'.$codigo;
            $data = [
                'certificado' => $dados
            ];
            
            $pdf = PDF::loadView('certificados.template', $data,  [], ['title' => 'Resultado Indígenas', 'format' => 'A4-L']);
            return $pdf->download('certificado.pdf');

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('validar')->withInput();
        }

    }
}