<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Mail;
use App\Utils;
use App\Certificado;
use App\Participante;
use App\ModeloCertificado;
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
        $certificados = Certificado::all();
        return view('certificados/index', compact('certificados'));
    }

    public function create()
    {
        $participantes = Participante::orderBy('ds_nome_par')->get();
        $modelos = ModeloCertificado::all();
        return view('certificados/create', compact('participantes','modelos'));
    }

    public function store(Request $request)
    {
        try {

            $flag = true;

            while($flag){
                $hash = Utils::gerarHash();
                if(!Certificado::where('ds_hash_cer',$hash)->first()){
                    $flag = false;
                }
            }

            $certicado = new Certificado();
            $certicado->id_participante_par = $request->id_participante_par;
            $certicado->id_modelo_certificado_moc = $request->id_modelo_certificado_moc;
                                
            $certicado->ds_hash_cer = $hash;
            $certicado->save();            
            
            $retorno = array('flag' => true,
                             'msg' => "Dados inseridos com sucesso");

        } catch (\Illuminate\Database\QueryException $e) {

            $retorno = array('flag' => false,
                             'msg' => Utils::getDatabaseMessageByCode($e->getCode()));

        } catch (Exception $e) {
            
            $retorno = array('flag' => true,
                             'msg' => "Ocorreu um erro ao inserir o registro");
        }

        if ($retorno['flag']) {
            Flash::success($retorno['msg']);
            return redirect('certificados')->withInput();
        } else {
            Flash::error($retorno['msg']);
            return redirect('certificados/create')->withInput();
        }
    }

    public function validarHash($hash){

        $dados = Certificado::where('ds_hash_cer', $hash)->with('participante')->with('situacao')->first();

        if($dados){
      
            $dados->increment('nu_total_validacoes_cer');
            return redirect('certificados/validacao')->with(['certificado' => $dados])->withInput();

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('certificados/validacao')->withInput();
        }

    }

    public function validarCertificado(Request $request)
    {
        $dados = Certificado::where('ds_hash_cer', $request->chave)->with('participante')->with('situacao')->first();

        if($dados){
      
            $dados->increment('nu_total_validacoes_cer');
            return redirect('certificados/validacao')->with(['certificado' => $dados])->withInput();

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('certificados/validacao')->withInput();
        }

    }

    public function emitirCertificado(Request $request)
    {
        $dados = Certificado::whereHas('participante', function($q) use ($request){
                    $q->where('ds_email_par', $request->email);
                })->with('modelo')
                ->get();
        
        if($dados){
      
            return redirect('certificados/segunda-via')->with(['dados' => $dados])->withInput();

        }else{
            Flash::error("Não foi encontrado nenhum participante com o código informado");
            return redirect('certificados/segunda-via')->withInput();
        }

    }

    public function gerarCertificado($codigo)
    {
        $dados = Certificado::where('ds_hash_cer', $codigo)->with('participante')->first();
        
        $tipo = strtolower($dados->modelo->tipo->ds_tipo_participacao_tip);

        if($dados){

            $dados->increment('nu_total_impressoes_cer');

            $nome_arquivo = 'certificado_'.$codigo;
            $data = [
                'certificado' => $dados
            ];
            
            $pdf = PDF::loadView('templates.'.$dados->modelo->ds_template_moc, $data,  [], ['title' => 'Resultado Indígenas', 'format' => 'A4-L', 'margin_bottom' => 0]);
            return $pdf->download('certificado_'.$tipo.'.pdf');

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('validar')->withInput();
        }

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
            
            $pdf = PDF::loadView('certificados.template_antigo', $data,  [], ['title' => 'Resultado Indígenas', 'format' => 'A4-L']);
            return $pdf->download('certificado.pdf');

        }else{
            Flash::error("Código de autenticação inválido ou não encontrado");
            return redirect('validar')->withInput();
        }

    }

    public function notificar($id)
    {
        $certicado = Certificado::where('id_certificado_cer', $id)->first();

        if($certicado){

            $to_name = $certicado->participante->ds_nome_par;
            $to_email = $certicado->participante->ds_email_par;
            $hash = $certicado->ds_hash_cer; 
            $evento = $certicado->modelo->evento->nm_evento_eve;
            $tipo = $certicado->modelo->tipo->ds_tipo_participacao_tip;

            $data = array("name"=> $to_name, 'hash' => $hash, 'evento' => $evento, 'tipo' => $tipo);

            Mail::send('email.notificacao', $data, function($message) use ($to_name, $to_email, $hash, $evento, $tipo) {
                $message->to($to_email, $to_name)
                        ->subject('Certificado de '.$tipo.' disponível - '.$evento)
                        ->from('nao.responda.studiokem@gmail.com','Não responda');
            });

            Flash::success("Participante $to_name notificado com sucesso no email $to_email");
            return redirect('certificados')->withInput();

        }else{
            Flash::error("Certificado não encontrado");
            return redirect('certificados')->withInput();
        }

    }
}