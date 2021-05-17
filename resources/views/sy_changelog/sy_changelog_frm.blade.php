@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">Sy Changelog <small> </small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Sy Changelog</li>
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
        <h4 class="panel-title">List Sy Changelog</h4>
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
                onclick="tableToExcel('table-sy_changelog','data','Data SyChangelog')"><i class="fa fa-file-excel-o"></i>
                Excel</button>
        </div>
        <div class="table-responsive">
            <div class="row">
        <table ng-table="tableList" id="table-sy_changelog" show-filter="false" class="table table-hover" style="white-space: nowrap;">
            <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer" ng-click="read(v.id)">
                                                <td title="'ID'" filter="{id: 'text'}" sortable="'id'">@{{v.id}}</td>
                                                                <td title="'Label Changelog'" filter="{label: 'text'}" sortable="'label'">@{{v.label}}</td>
                                                                <td title="'Group'" filter="{group: 'text'}" sortable="'group'">@{{v.group}}</td>
                                                                <td title="'Icon'" filter="{icon: 'text'}" sortable="'icon'">@{{v.icon}}</td>
                                                                <td title="'Link'" filter="{link: 'text'}" sortable="'link'">@{{v.link}}</td>
                                                                <td title="'Status'" filter="{status: 'text'}" sortable="'status'">@{{v.status}}</td>
                                                                <td title="'Version'" filter="{version: 'text'}" sortable="'version'">@{{v.version}}</td>
                                                                <td title="'Keterangan'" filter="{note: 'text'}" sortable="'note'">@{{v.note}}</td>
                                                                <td title="'Tanggal Log Dikerjakan'" filter="{changed_at: 'text'}" sortable="'changed_at'">@{{v.changed_at}}</td>
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
        <h4 class="panel-title">Form Sy Changelog</h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                                                <div class="col-sm-4">
                        <label title='id'>ID</label>
                        <input type="text" ng-model="h.id" id="h_id" class="form-control input-sm"  readonly  maxlength=""   ng-readonly="f.crud!='c' || true " placeholder="auto">
                        <label title='label'>Label Changelog</label>
                        <input type="text" ng-model="h.label" id="h_label" class="form-control input-sm"    maxlength="200"  >
                        <label title='group'>Group</label>
                        <select ng-model="h.group" id="h_group" class="form-control input-sm" >
                            <option ng-repeat="v in [['1','Option 1'],['2','Option 2']]" ng-value="v[0]">@{{v[1]}}</option>
                        </select>
                    </div>
                                <div class="col-sm-4">
                        <label title='icon'>Icon</label>
                        <input type="text" ng-model="h.icon" id="h_icon" class="form-control input-sm"    maxlength="500"  >
                        <label title='link'>Link</label>
                        <input type="text" ng-model="h.link" id="h_link" class="form-control input-sm"    maxlength="500"  >
                        <label title='status'>Status</label>
                        <select ng-model="h.status" id="h_status" class="form-control input-sm" >
                            <option ng-repeat="v in [['1','Option 1'],['2','Option 2']]" ng-value="v[0]">@{{v[1]}}</option>
                        </select>
                    </div>
                                <div class="col-sm-4">
                        <label title='version'>Version</label>
                        <input type="text" ng-model="h.version" id="h_version" class="form-control input-sm"    maxlength="10"  >
                        <label title='note'>Keterangan</label>
                        <textarea ng-model="h.note" id="h_note" class="form-control input-sm"   ></textarea>
                        <label title='changed_at'>Tanggal Log Dikerjakan</label>
                        <input type="text" ng-model="h.changed_at" id="h_changed_at" class="form-control input-sm"    maxlength=""  >
                    </div>
                                <div class="col-sm-4">
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
    SfService.setUrl("{{url('sy_changelog')}}");
    $scope.f = {
        crud: 'c',
        tab: 'list',
        pk: 'id',
        q: '',
        userid:''

    };
    $scope.h = {};
         $scope.m=[];

    var uploader = $scope.uploader = new FileUploader({
    url: "{{url('upload_file')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//harus ada tag <meta content di file layout
    },
    onBeforeUploadItem: function(item) {
    item.formData = [{ route:'sy_changelog', id: $scope.h.id, path: 'sy_changelog', s: 'i', userid: $scope.f.userid}];
    },
    onSuccessItem: function(fileItem, response, status, headers) {
    //$scope.oGallery();
    swal("",response,"success");
    }
    });

     $scope.oGallery = function(id) {
        SfService.get('upload_list',{route:'sy_changelog',id}, function(jdata) {
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
                    $scope.tableList.total(jdata.data.sy_changelog.total);
                    return jdata.data.sy_changelog.data;
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
                        $scope.oGallery(id);
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

    $scope.lookup = function(id, selector, obj) {
        switch (id) {
            // case 'user':
            //     SfLookup("{{url('/users/lookup')}}", function(id, name, jsondata) {
            //         console.log(jsondata);
            //      $("#" + selector).val(id).trigger('input');
            //      $("#d_name").val(name).trigger('input');
            //     });
            // break;
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