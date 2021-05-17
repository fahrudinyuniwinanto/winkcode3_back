@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">Contoh Master Detail + Lookup Data Table (Kecamatan & Desa) <small> </small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Master Detail</li>
</ol>
@stop
@section('content')
<!-- //Subscribe Youtube Channel Peternak Kode on https://youtube.com/c/peternakkode -->
<!doctype html>
<div class="panel panel-inverse form-inline" ng-show="f.tab=='list'" id="div1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                <i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">List Destinasi Wisata</h4>
    </div>
    <div class="panel-body">
        <div class="input-group m-b">
            <input type="text" ng-model="f.q" class="form-control input-sm" placeholder="" ng-enter="getList()">
            <span class="input-group-addon pointer btn btn-primary" ng-show="f.q!=''" ng-click="f.q='';getList();"><i
                    class="fa fa-refresh"></i></span>
            <span class="input-group-addon pointer btn btn-primary" ng-click="getList()"><i class="fa fa-search"></i>
                Cari</span>
        </div>
        <div class="pull-right form-inline">
            <button type="button" class="btn btn-sm btn-primary" ng-click="new()"><i class="fa fa-plus"></i> Buat
                Baru</button>
            <button type="button" class="btn btn-sm btn-primary" ng-click="getList()"><i class="fa fa-refresh"></i>
                Refresh</button>
            <a id="dlink" style="display:none;"></a>
            <button type="button" class="btn btn-sm btn-primary"
                onclick="tableToExcel('table-destinasi_wisata','data','Data DestinasiWisata')"><i
                    class="fa fa-file-excel-o"></i>
                Excel</button>
        </div>
        <div class="table-responsive">
            <div class="row">
                <table ng-table="tableList" id="table-destinasi_wisata" show-filter="false" class="table table-hover"
                    style="white-space: nowrap;">
                    <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer" ng-click="read(v.id)">
                        <td title="'Id'" filter="{id: 'text'}" sortable="'id'">@{{v.id}}</td>
                        <td title="'Nama Destinasi'" filter="{nama_destinasi_wisata: 'text'}"
                            sortable="'nama_destinasi_wisata'">@{{v.nama_destinasi_wisata}}</td>
                        <td title="'Deskripsi'" filter="{deskripsi: 'text'}" sortable="'deskripsi'">@{{v.deskripsi}}
                        </td>
                        <td title="'Alamat'" filter="{alamat: 'text'}" sortable="'alamat'">@{{v.alamat}}</td>
                        <td title="'Fasilitas'" filter="{fasilitas: 'text'}" sortable="'fasilitas'">@{{v.fasilitas}}
                        </td>
                        <td title="'Kontak Person'" filter="{kontak_person: 'text'}" sortable="'kontak_person'">
                            @{{v.kontak_person}}</td>
                        <td title="'Sosmed'" filter="{sosmed: 'text'}" sortable="'sosmed'">@{{v.sosmed}}</td>
                        <td title="'Kecamatan'" filter="{id_kecamatan: 'text'}" sortable="'id_kecamatan'">
                            @{{v.kecamatan.kecamatan}}</td>
                        <td title="'Desa'" filter="{id_desa: 'text'}" sortable="'id_desa'">@{{v.desa.desa}}</td>
                        <td title="'Keterangan'" filter="{note: 'text'}" sortable="'note'">@{{v.note}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- begin panel -->
<div class="panel panel-inverse" ng-show="f.tab=='frm'">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                    class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Form Destinasi Wisata</h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-sm-4">
                    <label title='id'>Id</label>
                    <input type="text" ng-model="h.id" id="h_id" class="form-control input-sm" readonly maxlength=""
                        ng-readonly="f.crud!='c' || true " placeholder="auto">
                    <label title='nama_destinasi_wisata'>Nama Destinasi</label>
                    <input type="text" ng-model="h.nama_destinasi_wisata" id="h_nama_destinasi_wisata"
                        class="form-control input-sm" required maxlength="255">
                    <label title='deskripsi'>Deskripsi</label>
                    <textarea ng-model="h.deskripsi" id="h_deskripsi" class="form-control input-sm"></textarea>
                    <label title='alamat'>Alamat</label>
                    <textarea ng-model="h.alamat" id="h_alamat" class="form-control input-sm"></textarea>
                </div>
                <div class="col-sm-4">
                    <label title='fasilitas'>Fasilitas</label>
                    <textarea ng-model="h.fasilitas" id="h_fasilitas" class="form-control input-sm"></textarea>
                    <label title='kontak_person'>Kontak Person</label>
                    <input type="text" ng-model="h.kontak_person" id="h_kontak_person" class="form-control input-sm"
                        ng-pattern="/[0-9.,]+/" format="number" maxlength="40">
                    <label title='sosmed'>Sosmed</label>
                    <textarea ng-model="h.sosmed" id="h_sosmed" class="form-control input-sm"></textarea>
                    <label title='id_kecamatan'>Kecamatan</label>
                    <div class="input-group">
                        <input type="text" ng-model="h.kecamatan.kecamatan" class="form-control input-sm" readonly
                            maxlength="">
                        <div class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="button"
                                ng-click="lookup('id_kecamatan','h_id_kecamatan')"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label title='id_desa'>Desa</label>
                    <div class="input-group">
                        <input type="text" ng-model="h.desa.desa" class="form-control input-sm" readonly maxlength="">
                        <div class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="button"
                                ng-click="lookup('id_desa','h_id_desa')"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <label title='note'>Keterangan</label>
                    <textarea ng-model="h.note" id="h_note" class="form-control input-sm"></textarea>
                </div>
                <div class="col-sm-4">
                </div>

            </div>
            <div class="row">
                <br>
                @component('layout.components.upload') @endcomponent
                <br>
                <div class="tumbnail" ng-repeat="v in m">
                    <div class="col-sm-4">
                        <ul class="media-list media-list-with-divider">
                            <li class="media media-lg">
                                <a href="javascript:;" class="pull-left">
                                    <img class="media-object" src="{{url('file')}}/@{{v.name}}" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">@{{v.file_name}}</h4>
                                    {{url('file')}}/@{{v.name}}<br>
                                    Size: @{{v.size}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <br>
                <hr>
                <h4 class="" style="margin:40px 0px 0 20px">Paket Wisata </h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Alamat</th>
                            <th>Kontak Person</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="(k,v) in d" ng-class="v.deleted_at!=null?'terhapus':''">
                            <td>@{{k+1}}</td>
                            <td class="p-0">
                                <input type="text" ng-model="v.nama_paket_wisata"
                                    class="form-control input-sm no-border-text" />
                            </td>
                            <td class="p-0">
                                <input type="text" ng-model="v.deskripsi"
                                    class="form-control input-sm no-border-text" />
                            </td>
                            <td class="p-0">
                                <input type="text" ng-model="v.harga" class="form-control input-sm no-border-text" />
                            </td>
                            <td class="p-0">
                                <input type="text" ng-model="v.alamat" class="form-control input-sm no-border-text" />
                            </td>
                            <td class="p-0">
                                <input type="text" ng-model="v.kontak_person"
                                    class="form-control input-sm no-border-text" />
                            </td>
                            <td class="pointer" ng-click="delD(k)"><i class="fa fa-trash"></i></td>
                            <td class="pointer" ng-click="restoreD(k)"><i class="fa fa-refresh"></i></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm m-l-10" ng-click="addD()">Tambah Baris</button>
            </div>
            <div class="text-right m-t-10">
                <hr>
                <button type="button" class="btn btn-sm btn-info" ng-click="f.tab='list'"><i
                        class="fa fa-arrow-left"></i>
                    Kembali</button>
                <button type="button" class="btn btn-sm btn-primary" ng-click="save()"><i class="fa fa-save"></i>
                    Simpan</button>
                <button type="button" class="btn btn-sm btn-primary" ng-click="copy()" ng-if="f.crud=='u'"><i
                        class="fa fa-copy"></i> Duplikasi</button>
                <button type="button" class="btn btn-sm btn-primary" ng-click="prin()" ng-if="f.crud=='u'"><i
                        class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn btn-sm btn-danger" ng-click="del()" ng-if="f.crud=='u'"><i
                        class="fa fa-trash"></i> Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- end panel -->

</div>
<script>
    app.controller('mainCtrl', ['$scope', '$http', 'NgTableParams', 'SfService', 'FileUploader', function($scope, $http,
    NgTableParams, SfService, FileUploader) {
    SfService.setUrl("{{url('destinasi_wisata')}}");
    $scope.f = {
        crud: 'c',
        tab: 'list',
        pk: 'id',
        q: '',
        userid:''

    };
    $scope.h = {};
    $scope.d = [];
         $scope.m=[];

    var uploader = $scope.uploader = new FileUploader({
    url: "{{url('upload_file')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//harus ada tag <meta content di file layout
    },
    onBeforeUploadItem: function(item) {
    item.formData = [{ route:'destinasi_wisata', id: $scope.h.id, path: 'destinasi_wisata', s: 'i', userid: $scope.f.userid}];
    },
    onSuccessItem: function(fileItem, response, status, headers) {
    //$scope.oGallery();
    swal("",response,"success");
    }
    });

     $scope.oGallery = function(id) {
        SfService.get('upload_list',{route:'destinasi_wisata',id}, function(jdata) {
            console.log(jdata);
        $scope.m = jdata.data.files;
    });
    }

    
    $scope.new = function() {
        $scope.f.tab = 'frm';
        $scope.f.crud = 'c';
        $scope.h = {};
                $scope.m=[];
                $scope.h = {
            tanggal: moment().format('YYYY/MM/DD')
        };
        $scope.d = [];
    }

    $scope.copy = function() {
        $scope.f.crud = 'c';
        $scope.h[$scope.f.pk] = '';
    }

    $scope.getList = function() {
        $scope.tableList = new NgTableParams({}, {
            getData: function($defer, params) {
                var $btn = $('button').button('loading');
                return $http.get(SfService.getUrl('/list'), {
                    params: {
                        page: $scope.tableList.page(),
                        limit: $scope.tableList.count(),
                        order_by: $scope.tableList.orderBy(),
                        q: $scope.f.q
                    }
                }).then(function(jdata) {
                    console.log(jdata);
                    $btn.button('reset');
                    $scope.tableList.total(jdata.data.destinasi_wisata.total);
                    return jdata.data.destinasi_wisata.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
                });

            }
        });
    }

    $scope.save = function() {
        if (SfFormValidate('.frmEntry') == false) {
            swal('', 'Cek kembali data Anda', 'warning');
            return false;
        }

        SfService.post(SfService.getUrl(''), {
            f: $scope.f,
            h: $scope.h,
            d: $scope.d
        }, function(jdata) {
            // console.log(jdata);
            $scope.f.tab = 'list';
            $scope.getList();
        });
    }

    $scope.read = function(id) {
        SfService.get(SfService.getUrl("/" + id), {}, function(jdata) {
            $scope.f.tab = 'frm';
            $scope.f.crud = 'u';
            $scope.h = jdata.data.h;
            $scope.d = jdata.data.d;
                        $scope.oGallery(id);
                    });
    }

    $scope.addD=function(){
    $scope.d.push({});
    console.log($scope.d);
}

$scope.delD=function(k){
    $scope.d[k].deleted_at="{{date('Y-m-d H:i:s')}}";
    console.log($scope.d[k]);
    }
    
    $scope.restoreD=function(k){
        $scope.d[k].deleted_at=null;
        console.log($scope.d[k]);
    }

    $scope.del = function(id) {
        if (id == undefined) {
            var id = $scope.h[$scope.f.pk];
        }

        swal({
                title: "Perhatian",
                text: "Hapus data ini? id=" + id,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya, Hapus!",
                closeOnConfirm: false
            },
            function() {
                SfService.get(SfService.getUrl("/delete/" + id), {}, function(jdata) {
                    $scope.f.tab = 'list';
                    $scope.getList();
                    swal("Berhasil!", "Data berhasil dihapus.", "success");
                });
            });
    }

    $scope.prin = function(id) {
        if (id == undefined) {
            var id = $scope.h[$scope.f.pk];
        }
        window.open(SfService.getUrl('/prin') + "?id=" + encodeURI(id), 'print_' + id,
            'width=950,toolbar=0,resizable=0,scrollbars=yes,height=520,top=100,left=100').focus();
    }

    $scope.lookup = function(id, selector, obj) {
        switch (id) {
            case 'id_kecamatan':
                SfLookup("{{url('/kecamatan/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                 $scope.h.id_kecamatan=id;
                 $scope.h.kecamatan.kecamatan=jsondata.kecamatan;
                 $scope.h.id_desa="";
                 $scope.h.desa.desa="";
                 $scope.$apply();
                });
            break;
            case 'id_desa':
                SfLookup("{{url('/desa/lookup')}}?id_kecamatan="+$scope.h.id_kecamatan, function(id, name, jsondata) {
                    console.log(jsondata);
                 $scope.h.id_desa=id;
                 $scope.h.desa.desa=jsondata.desa;
                 $scope.$apply();
                });
            break;
            default:
            swal('Sorry', 'Under construction', 'error');
            break;
        }
    }

    $scope.moment=function(dt){return moment(dt);}
    $scope.getList();

}]);
</script>

@endsection