@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">Sy Link <small> </small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Dashboard</a></li>
    <li class="active">Sy Link</li>
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
        <h4 class="panel-title">List Sy Link</h4>
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
                onclick="tableToExcel('table-sy_link','data','Data SyLink')"><i class="fa fa-file-excel-o"></i>
                Excel</button>
        </div>
        <div class="table-responsive">
            <table ng-table="tableList" id="table-sy_link" show-filter="false" class="table table-hover"
                style="white-space: nowrap;">
                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer" ng-click="read(v.id)">
                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">@{{v.id}}</td>
                    <td title="'Rel'" filter="{rel: 'text'}" sortable="'rel'">@{{v.rel}}</td>
                    <td title="'Key1'" filter="{key1: 'text'}" sortable="'key1'">@{{v.key1}}</td>
                    <td title="'Key2'" filter="{key2: 'text'}" sortable="'key2'">@{{v.key2}}</td>
                    <td title="'Key3'" filter="{key3: 'text'}" sortable="'key3'">@{{v.key3}}</td>
                    <td title="'Key4'" filter="{key4: 'text'}" sortable="'key4'">@{{v.key4}}</td>
                    <td title="'Key5'" filter="{key5: 'text'}" sortable="'key5'">@{{v.key5}}</td>
                    <td title="'Tbl1'" filter="{tbl1: 'text'}" sortable="'tbl1'">@{{v.tbl1}}</td>
                    <td title="'Tbl2'" filter="{tbl2: 'text'}" sortable="'tbl2'">@{{v.tbl2}}</td>
                    <td title="'Tbl3'" filter="{tbl3: 'text'}" sortable="'tbl3'">@{{v.tbl3}}</td>
                    <td title="'Tbl4'" filter="{tbl4: 'text'}" sortable="'tbl4'">@{{v.tbl4}}</td>
                    <td title="'Tbl5'" filter="{tbl5: 'text'}" sortable="'tbl5'">@{{v.tbl5}}</td>
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
        <h4 class="panel-title">Form Sy Link</h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-sm-4">
                    <label title='id'>Id</label>
                    <input type="text" ng-model="h.id" id="h_id" class="form-control input-sm" readonly maxlength="">
                    <label title='rel'>Rel</label>
                    <input type="text" ng-model="h.rel" id="h_rel" class="form-control input-sm" maxlength="30">
                    <label title='key1'>Key1</label>
                    <input type="text" ng-model="h.key1" id="h_key1" class="form-control input-sm" maxlength="30">
                    <label title='key2'>Key2</label>
                    <input type="text" ng-model="h.key2" id="h_key2" class="form-control input-sm" maxlength="30">
                </div>
                <div class="col-sm-4">
                    <label title='key3'>Key3</label>
                    <input type="text" ng-model="h.key3" id="h_key3" class="form-control input-sm" maxlength="30">
                    <label title='key4'>Key4</label>
                    <input type="text" ng-model="h.key4" id="h_key4" class="form-control input-sm" maxlength="30">
                    <label title='key5'>Key5</label>
                    <input type="text" ng-model="h.key5" id="h_key5" class="form-control input-sm" maxlength="30">
                    <label title='tbl1'>Tbl1</label>
                    <input type="text" ng-model="h.tbl1" id="h_tbl1" class="form-control input-sm" maxlength="30">
                </div>
                <div class="col-sm-4">
                    <label title='tbl2'>Tbl2</label>
                    <input type="text" ng-model="h.tbl2" id="h_tbl2" class="form-control input-sm" maxlength="30">
                    <label title='tbl3'>Tbl3</label>
                    <input type="text" ng-model="h.tbl3" id="h_tbl3" class="form-control input-sm" maxlength="30">
                    <label title='tbl4'>Tbl4</label>
                    <input type="text" ng-model="h.tbl4" id="h_tbl4" class="form-control input-sm" maxlength="30">
                    <label title='tbl5'>Tbl5</label>
                    <input type="text" ng-model="h.tbl5" id="h_tbl5" class="form-control input-sm" maxlength="30">
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
    SfService.setUrl("{{url('sy_link')}}");
    $scope.f = {
        crud: 'c',
        tab: 'list',
        pk: 'id',
        q: ''
    };
    $scope.h = {};

    $scope.new = function() {
        $scope.f.tab = 'frm';
        $scope.f.crud = 'c';
        $scope.h = {};
        $scope.h = {
            tanggal: moment().format('YYYY/MM/DD')
        };
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
                    $scope.tableList.total(jdata.data.sy_link.total);
                    return jdata.data.sy_link.data;
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