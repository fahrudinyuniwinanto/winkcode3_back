@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">Users <small>Deskripsi halaman</small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Dashboard</a></li>
    <li class="active">Users</li>
</ol>
@stop
@section('content')
<!-- //Subscribe Youtube Channel Peternak Kode on https://youtube.com/c/peternakkode -->
<!doctype html>
<div class="panel panel-inverse form-inline" ng-show="f.tab=='list'" id="div1">
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
        <h4 class="panel-title">List Users</h4>
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
        </div>
        <table ng-table="tableList" show-filter="false" class="table table-hover" style="white-space: nowrap;">
            <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer" ng-click="read(v.id)">
                <td title="'ID'" filter="{id: 'text'}" sortable="'id'">@{{v.id}}</td>
                <td title="'Group'" filter="{id_group: 'text'}" sortable="'id_group'">@{{v.group_name}}</td>
                <td title="'Name'" filter="{name: 'text'}" sortable="'name'">@{{v.name}}</td>
                <td title="'Email'" filter="{email: 'text'}" sortable="'email'">@{{v.email}}</td>
                <td title="'Telephone'" filter="{hp: 'text'}" sortable="'hp'">@{{v.hp}}</td>
                <td title="'Gender'" filter="{gender: 'text'}" sortable="'gender'">@{{v.gender}}</td>
                <td title="'Photo'" filter="{img: 'text'}" sortable="'img'">@{{v.img}}</td>
            </tr>
        </table>
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
        <h4 class="panel-title">Form Users</h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-sm-4">
                    <label title='id'>Id</label>
                    <input type="text" ng-model="h.id" id="h_id" class="form-control input-sm" readonly maxlength="">
                    <label title='id_group'>Id Group</label>
                    <input type="text" ng-model="h.id_group" id="h_id_group" class="form-control input-sm"
                        maxlength="255">
                    <label title='name'>Name</label>
                    <input type="text" ng-model="h.name" id="h_name" class="form-control input-sm" maxlength="255">
                    <label title='email'>Email</label>
                    <input type="text" ng-model="h.email" id="h_email" class="form-control input-sm" maxlength="255">
                </div>
                <div class="col-sm-4">
                    <label title='hp'>Hp</label>
                    <input type="text" ng-model="h.hp" id="h_hp" class="form-control input-sm" maxlength="20">
                    <label title='gender'>Gender</label>
                    <input type="text" ng-model="h.gender" id="h_gender" class="form-control input-sm" maxlength="2">
                    <label title='img'>Img</label>
                    <input type="text" ng-model="h.img" id="h_img" class="form-control input-sm" maxlength="255">
                    <label title='email_verified_at'>Email Verified At</label>
                    <input type="text" ng-model="h.email_verified_at" id="h_email_verified_at"
                        class="form-control input-sm" maxlength="">
                </div>
                <div class="col-sm-4">
                    <label title='password'>Password</label>
                    <input type="text" ng-model="h.password" id="h_password" class="form-control input-sm"
                        maxlength="255">
                    <label title='remember_token'>Remember Token</label>
                    <input type="text" ng-model="h.remember_token" id="h_remember_token" class="form-control input-sm"
                        maxlength="100">
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
    SfService.setUrl("{{url('users')}}");
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
                    $scope.tableList.total(jdata.data.users.total);
                    return jdata.data.users.data;
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