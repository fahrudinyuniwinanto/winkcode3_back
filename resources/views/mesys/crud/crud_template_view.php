@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header"><?=$h->pageTitle?> <small><?=@$h->pageDesc?> </small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active"><?=$h->pageTitle?></li>
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
        <h4 class="panel-title">List <?=$h->pageTitle?></h4>
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
                onclick="tableToExcel('table-<?=$h->tblLower?>','data','Data <?=$h->tblUper?>')"><i class="fa fa-file-excel-o"></i>
                Excel</button>
        </div>
        <div class="table-responsive">
            <div class="row">
        <table ng-table="tableList" id="table-<?=$h->tblLower?>" show-filter="false" class="table table-hover" style="white-space: nowrap;">
            <tr ng-repeat="(k,v) in $data|orderBy:'+<?=$h->pk?>'" class="pointer" ng-click="read(v.<?=$h->pk?>)">
                <?php foreach ($dataFields as $k => $v): ?>
                <?php if (!in_array($v->COLUMN_NAME, ['created_by', 'updated_by', 'updated_at', 'created_at', 'deleted_at', 'trash', 'isaktif', 'text', 'int'])): ?>
                <td title="'<?=$v->CAPTION?>'" filter="{<?=$v->COLUMN_NAME?>: 'text'}" sortable="'<?=$v->COLUMN_NAME?>'">@{{v.<?=$v->COLUMN_NAME?>}}</td>
                <?php endif?>
                <?php endforeach?>
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
        <h4 class="panel-title">Form <?=$h->pageTitle?></h4>
    </div>
    <div class="panel-body frmEntry">
        <form class="form-horizontal">
            <div class="row">
                <?php
$count_element = 0;
foreach ($dataFields as $k => $v) {
    if ($v->ELEMENT != 'none') {
        $count_element++;
    }
}
$chunkrows = ceil($count_element / 3);
$chunk     = array_chunk($dataFields, $chunkrows);
?>
                <?php foreach ($chunk as $key => $value): ?>
                <div class="col-sm-4">
<?php foreach ($value as $k => $v): ?>
<?php if ($v->COLUMN_NAME == $h->pk):
    $pkattr = " ng-readonly=\"f.crud!='c' " . ($h->ai == 1 ? '|| true' : '') . " \" " . ($h->ai == 1 ? 'placeholder="auto"' : '') . "";
else:
    $pkattr = "";
endif
?>
<?php if (in_array($v->ELEMENT, ['select'])): ?>
                        <label title='<?=$v->COLUMN_NAME?>'><?=$v->CAPTION?></label>
                        <select ng-model="h.<?=$v->COLUMN_NAME?>" id="h_<?=$v->COLUMN_NAME?>" class="form-control input-sm" <?=$v->REQUIRED?>>
                            <option ng-repeat="v in [['1','Option 1'],['2','Option 2']]" ng-value="v[0]">@{{v[1]}}</option>
                        </select>
<?php elseif (in_array($v->ELEMENT, ['select-plus'])): ?>
                        <label title='<?=$v->COLUMN_NAME?>'><?=$v->CAPTION?></label>
                        <div class="input-group">
                            <select ng-model="h.<?=$v->COLUMN_NAME?>" id="h_<?=$v->COLUMN_NAME?>" class="form-control input-sm" <?=$v->REQUIRED?>>
                                <option ng-repeat="v in [['1','Option 1'],['2','Option 2']]" ng-value="v[0]">@{{v[1]}}</option>
                            </select>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-default" ng-click="addCombo('<?=$v->COLUMN_NAME?>')"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
<?php elseif (in_array($v->ELEMENT, ['textarea'])): ?>
                        <label title='<?=$v->COLUMN_NAME?>'><?=$v->CAPTION?></label>
                        <textarea ng-model="h.<?=$v->COLUMN_NAME?>" id="h_<?=$v->COLUMN_NAME?>" class="form-control input-sm" <?=$v->REQUIRED?>  <?=$pkattr?>></textarea>
<?php elseif (in_array($v->ELEMENT, ['lookup'])): ?>
                        <label title='<?=$v->COLUMN_NAME?>'><?=$v->CAPTION?></label>
                        <div class="input-group">
                            <input type="text" ng-model="h.<?=$v->COLUMN_NAME?>" id="h_<?=$v->COLUMN_NAME?>" class="form-control input-sm" <?=$v->REQUIRED?> readonly maxlength="<?=$v->CHARACTER_MAXIMUM_LENGTH?>"  <?=$pkattr?>>
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-sm" type="button" ng-click="lookup('<?=$v->COLUMN_NAME?>','h_<?=$v->COLUMN_NAME?>')"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
<?php elseif (in_array($v->ELEMENT, ['none'])): ?>
<?php else: ?>
                        <label title='<?=$v->COLUMN_NAME?>'><?=$v->CAPTION?></label>
                        <input type="<?=@explode(' ', $v->ELEMENT)[0]?>" ng-model="h.<?=$v->COLUMN_NAME?>" id="h_<?=$v->COLUMN_NAME?>" class="form-control input-sm" <?=$v->REQUIRED?> <?=$v->ELEMENT == 'text readonly' ? 'readonly' : ''?> <?=$v->ELEMENT == 'text number' ? 'ng-pattern="/[0-9.,]+/" format="number"' : ''?> maxlength="<?=$v->CHARACTER_MAXIMUM_LENGTH?>"  <?=$pkattr?>>
<?php endif?>
<?php endforeach?>
                    </div>
                <?php endforeach?>

            </div>
            <?php if ($h->uploads == 1): ?>
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
                    <?php endif?>
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
    SfService.setUrl("{{url('<?=$h->tblLower?>')}}");
    $scope.f = {
        crud: 'c',
        tab: 'list',
        pk: '<?=$h->pk?>',
        q: '',
        userid:''

    };
    $scope.h = {};
    <?php if ($h->uploads == 1): ?>
     $scope.m=[];

    var uploader = $scope.uploader = new FileUploader({
    url: "{{url('upload_file')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//harus ada tag <meta content di file layout
    },
    onBeforeUploadItem: function(item) {
    item.formData = [{ route:'<?=$h->tblLower?>', id: $scope.h.<?=$h->pk?>, path: '<?=$h->tblLower?>', s: 'i', userid: $scope.f.userid}];
    },
    onSuccessItem: function(fileItem, response, status, headers) {
    //$scope.oGallery();
    swal("",response,"success");
    }
    });

     $scope.oGallery = function(id) {
        SfService.get('upload_list',{route:'<?=$h->tblLower?>',id}, function(jdata) {
            console.log(jdata);
        $scope.m = jdata.data.files;
    });
    }

    <?php endif?>

    $scope.new = function() {
        $scope.f.tab = 'frm';
        $scope.f.crud = 'c';
        $scope.h = {};
        <?php if ($h->uploads == 1): ?>
        $scope.m=[];
        <?php endif?>
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
                    $scope.tableList.total(jdata.data.<?=$h->tblLower?>.total);
                    return jdata.data.<?=$h->tblLower?>.data;
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
            <?php if ($h->uploads == 1): ?>
            $scope.oGallery(id);
            <?php endif?>
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