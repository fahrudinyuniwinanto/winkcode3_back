@extends('layout.backend')
@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Setting</a></li>
    <li class="active">Sy Link</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Security Access <small>set all privillege here...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">

    <!-- begin col-9 -->
    <div class="col-md-9">
        <!-- begin panel -->
        <div class="panel panel-inverse panel-with-tabs">
            <div class="panel-heading p-0">
                <div class="panel-heading-btn m-r-10 m-t-10">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                        data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <!-- begin nav-tabs -->
                <div class="tab-overflow">
                    <ul class="nav nav-tabs nav-tabs-inverse">
                        <li class="prev-button"><a href="javascript:;" data-click="prev-tab" class="text-success"><i
                                    class="fa fa-arrow-left"></i></a></li>
                        <li ng-click="getListUserGroup()" class="active"><a href="#nav-tab-1" data-toggle="tab">User vs
                                Group</a></li>
                        <li ng-click="getListUserAccess()" class=""><a href="#nav-tab-2" data-toggle="tab">User
                                vs
                                Access</a></li>
                        <li ng-click="getListGroupAccess()" class=""><a href="#nav-tab-3" data-toggle="tab">Group vs
                                Access</a></li>
                        <li ng-click="getListGroupMenu()" class=""><a href="#nav-tab-4" data-toggle="tab">Group vs
                                Menu</a></li>
                        <li class="next-button"><a href="javascript:;" data-click="next-tab" class="text-success"><i
                                    class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="nav-tab-1">
                    <h3 class="m-t-10">User vs Group <small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">user Name</label>
                            <div class="input-group">
                                <input type="text" ng-model="r.users_ug" id="r_users_ug"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('users_ug','r_users_ug');">Load</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.q_ug"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getListUserGroup();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success"
                                ng-click="getListUserGroup();"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableUserGroup" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="turn_access('USER-GROUP',v.id)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Group Name'" filter="{name: 'text'}" sortable="'name'">
                                        @{{v.name}}</td>
                                    <td title="'Keterangan'" filter="{note: 'text'}" sortable="'note'">
                                        @{{v.note}}</td>
                                    <td title="'#'" class="text-danger"><i class="fa fa-circle"></i>
                                        @{{v.flag==1?"Allowed":"Denied"}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tab-2">
                    <h3 class="m-t-10">User vs Access <small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">user Name</label>
                            <div class="input-group">
                                <input type="text" ng-model="r.users_ua" id="r_users_ua"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('users_ua','r_users_ua');">Load</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.q_ua"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getListUserAccess();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success"
                                ng-click="getListUserAccess();"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableUserAccess" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="turn_access('USER-ACCESS',v.id)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Access Name'" filter="{accessname: 'text'}" sortable="'accessname'">
                                        @{{v.accessname}}</td>
                                    <td title="'Group'" filter="{accessgroup: 'text'}" sortable="'accessgroup'">
                                        @{{v.accessgroup}}</td>
                                    <td title="'#'" class="text-danger"><i class="fa fa-circle"></i> @{{'Allowed'}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tab-3">
                    <h3 class="m-t-10">Group vs Access <small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">Group name</label>
                            <div class="input-group">
                                <input type="text" ng-model="r.users_ga" id="r_users_ga"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('users_ga','r_users_ga');">Load</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.q_ga"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getListGroupAccess();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success"
                                ng-click="getListGroupAccess();"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableGroupAccess" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="turn_access('GROUP-ACCESS',v.id)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Access Name'" filter="{accessname: 'text'}" sortable="'accessname'">
                                        @{{v.accessname}}</td>
                                    <td title="'Group'" filter="{accessgroup: 'text'}" sortable="'accessgroup'">
                                        @{{v.accessgroup}}</td>
                                    <td title="'#'" class="text-danger"><i class="fa fa-circle"></i> @{{'Allowed'}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tab-4">
                    <h3 class="m-t-10">Group vs Menu <small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">Group Name</label>
                            <div class="input-group">
                                <input type="text" ng-model="r.users_gm" id="r_users_gm"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('users_gm','r_users_gm');">Load</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.q_gm"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getListGroupMenu();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success"
                                ng-click="getListGroupMenu();"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableGroupMenu" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="turn_access('GROUP-MENU',v.id)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Label'" filter="{label: 'text'}" sortable="'label'">
                                        @{{v.label}}</td>
                                    <td title="'URL'" filter="{url: 'text'}" sortable="'url'">
                                        @{{v.url}}</td>
                                    <td title="'Parent'" filter="{parent: 'text'}" sortable="'parent'">
                                        @{{v.parent}}</td>
                                    <td title="'Halaman'" filter="{page: 'text'}" sortable="'page'">
                                        @{{v.page}}</td>
                                    <td title="'#'" class="text-danger"><i class="fa fa-circle"></i> @{{'Allowed'}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end panel -->

    </div>
    <!-- end col-9 -->
    <!-- begin col-3 -->
    <div class="col-md-3">
        <div class="m-b-10 text-inverse f-s-10"><b>MAIN FEATURES</b></div>
        <table class="text-inverse m-b-20 width-full">
            <tr>
                <td>
                    <i class="fa fa-laptop fa-2x pull-left fa-fw"></i>
                    <div class="m-t-4">Responsive in any screen size</div>
                </td>
            </tr>
            <tr>
                <td class="p-t-10">
                    <i class="fa fa-crosshairs fa-2x pull-left fa-fw"></i>
                    <div class="m-t-4">Autofocus on Active Tabs</div>
                </td>
            </tr>
            <tr>
                <td class="p-t-10">
                    <i class="fa fa-expand fa-2x pull-left fa-fw"></i>
                    <div class="m-t-4">Support Expand Features</div>
                </td>
            </tr>
            <tr>
                <td class="p-t-10">
                    <i class="fa fa-wrench fa-2x pull-left fa-fw"></i>
                    <div class="m-t-4">Auto Show / Hide Next & Prev Button</div>
                </td>
            </tr>
        </table>
        <div class="alert alert-warning">
            <i class="fa fa-info-circle fa-lg m-r-5 pull-left m-t-2"></i> Unlimited Navigation Tabs is <b
                class="text-inverse">not compatible</b> with the bootstrap dropdown menu.
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
<script>
    app.controller('mainCtrl', ['$scope', '$http', 'NgTableParams', 'SfService', 'FileUploader', function($scope, $http,
    NgTableParams, SfService, FileUploader) {
    SfService.setUrl("{{url('sy_link')}}");
    $scope.f = {
        userid:'',
    };
    $scope.r = {key1:'',tbl:'',rel:''};
    $scope.h = {};
  

    $scope.getListUserGroup = function() {  
        $scope.tableUserGroup = new NgTableParams({}, {
            getData: function($defer, params) {
                var $btn = $('button').button('loading');
                return $http.get("{{url('sy_link/get_dash')}}", {
                    params: {
                        page: $scope.tableUserGroup.page(),
                        limit: $scope.tableUserGroup.count(),
                        order_by: $scope.tableUserGroup.orderBy(),
                        q: $scope.f.q_ug,
                        d:{key1:$scope.r.key1,tbl:'sy_group'},
                    }
                }).then(function(jdata) {
                    console.log(jdata);
                    $btn.button('reset');
                    $scope.tableUserGroup.total(jdata.data.data.total);
                    return jdata.data.data.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
                });

            }
        });
    }

    $scope.getListUserAccess = function() {
        $scope.tableUserAccess = new NgTableParams({}, {
            getData: function($defer, params) {
                var $btn = $('button').button('loading');
                return $http.get("{{url('sy_access/list')}}", {
                    params: {
                        page: $scope.tableUserAccess.page(),
                        limit: $scope.tableUserAccess.count(),
                        order_by: $scope.tableUserAccess.orderBy(),
                        q: $scope.f.q_ua
                    }
                }).then(function(jdata) {
                    console.log(jdata);
                    $btn.button('reset');
                    $scope.tableUserAccess.total(jdata.data.sy_access.total);
                    return jdata.data.sy_access.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
                });

            }
        });
    }

    $scope.getListGroupAccess = function() {
        $scope.tableGroupAccess = new NgTableParams({}, {
            getData: function($defer, params) {
                var $btn = $('button').button('loading');
                return $http.get("{{url('sy_access/list')}}", {
                    params: {
                        page: $scope.tableGroupAccess.page(),
                        limit: $scope.tableGroupAccess.count(),
                        order_by: $scope.tableGroupAccess.orderBy(),
                        q: $scope.f.q_ga
                    }
                }).then(function(jdata) {
                    console.log(jdata);
                    $btn.button('reset');
                    $scope.tableGroupAccess.total(jdata.data.sy_access.total);
                    return jdata.data.sy_access.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
                });

            }
        });
    }

    $scope.getListGroupMenu = function() {
        $scope.tableGroupMenu = new NgTableParams({}, {
            getData: function($defer, params) {
                var $btn = $('button').button('loading');
                return $http.get("{{url('sy_menu/list')}}", {
                    params: {
                        page: $scope.tableGroupMenu.page(),
                        limit: $scope.tableGroupMenu.count(),
                        order_by: $scope.tableGroupMenu.orderBy(),
                        q: $scope.f.q_gm
                    }
                }).then(function(jdata) {
                    console.log(jdata);
                    $btn.button('reset');
                    $scope.tableGroupMenu.total(jdata.data.sy_menu.total);
                    return jdata.data.sy_menu.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
                });

            }
        });
    }

    $scope.lookup = function(id, selector, obj) {
        switch (id) {
            case 'users_ug':
                SfLookup("{{url('/users/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                  $scope.r.users_ug=jsondata.username+' '+jsondata.email;
                  $scope.r.key1=jsondata.id;
                  $scope.$apply();
                });
            break;
             case 'users_ua':
                SfLookup("{{url('/users/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                  $scope.r.users_ua=jsondata.username+' '+jsondata.email;
                  $scope.r.key1=jsondata.id;
                  $scope.$apply();
                });
            break;
             case 'users_ga':
                SfLookup("{{url('/sy_group/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                  $scope.r.users_ga=jsondata.name;
                  $scope.r.key1=jsondata.id;
                  $scope.$apply();
                });
            break;
             case 'users_gm':
                SfLookup("{{url('/sy_group/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                  $scope.r.users_gm=jsondata.name;
                  $scope.r.key1=jsondata.id;
                  $scope.$apply();
                });
            break;
            default:
            swal('Sorry', 'Under construction', 'error');
            break;
        }
    }

    $scope.turn_access = function(rel,id) {
        SfService.post(SfService.getUrl("/turn_access"), {r:$scope.r,rel:rel,key2:id}, function(jdata) {
            getListUserGroup();
            $scope.$apply();
            tellme("turn access function",'success','');
        });
    }


    $scope.getListUserGroup();

}]);
</script>
@endsection