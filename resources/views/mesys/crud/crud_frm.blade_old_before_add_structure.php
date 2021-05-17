@extends('layout.backend')
@section('pagetitle')
<h1 class="page-header">System <small>CRUD Generator v.1</small></h1>
@endsection
@section('toolbar')
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">System</a></li>
    <li class="active">CRUD Generator</li>
</ol>
@stop
@section('content')
<!-- //Subscribe Youtube Channel Peternak Kode on https://youtube.com/c/peternakkode -->
<!doctype html>
<div class="panel panel-inverse">
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
        <h4 class="panel-title">Laravered Generator v.1</h4>
    </div>
    <div class="panel-body">
        <form>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Database</label>
                    <select class="form-control input-sm" ng-model="h.db" ng-change="changeDatabases()" required="">
                        <option ng-repeat="v in dataset.databases" ng-value="v">@{{v}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Table</label>
                    <select class="form-control input-sm" ng-model="h.tbl" ng-change="changeTables()" required="">
                        <option ng-repeat="v in dataset.tables" ng-value="v">@{{v}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">Timestamps <small class="text-success">misal: created_at,
                            updated_at</small></label>
                    <select class="form-control input-sm" ng-model="h.timestamps" required="">
                        <option ng-repeat="v in [['1','Dengan Timestamps'],['0','Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select></div>
                <div class="form-group">
                    <label class="control-label">Soft Deletes <small class="text-success">misal:
                            deleted_at</small></label>
                    <select class="form-control input-sm" ng-model="h.softdeletes" required="">
                        <option ng-repeat="v in [['1','Dengan Softdeletes'],['0','Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select></div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Multiple Upload <small class="text-success"></small></label>
                    <select class="form-control input-sm" ng-model="h.uploads" required="">
                        <option ng-repeat="v in [['1','Dengan Upload'],['0','Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-success m-t-10" ng-click="previewScript()"><i
                            class="fa fa-code"></i>
                        Tulis kode</button>
                </div>
            </div>
        </form>
    </div>
    <div id="wizard">
        <ol>
            <li>
                Routes
                <small id="path-route"></small>
            </li>
            <li>
                Controller
                <small id="path-controller"></small>
            </li>
            <li>
                Model
                <small id="path-model"></small>
            </li>
            <li>
                View
                <small id="path-view"></small>
            </li>
        </ol>
        <!-- begin wizard step-1 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>

                <legend class="pull-left width-full">Route</legend>
                <small id="path-route" class="text-success"></small>
                <!-- begin row -->
                <div class="row" id="script-route">

                </div>
                <div class="row">
                    <hr>
                    <button type="button" class="btn btn-success btn-sm" ng-click="writeScript('route')"><i
                            class="fa fa-flash"></i> Generate Route</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="delFileExist('route')"><i
                            class="fa fa-trash"></i> Hapus File Exist</button>
                </div>
                <!-- end row -->
            </fieldset>
        </div>
        <!-- end wizard step-1 -->
        <!-- begin wizard step-2 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>
                <legend class="pull-left width-full">Controller</legend>
                <!-- begin row -->
                <div class="row" id="script-controller">

                </div>
                <div class="row">
                    <hr>
                    <button type="button" class="btn btn-success btn-sm" ng-click="writeScript('controller')"><i
                            class="fa fa-flash"></i> Generate Controller</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="delFileExist('controller')"><i
                            class="fa fa-trash"></i> Hapus File Exist</button>
                </div>
                <!-- end row -->
            </fieldset>
        </div>
        <!-- end wizard step-2 -->
        <!-- begin wizard step-3 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>
                <legend class="pull-left width-full">Model</legend>
                <!-- begin row -->
                <div class="row" id="script-model">

                </div>
                <div class="row">
                    <hr>
                    <button type="button" class="btn btn-success btn-sm" ng-click="writeScript('model')"><i
                            class="fa fa-flash"></i> Generate Model</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="delFileExist('model')"><i
                            class="fa fa-trash"></i> Hapus File Exist</button>
                </div>
                <!-- end row -->
            </fieldset>
        </div>
        <!-- end wizard step-3 -->
        <!-- begin wizard step-4 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>
                <legend class="pull-left width-full">View</legend>
                <!-- begin row -->
                <div class="row" id="script-view">

                </div>
                <div class="row">
                    <hr>
                    <button type="button" class="btn btn-success btn-sm" ng-click="writeScript('view')"><i
                            class="fa fa-flash"></i> Generate View</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="delFileExist('view')"><i
                            class="fa fa-trash"></i> Hapus File Exist</button>
                </div>
                <!-- end row -->
            </fieldset>
        </div>
        <!-- end wizard step-4 -->
    </div>

</div>
</div>
<!-- end panel -->
</div>
<script>
    $(document).ready(function(){
        FormWizard.init();
    });
</script>
<script>
    app.controller('mainCtrl', ['$scope', '$http', 'NgTableParams', 'SfService', 'FileUploader', function($scope, $http, NgTableParams, SfService, FileUploader) {
    SfService.setUrl("{{url('crud')}}");
    $scope.h = {db:'',tbl:'',timestamps:'',softdeletes:'',uploads:''};
    $scope.dataset={tables:[],databases:[],script:'',tables: [], fields: []};


    $scope.getDatabases = function() {
        SfService.get(SfService.getUrl('/getDatabases'), {h: $scope.h  }, function(jdata) {
            console.log(jdata);
            $scope.dataset.databases = jdata.data.databases;
        });
    }

    $scope.changeDatabases = function() {
        SfService.get(SfService.getUrl('/getTables'), {h: $scope.h  }, function(jdata) {
            $scope.dataset.tables = jdata.data.tables;
        });
    }

      $scope.changeTable = function() {
        SfService.get(SfService.getUrl('/getFields'), { h: $scope.h }, function(jdata) {
            $scope.dataset.fields = jdata.data.fields;
            $scope.h.pk = null;
            $scope.h.ai = 0;
            $scope.h.timestamps = 0;
            angular.forEach($scope.dataset.fields, function(item, i) {
                if (item.COLUMN_KEY == 'PRI') {
                    $scope.h.pk = item.COLUMN_NAME;
                }
                if (item.EXTRA == 'auto_increment') {
                    $scope.h.ai = 1;
                }
                if (item.COLUMN_NAME == 'created_at') {
                    $scope.h.timestamps = 1;
                }
            });
        });
    }

    $scope.previewScript = function(id) {
        console.log($scope.h);
        if($scope.h.db==""||$scope.h.tbl==""||$scope.h.timestamps==""||$scope.h.softdeletes==""||$scope.h.uploads==""){
            swal("","Lengkapi form di atas","warning");
            return false;
        }
        SfService.get(SfService.getUrl("/previewScript"), {h:$scope.h}, function(jdata) {
        //    alert(hdata);
           $("#script-route").html(jdata.data.script_route);
           $("#script-controller").html(jdata.data.script_controller);
           $("#script-model").html(jdata.data.script_model);
           $("#script-view").html(jdata.data.script_view);
           $("#path-route").html(jdata.data.path_route);
           $("#path-controller").html(jdata.data.path_controller);
           $("#path-model").html(jdata.data.path_model);
           $("#path-view").html(jdata.data.path_view);
        });
    }



     $scope.writeScript = function(id) {
         path=$("#path-"+id).html();
         script=$("#script-"+id).html();
        SfService.post(SfService.getUrl("/writeScript"), {h:$scope.h,id:id,path:path,script:script}, function(jdata) {
           swal("",jdata.data.msg,'success');
        });
    }
     $scope.delFileExist = function(id) {
         path=$("#path-"+id).html();
        SfService.get(SfService.getUrl("/delFileExist"), {h:$scope.h,id:id,path:path}, function(jdata) {
           swal("",jdata.data.msg,'success');
        });
    }



    $scope.getDatabases();
    // $scope.getTables();

}]);
</script>


@endsection
