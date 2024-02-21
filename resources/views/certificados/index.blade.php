@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title"><i class="nc-icon nc-single-copy-04"></i> Certificados</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('certificados/create') }}" class="btn btn-info pull-right" style="margin-right: 12px;"><i class="fa fa-plus"></i> Cadastrar</a>
                    <a href="{{ url('certificados/cadastrar/arquivo') }}" class="btn btn-primary pull-right" style="margin-right: 12px;"><i class="fa fa-plus"></i> Cadastrar via arquivo</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.mensagens')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    {!! Form::open(['id' => 'frm_social_search', 'class' => 'form-horizontal', 'url' => ['coletas']]) !!}
                        <div class="form-group m-3 w-70">
                            <div class="row">
                                <div class="col-md-1 col-sm-12">
                                    <div class="form-group">
                                        <label>Data do Certificado</label>
                                        <input type="text" class="form-control datepicker" name="dt_coleta" required="true" value="" placeholder="__/__/____">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label>Email do Participante</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Evento</label>
                                        <select class="form-control select2" name="evento" id="evento">
                                            <option value="">Selecione um evento</option>
                                            @foreach ($eventos as $evento)
                                                <option value="{{ $evento->cd_evento_eve }}">{{ $evento->nm_evento_eve}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Modelo de Certificado <span class="text-info">Vinculados ao Evento</span></label>
                                        <select class="form-control" name="modelo" id="modelo">
                                            <option value="">Selecione um modelo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    {!! Form::close() !!}
                </div>  
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Emissão</th>
                      <th>Evento</th>
                      <th>Proprietário</th>
                      <th>Email</th>
                      <th>Tipo de Certificado</th>
                      <th>Chave</th>
                      <th>Notificação</th>
                      <th class="disabled-sorting text-center">Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Emissão</th>
                        <th>Evento</th>
                        <th>Proprietário</th>
                        <th>Email</th>
                        <th>Tipo de Certificado</th>
                        <th>Chave</th>
                        <th>Notificação</th>
                        <th class="disabled-sorting text-center">Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($certificados as $c)
                        <tr>
                            <td>{!! ($c->created_at) ? date('d/m/Y H:i:s', strtotime($c->created_at)) : '<span class="text-danger">Não informada</span>' !!}</td>
                            <td>{{ $c->modelo->evento->nm_evento_eve }}</td>
                            <td>{{ $c->participante->ds_nome_par }}</td>
                            <td>{{ $c->participante->ds_email_par }}</td>
                            <td>{{ $c->modelo->tipo->ds_tipo_participacao_tip }}</td>
                            <td class="text-center">
                                <a href="{{ url('certificados/validar/'.$c->ds_hash_cer) }}" target="_blank">{{ $c->ds_hash_cer }}</a>
                            </td>
                            <td class="text-center">
                                @if($c->fl_notificacao_cer == 'S')
                                    <span class="badge badge-success">Enviada</span>
                                @else
                                    <span class="badge badge-warning">Pendente</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a title="Emitir" href="{{ url('certificados/gerar/'.$c->ds_hash_cer) }}" class="btn btn-danger btn-link btn-icon"><i class="fa fa-file-pdf-o fa-2x"></i></a>
                                <a title="Notificar" href="{{ url('certificados/notificar/'.$c->id_certificado_cer) }}" class="btn btn-success btn-link btn-icon"><i class="fa fa-send fa-2x"></i></a>
                                <a title="Editar" href="#" class="btn btn-primary btn-link btn-icon"><i class="fa fa-edit fa-2x"></i></a>
                                <a title="Excluir" href="{{ url('certificado/excluir/'.$c->id_certificado_cer) }}" class="btn btn-danger btn-link btn-icon"><i class="fa fa-times fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection