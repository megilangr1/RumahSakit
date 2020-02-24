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
<div class="col-md-12">
	<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-green-haze"></i>
                <span class="caption-subject font-green-haze bold uppercase">Data Pasien</span>
            </div>
            <div class="tools">
                <a href="" class="collapse">
                </a>
                <a href="#portlet-config" data-toggle="modal" class="config">
                </a>
                <a href="" class="reload">
                </a>
                <a href="" class="remove">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form class="form-horizontal" role="form">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">NIK :</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                         Bob
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin :</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                         Nilson
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
                                <label class="control-label col-md-3">Nama Pasien :</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                         Male
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
                                         20.01.1984
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
                                         Category1
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat :</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                         Free
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    {{-- <h3 class="form-section">Address</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Address:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                         #24 Sun Park Avenue, Rolton Str
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--/row-->
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
</div>
@endsection