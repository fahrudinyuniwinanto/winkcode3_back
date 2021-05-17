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
                    <select class="form-control input-sm" ng-model="h.tbl" ng-change="changeTable()" required="">
                        <option ng-repeat="v in dataset.tables" ng-value="v">@{{v}}</option>
                    </select>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">Timestamps <small class="text-success">misal: created_at,
                            updated_at</small></label>
                    <select class="form-control input-sm" ng-model="h.timestamps" required="">
                        <option ng-repeat="v in [[1,'Dengan Timestamps'],[0,'Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select></div>
                <div class="form-group">
                    <label class="control-label">Soft Deletes <small class="text-success">misal:
                            deleted_at</small></label>
                    <select class="form-control input-sm" ng-model="h.softdeletes" required="">
                        <option ng-repeat="v in [[1,'Dengan Softdeletes'],[0,'Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select></div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Auto increment <small class="text-success"></small></label>
                    <select class="form-control input-sm" ng-model="h.autoincrement" required="">
                        <option ng-repeat="v in [[1,'Ya, auto PK'],[0,'Tidak']]" ng-value="v[0]">
                            @{{v[1]}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Multiple Upload <small class="text-success"></small></label>
                    <select class="form-control input-sm" ng-model="h.uploads" required="">
                        <option ng-repeat="v in [[1,'Dengan Upload'],[0,'Tidak']]" ng-value="v[0]">@{{v[1]}}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-success m-t-10" ng-click="getFields()"><i
                            class="fa fa-code"></i>
                        Generate Struktur</button>

                </div>
            </div>
        </form>
    </div>
    <div id="wizard">
        <ol>
            <li>
                Structure
            </li>
            <li>
                Routes
            </li>
            <li>
                Controller
            </li>
            <li>
                Model
            </li>
            <li>
                Form
            </li>
            <li>
                Security
            </li>
        </ol>
        <!-- begin wizard step-1 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>

                <legend class="pull-left width-full">Structure</legend>

                <small id="path-structure" class="text-success"></small>
                <!-- begin row -->
                <div class="row" id="script-structure">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Primary Key</label>
                            <select ng-model="h.pk" class="form-control input-sm " required>
                                <option ng-repeat="v in dataset.fields" ng-value="v.COLUMN_NAME">@{{v.COLUMN_NAME}}
                                </option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="table-responsive"> --}}
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Field Name</th>
                                <th>Type</th>
                                <th>Caption</th>
                                <th>Element</th>
                                <th>Required</th>
                                <th>Key</th>
                                <th>Extra</th>
                                <th>Default</th>
                                <th>Comment <span class="pointer link text-success"
                                        ng-click="setCommentToCaption()">[Set
                                        Caption]</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="v in dataset.fields">
                                <td class="text-right">@{{$index+1}}</td>
                                <td>@{{v.COLUMN_NAME}}</td>
                                <td>@{{v.COLUMN_TYPE}}</td>
                                <td class="p-0">
                                    <input class="no-border-text form-control input-sm" type="text"
                                        ng-model="v.CAPTION">
                                </td>
                                <td class="p-0">
                                    <select class="no-border-text form-control input-sm" ng-model="v.ELEMENT">
                                        <option
                                            ng-repeat="vi in ['text','text readonly','text number','textarea','date','password','select','select-plus','checkbox','radio','button','lookup','hidden','none']"
                                            ng-value="vi">@{{vi}}</option>
                                    </select>
                                </td>
                                <td class="p-0">
                                    <select class="no-border-text form-control input-sm" ng-model="v.REQUIRED">
                                        <option ng-repeat="vi in ['','required']" ng-value="vi">@{{vi}}</option>
                                    </select>
                                </td>
                                <td>@{{v.COLUMN_KEY}}</td>
                                <td>@{{v.EXTRA}}</td>
                                <td>@{{v.COLUMN_DEFAULT}}</td>
                                <td>@{{v.COLUMN_COMMENT}}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- </div> --}}
                </div>
                <div class="row">
                    <hr>
                    <button type="button" class="btn btn-sm btn-success m-t-10" ng-click="previewScript()"><i
                            class="fa fa-code"></i>
                        Tulis kode</button>
                </div>
                <!-- end row -->
            </fieldset>
        </div><!-- begin wizard step-1 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>

                <legend class="pull-left width-full">Route<br><small id="path-route"
                        class="text-success"></small></small>
                </legend>

                <!-- begin row -->
                <div class="row">
                    <textarea id="script-route" style="width: 100%; height:350px;"
                        disabled>Silakan lengkapi proses pada tab struktur terlebih dahulu</textarea>
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
                <legend class="pull-left width-full">Controller<br><small id="path-controller"
                        class="text-success"></small></legend>
                <!-- begin row -->
                <div class="row">
                    <textarea id="script-controller" style="width: 100%; height:350px;"
                        disabled>Silakan lengkapi proses pada tab struktur terlebih dahulu</textarea>
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
                <legend class="pull-left width-full">Model<br><small id="path-model" class="text-success"></small>
                </legend>
                <!-- begin row -->
                <div class="row">
                    <textarea id="script-model" style="width: 100%; height:350px;"
                        disabled>Silakan lengkapi proses pada tab struktur terlebih dahulu</textarea>
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
                <legend class="pull-left width-full">Form<br><small id="path-view" class="text-success"></small>
                </legend>
                <!-- begin row -->
                <div class="row">
                    <textarea id="script-view" style="width: 100%; height:350px;"
                        disabled>Silakan lengkapi proses pada tab struktur terlebih dahulu</textarea>
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
        <!-- begin wizard step-5 -->
        <div class="m-l-10 m-r-10 well">
            <fieldset>
                <legend class="pull-left width-full">Security<br><small class="text-success">Buat menu dan akses
                        modul</small></legend>
                <div class="row">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#nav-pills-tab-1" data-toggle="tab">Menu</a></li>
                        <li><a href="#nav-pills-tab-2" data-toggle="tab">Access</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="nav-pills-tab-1">
                            <h3 class="m-t-10">Menu</h3>
                            <div class="col-md-8" <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label title='id'>Id</label>
                                        <input type="text" ng-model="m.id" id="m_id" class="form-control input-sm"
                                            readonly maxlength="">
                                        <label title='label'>Label</label>
                                        <input type="text" ng-model="m.label" id="m_label" class="form-control input-sm"
                                            maxlength="30">
                                        <label title='redirect'>Redirect</label>
                                        {{-- <input type="text" ng-model="m.redirect" id="m_redirect" class="form-control input-sm" maxlength=""> --}}
                                        <select ng-model="m.redirect" id="m_redirect" class="form-control input-sm">
                                            <option
                                                ng-repeat="v in [['1','Redirect Link'],['2','Bukan, mengarah ke class']]"
                                                ng-value="v[0]">@{{v[1]}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label title='url'>URL</label>
                                        <input type="text" ng-model="m.url" id="m_url" class="form-control input-sm"
                                            maxlength="100" placeholder="ex: berita (route name)">
                                        <label title='parent'>Parent</label>
                                        <div class="input-group">
                                            <input type="hidden" ng-model="m.parent" id="parent" />
                                            <input type="text" ng-model="m.nm_parent" id="m_parent"
                                                class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                                readonly="" maxlength="">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-block btn-success"
                                                    ng-click="lookup('menu','parent');">Load</button>
                                            </div>
                                        </div>

                                        {{-- <input type="text" ng-model="m.parent" id="m_parent"
                                            class="form-control input-sm" maxlength=""> --}}
                                        <label title='icon'>Icon</label>
                                        <input type="text" ng-model="m.icon" id="m_icon" class="form-control input-sm"
                                            maxlength="30" placeholder="ex: fa fa-flash">
                                    </div>
                                    <div class="col-sm-4">
                                        <label title='order_no'>Order No</label>
                                        <input type="text" ng-model="m.order_no" id="m_order_no"
                                            class="form-control input-sm" maxlength="">
                                        <label title='note'>Note</label>
                                        <input type="text" ng-model="m.note" id="m_note"
                                            class="form-control input-sm numeric" maxlength="100">
                                        <label title='page'>Show on page</label>
                                        {{-- <input type="text" ng-model="m.page" id="m_page" class="form-control input-sm"
                                            maxlength="1"> --}}
                                        <select class="form-control input-sm" ng-model="m.page">
                                            <option ng-repeat="v in [['B','Halaman Admin'],['F','Halaman Depan']]"
                                                ng-value="v[0]">@{{v[1]}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                    </div>

                                </div>

                                <div class="text-right m-t-10">
                                    <hr>
                                    <a href="{{url('sy_menu')}}" target="_blank" class="btn btn-link">Go to Menu
                                        Master</a>
                                    <button type="button" class="btn btn-sm btn-warning" ng-click="m=[]"><i
                                            class="fa fa-refresh"></i>
                                        Clear Form</button>
                                    <button type="button" class="btn btn-sm btn-success" ng-click="createMenu()"><i
                                            class="fa fa-save"></i>
                                        Create Menu</button>

                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-pills-tab-2">
                            <h3 class="m-t-10">Access</h3>
                            <div class="col-md-6" <form class="form-horizontal">
                                <div class="row">
                                    <label title='id'>CRUD Access Group</label>
                                    <select class="form-control input-sm" ng-model="h.accessgroup">
                                        <option ng-repeat="v in ['USER','GROUP']" ng-value="v">@{{v}}</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label title='id'>Create Data</label>
                                        <input type="text" class="form-control input-sm" ng-model="acs.create"
                                            readonly />
                                        <label title='id'>Read Data</label>
                                        <input type="text" class="form-control input-sm" ng-model="acs.read" readonly />

                                    </div>
                                    <div class="col-md-6">
                                        <label title='id'>Update Data</label>
                                        <input type="text" class="form-control input-sm" ng-model="acs.update"
                                            readonly />
                                        <label title='id'>Delete Data</label>
                                        <input type="text" class="form-control input-sm" ng-model="acs.delete"
                                            readonly />

                                    </div>
                                </div>
                                </form>

                                <div class="text-right m-t-10">
                                    <hr>
                                    <a href="{{url('sy_access')}}" target="_blank" class="btn btn-link">Go to Access
                                        Master</a>
                                    <button type="button" class="btn btn-sm btn-success" ng-click="createAccess()"><i
                                            class="fa fa-save"></i>
                                        Create Access</button>
                                    <button type="button" class="btn btn-sm btn-danger" ng-click="deleteAccess()"><i
                                            class="fa fa-save"></i>
                                        Delete Access</button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- begin row -->


                <!-- end row -->
            </fieldset>
        </div>
        <!-- end wizard step-5 -->
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
    $scope.h = {db:'',tbl:'',timestamps:'',softdeletes:'',autoincrement:'',uploads:'',pk:'',accessgroup:'GROUP'};
    $scope.m={};//form menu
    $scope.f={crud:'c'};
    $scope.acs={create:'',read:'',update:'',delete:''};
    $scope.dataset={tables:[],databases:[],script:'',tables: [], fields: [],structure: [],listpk:[]};

    
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
        SfService.post(SfService.getUrl('/getFields'), { h: $scope.h }, function(jdata) {
            console.log(jdata);
            $scope.h.timestamps=1;
            $scope.h.softdeletes=1;
            $scope.h.autoincrement=1;
            $scope.h.uploads=1;
            // $scope.dataset.fields = jdata.data.fields;
            
        });
    }

    $scope.getFields = function() {
        SfService.post(SfService.getUrl('/getFields'), { h: $scope.h,dataset:$scope.dataset }, function(jdata) {
            console.log(jdata);
            $scope.dataset.fields = jdata.data.fields;
            $scope.h.pk = jdata.data.pk;
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
        // console.log($scope.h);
        if($scope.h.db==""||$scope.h.tbl==""||$scope.h.timestamps==""||$scope.h.softdeletes==""||$scope.h.uploads==""){
            swal("","Lengkapi form di atas","warning");
            return false;
        }
        SfService.post(SfService.getUrl("/previewScript"), {h:$scope.h,dataset:$scope.dataset}, function(jdata) {
            console.log(jdata);
        //    alert(hdata);
           $("#script-route").html(jdata.data.script_route);
           $("#script-controller").html(jdata.data.script_controller);
           $("#script-model").html(jdata.data.script_model);
           $("#script-view").html(jdata.data.script_view);
           $("#path-route").html(jdata.data.path_route);
           $("#path-controller").html(jdata.data.path_controller);
           $("#path-model").html(jdata.data.path_model);
           $("#path-view").html(jdata.data.path_view);
           $scope.acs=jdata.data.acs;
           $scope.m=jdata.data.menu;
           swal("Berhasil Menulis Skrip",jdata.data.msg,'success');
        });
    }

 
        $scope.createAccess = function() {
            SfService.post(SfService.getUrl("/createAccess"), {h:$scope.h}, function(jdata) {
                swal("",jdata.data.msg,'success');
            });
        }

        $scope.deleteAccess = function() {
            swal('Oops...','Maintenance','warning');
            // SfService.post(SfService.getUrl("/deleteAccess"), {h:$scope.acs}, function(jdata) {
            //     swal("",jdata.data.msg,'success');
            // });
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

    $scope.createMenu=function(){
        SfService.post("{{url('sy_menu')}}",{h:$scope.m,f:$scope.f},function(jdata){
            swal('Berhasil','Menu berhasil ditambahkan','success');
        });
    }

$scope.lookup = function(id, selector, obj) {
    switch (id) {
    case 'menu':
    SfLookup("{{url('/sy_menu/lookup')}}", function(id, name, jsondata) {
            console.log(jsondata);
            $("#" + selector).val(id).trigger('input');
            $("#m_"+selector).val(name).trigger('input');
            $scope.m.parent=id;
    });
    break;
    
    default:
    swal('Sorry', 'Under construction', 'error');
    break;
    }
    }

  

    $scope.getDatabases();

}]);
</script>


@endsection