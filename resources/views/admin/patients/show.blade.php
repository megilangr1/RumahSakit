@extends('admin.layouts.master')

@section('css')
<style>
	.dataTables_scrollBody {
		height: 200px !important;
	}
</style>
@endsection

@section('title')
	Manajemen Pasien
@endsection

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-green-haze"></i>
            <span class="caption-subject font-green-haze bold uppercase">Data Detail Pasien</span>
        </div>
        
        <div class="tools" style="margin-left: 5px; margin-right: 5px">
            <a href="" class="collapse">
            </a>
            <a href="#portlet-config" data-toggle="modal" class="config">
            </a>
            <a href="" class="reload">
            </a>
            <a href="" class="remove">
            </a>
        </div>
        <a href="{{ route('pasiens.create') }}" class="btn btn-primary pull-right">
            Print Data Pasien
        </a>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal" role="form">
            <div class="form-body">
                @forelse ($pasien as $p)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">NIK :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->nik }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    
                </div>
                <!--/row-->
                <div class="row">
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telepon :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->phone }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->date_of_birth }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Daftar Sejak :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                     {{ $p->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email :</label>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    {{ $p->login->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green"><i class="fa fa-pencil"></i> Edit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@endsection