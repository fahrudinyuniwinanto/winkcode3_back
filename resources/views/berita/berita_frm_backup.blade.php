@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">Berita <small> </small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Dashboard</a></li>
    <li class="active">Berita</li>
</ol>
@stop
@section('content')

<!-- //Subscribe Youtube Channel Peternak Kode on https://youtube.com/c/peternakkode -->
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
        <h4 class="panel-title">List Berita</h4>
    </div>
    <div class="panel-body">
        <div class="input-group m-b">
            <input type="text" ng-model="f.q" class="form-control input-sm" placeholder="" ng-enter="getList()">
            <span class="input-group-addon pointer btn btn-primary" ng-show="f.q!=''" ng-click="getList();"><i
                    class="fa fa-refresh"></i></span>
            <span class="input-group-addon pointer btn btn-primary" ng-click="getList()"><i class="fa fa-search"></i>
                Cari</span>
        </div>
        <div class="pull-right form-inline">
            <button type="button" class="btn btn-sm btn-primary" ng-click="new()"><i class="fa fa-plus"></i> Buat
                Baru</button>
            <button type="button" class="btn btn-sm btn-primary" ng-click="getList()"><i class="fa fa-refresh"></i>
                Refresh.</button>
        </div>
        <div class="table-responsive">
            <table ng-table="tableList" show-filter="false" class="table table-hover" style="white-space: nowrap;">
                <tr ng-repeat="(k,v) in $data|orderBy:'+id_berita'" class="pointer" ng-click="read(v.id_berita)">
                    <td title="'Id Berita'" filter="{id_berita: 'text'}" sortable="'id_berita'">@{{v.id_berita}}</td>
                    <td title="'Judul'" filter="{judul: 'text'}" sortable="'judul'">@{{v.judul}}</td>
                    <td title="'Isi'" filter="{isi: 'text'}" sortable="'isi'">
                        @{{v.isi | limitTo:50}}@{{v.isi.length>50?'...':''}}</td>
                    <td title="'Deskripsi'" filter="{deskripsi: 'text'}" sortable="'deskripsi'">@{{v.deskripsi}}</td>
                    <td title="'Img'" filter="{img: 'text'}" sortable="'img'">@{{v.img}}</td>
                    <td title="'Note'" filter="{note: 'text'}" sortable="'note'">@{{v.note}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>


<!-- begin panel -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" ng-show="f.tab=='frm'">
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
        <h4 class="panel-title">Form Berita</h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-sm-8">
                    <label title='id_berita'>ID Berita</label>
                    <input type="text" ng-model="h.id_berita" id="h_id_berita" class="form-control input-sm" readonly
                        maxlength="">
                    <label title='isi'>Isi Berita</label>
                    <textarea ng-model="h.isi" id="h_isi" class="form-control input-sm" maxlength="65535"
                        style="height: 300px;"></textarea>
                </div>
                <div class="col-sm-4">
                    <label title='judul'>Judul</label>
                    <input type="text" ng-model="h.judul" id="h_judul" class="form-control input-sm" maxlength="100">

                    <label title='deskripsi'>Sub Judul</label>
                    <input type="text" ng-model="h.deskripsi" id="h_deskripsi" class="form-control input-sm"
                        maxlength="500">

                    <label title='img'>Gambar</label>
                    {{-- @component('layout.components.upload') @endcomponent --}}
                    <br>
                    {{-- <input type="file" ng-model="h.img" id="h_img" class="form-control input-sm" maxlength="200"> --}}
                    <label title='note'>Note</label>
                    <textarea ng-model="h.note" id="h_note" class="form-control input-sm" maxlength="65535"
                        style="height: 100px;"></textarea>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="text-left m-t-10">
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
    SfService.setUrl("{{url('berita')}}");
    $scope.f = {
        crud: 'c',
        tab: 'list',
        pk: 'id_berita',
        q: '',
        userid:'',
    };
    $scope.h = {};

    var uploader = $scope.uploader = new FileUploader({
    url: "{{url('upload_file')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    onBeforeUploadItem: function(item) {
    item.formData = [{ id: $scope.h.id_berita, path: 'berita', s: 'i', userid: $scope.f.userid}];
    },
    onSuccessItem: function(fileItem, response, status, headers) {
    //$scope.oGallery();
    swal("",response,"success");
    }
    });

    $scope.new = function() {
        $scope.f.tab = 'frm';
        $scope.f.crud = 'c';
        $scope.h = {};
        $scope.h = {
            tanggal: moment().format('YYYY/MM/DD')
        };
    }

    $scope.oGallery = function() {
    // SfGetMediaList('berita/' + $scope.h.id, function(jdata) {
    // $scope.m = jdata.files;
    // $scope.$apply();
    // });

    SfService.get(SfService.getUrl("/" + id), {}, function(jdata) {
    $scope.f.tab = 'frm';
    $scope.f.crud = 'u';
    $scope.h = jdata.data.h;
    });
    }

    $scope.copy = function() {
        $scope.f.crud = 'c';
        $scope.h[$scope.f.pk] = '';
    }

    $scope.getList = function() {
        alert('123');
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
                    $scope.tableList.total(jdata.data.berita.total);
                    return jdata.data.berita.data;
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
            h: $scope.h
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
        });
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

    $scope.lookup = function(icase, fn) {
        switch (icase) {
            // case 'id_mustahik':
            //     SfLookup("", function(id,name,json) {
            //         $scope.h.id_mustahik=id;
            //         $scope.h.nm_mustahik=name;
            //         $scope.$apply();
            //     });
            //     break;
            default:
                swal('Pilihan tidak tersedia');
                break;
        }
    }

    $scope.getList();

}]);
</script>

@endsection