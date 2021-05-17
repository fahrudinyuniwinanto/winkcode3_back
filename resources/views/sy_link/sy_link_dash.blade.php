@extends('layout.backend')
@section('title')Security Access | @{{f.menuSelected[1]}} @stop
@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Setting</a></li>
    <li class="active">Sy Link</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Security Access <small>@{{f.menuSelected[1]}}</small></h1>
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
                        <li ng-repeat="v in f.submenu" ng-click="subMenu(v,$index)" ng-class="{active: v[2]==1}"><a
                                href="#nav-tab-@{{$index+1}}" data-toggle="tab">@{{v[1]}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="nav-tab-1" ng-show="f.menuSelected[0]=='USER-GROUP'">
                    <h3 class="m-t-10" @{{f.menuSelected[1]}}<small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">@{{f.menuSelected[3]}} ID</label>
                            <div class="input-group">
                                <input type="text" ng-model="d.key1" id="d_key1"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup(f.menuSelected[3],'d_key1');">Load</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="text-capitalize">@{{f.menuSelected[3]}} Name</label>
                            <input type="text" ng-model="d.name" id="d_name" class="form-control input-sm" readonly
                                maxlength="">
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.qdash"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getDash();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success" ng-click="getDash();"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive" ng-show="f.menuSelected[5]=='sy_group'">
                        <div class="row">
                            <table ng-table="tableDash_UG" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="set(v.id,v.flag,$index,v)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Group Name'" filter="{name: 'text'}" sortable="'name'">
                                        <strong>@{{v.name}}</strong></td>
                                    <td title="'Keterangan'" filter="{note: 'text'}" sortable="'note'">
                                        <span class="label label-info">@{{v.note}}</span></td>
                                    <td title="'#'" filter="{flag: 'text'}" sortable="'flag'">
                                        <span ng-if="v.flag==1" class="text-success"><i class="fa fa-circle"></i>
                                            Allowed
                                        </span>
                                        <span ng-if="v.flag!=1" class="text-danger"><i class="fa fa-circle"></i> Blocked
                                    </td>
                                    </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="nav-tab-2" ng-show="f.menuSelected[0]=='USER-ACCESS'">
                    <h3 class="m-t-10" @{{f.menuSelected[1]}}<small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">@{{f.menuSelected[3]}} ID</label>
                            <div class="input-group">
                                <input type="text" ng-model="d.key1" id="d_key1"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup(f.menuSelected[3],'d_key1');">Load</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="text-capitalize">@{{f.menuSelected[3]}} Name</label>
                            <input type="text" ng-model="d.name" id="d_name" class="form-control input-sm" readonly
                                maxlength="">
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.qdash"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getDash();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success" ng-click="getDash();"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive" ng-show="f.menuSelected[5]=='sy_access'">
                        <div class="row">
                            <table ng-table="tableDash_UA" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="set(v.id,v.flag,$index,v)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Access Name'" filter="{accessname: 'text'}" sortable="'accessname'">
                                        <strong>@{{v.accessname}}</strong></td>
                                    <td title="'Group'" filter="{accessgroup: 'text'}" sortable="'accessgroup'">
                                        <span ng-show="v.accessgroup=='USER'" class="label label-info">
                                            @{{v.accessgroup}}</span>
                                        <span ng-show="v.accessgroup=='GROUP'" class="label label-success">
                                            @{{v.accessgroup}}</span>
                                    </td>

                                    <td title="'#'" ng-if="v.flag==1" class="text-success"><i class="fa fa-circle"></i>
                                        Allowed
                                    <td title="'#'" ng-if="v.flag!=1" class="text-danger"><i class="fa fa-circle"></i>
                                        Blocked
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="nav-tab-3" ng-show="f.menuSelected[0]=='GROUP-ACCESS'">
                    <h3 class="m-t-10" @{{f.menuSelected[1]}}<small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">@{{f.menuSelected[3]}} ID</label>
                            <div class="input-group">
                                <input type="text" ng-model="d.key1" id="d_key1"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('group','d_key1');">Load</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="text-capitalize">@{{f.menuSelected[3]}} Name</label>
                            <input type="text" ng-model="d.name" id="d_name" class="form-control input-sm" readonly
                                maxlength="">
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.qdash"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getDash();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success" ng-click="getDash();"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableDash_GA" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="set(v.id,v.flag,$index,v)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Access Name'" filter="{accessname: 'text'}" sortable="'accessname'">
                                        <strong>@{{v.accessname}}</strong></td>
                                    <td title="'Group'" filter="{accessgroup: 'text'}" sortable="'accessgroup'">
                                        <span ng-show="v.accessgroup=='USER'" class="label label-info">
                                            @{{v.accessgroup}}</span>
                                        <span ng-show="v.accessgroup=='GROUP'" class="label label-success">
                                            @{{v.accessgroup}}</span>
                                    </td>

                                    <td title="'#'" ng-if="v.flag==1" class="text-success"><i class="fa fa-circle"></i>
                                        Allowed
                                    <td title="'#'" ng-if="v.flag!=1" class="text-danger"><i class="fa fa-circle"></i>
                                        Blocked
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="nav-tab-4" ng-show="f.menuSelected[0]=='GROUP-MENU'">
                    <h3 class="m-t-10" @{{f.menuSelected[1]}}<small></small></h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="text-capitalize ng-binding">@{{f.menuSelected[3]}} ID</label>
                            <div class="input-group">
                                <input type="text" ng-model="d.key1" id="d_key1"
                                    class="form-control input-sm ng-valid ng-valid-maxlength ng-dirty ng-valid-parse ng-empty ng-touched"
                                    readonly="" maxlength="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-block btn-success"
                                        ng-click="lookup('group','d_key1');">Load</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="text-capitalize">@{{f.menuSelected[3]}} Name</label>
                            <input type="text" ng-model="d.name" id="d_name" class="form-control input-sm" readonly
                                maxlength="">
                        </div>

                        <div class="col-sm-2">
                            <label>Cari : </label>
                            <input type="text" ng-model="f.qdash"
                                class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"
                                maxlength="" placeholder="Search" ng-enter="getDash();">
                        </div>
                        <!-- ngIf: f.menuSelected[5]=='syaccess' -->
                        <div class="col-sm-1">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-sm btn-block btn-success" ng-click="getDash();"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="row">
                            <table ng-table="tableDash_GM" id="" show-filter="false" class="table table-hover"
                                style="white-space: nowrap;">
                                <tr ng-repeat="(k,v) in $data|orderBy:'+id'" class="pointer"
                                    ng-click="set(v.id,v.flag,$index,v)">
                                    <td title="'Id'" filter="{id: 'text'}" sortable="'id'">
                                        @{{v.id}}
                                    </td>
                                    <td title="'Label'" filter="{label: 'text'}" sortable="'label'">
                                        @{{v.label}}</td>
                                    <td title="'URL'" filter="{url: 'text'}" sortable="'url'">
                                        <code ng-if='v.url!=""'>@{{v.url}}</code>
                                        <code ng-if='v.url==""'>/</code>
                                    </td>
                                    <td title="'Icon'" filter="{icon: 'text'}" sortable="'icon'">
                                        <i ng-show='@{{v.icon!=""}}' class="fa @{{v.icon}}"></i> @{{v.icon}}</td>
                                    <td ng-if="v.page=='B'" title="'Page'" filter="{page: 'text'}" sortable="'page'">
                                        <span class="label label-info"><i class="fa fa-code"></i> Admin Page</span>
                                    </td>
                                    <td ng-if="v.page=='F'" title="'Page'" filter="{page: 'text'}" sortable="'page'">
                                        <span class="label label-success"><i class="fa fa-laptop"></i> Front Page</span>
                                    </td>
                                    <td ng-if="v.page!='F'&&v.page!='B'" title="'Page'" filter="{page: 'text'}"
                                        sortable="'page'">
                                        <span class="label label-success">SYSTEM</span>
                                    </td>
                                    <td title="'#'" ng-if="v.flag==1" class="text-success"><i class="fa fa-circle"></i>
                                        Allowed
                                    <td title="'#'" ng-if="v.flag!=1" class="text-danger"><i class="fa fa-circle"></i>
                                        Blocked
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
        menuSelected: {},
        crud:'c'
    };
    $scope.h = {};
    $scope.d = {'rel':'USER-GROUP',key1:'',tbl:'',rel:''};

    $scope.f.submenu = [
        ['USER-GROUP', 'User vs Group', 0, 'user', 'users', 'sy_group'],
        ['USER-ACCESS', 'User vs Access', 0, 'user', 'users', 'sy_access'],
        ['GROUP-ACCESS', 'Group vs Access', 0, 'group', 'sy_group', 'sy_access'],
        ['GROUP-MENU', 'Group vs Menu', 0, 'group', 'sy_group', 'sy_menu'],
        ];


        $scope.subMenu = function(v, index) {
            $scope.f.menuSelected = v;
            angular.forEach($scope.f.submenu, function(item, i) {
                $scope.f.submenu[i][2] = 0;
            })
            $scope.f.submenu[index][2] = 1;
            $scope.d = {
                rel: v[0],
                key1: $("#d_key1").val(),
                name: $("#d_name").val(),
                tbl1: v[4],
                tbl2: v[5],
                // tbl3: 'syplant'
            };
            $scope.f.qdash = '';
            $scope.getDash();
            $scope.d.key1="";
            $scope.d.name="";
        }
  
$scope.getDash = function() {

  tbl='tableDash_'+$scope.tableSufix();
    $scope[tbl] = new NgTableParams({}, {
            getData: function($defer, params) {
            var $btn = $('button').button('loading');
            return $http.get(SfService.getUrl("/get_dash"), {
            params: {
                page: $scope[tbl].page(),
                limit: $scope[tbl].count(),
                order_by: $scope[tbl].orderBy(),
                q: $scope.f.qdash,
                d:$scope.d,
            }
            }).then(function(jdata) {
                tellme($scope.d.rel,'Menampilkan data '+$scope.d.rel);
                $btn.button('reset');
                $scope[tbl].total(jdata.data.data.total);
                return jdata.data.data.data;
                }, function(error) {
                    $btn.button('reset');
                    swal('', error.data, 'error');
            });
            }
    });
}

$scope.tableSufix=function(){
    if($scope.d.rel=="USER-GROUP"){
    $sufix="UG";
    }else if($scope.d.rel=="USER-ACCESS"){
    $sufix="UA";
    }else if($scope.d.rel=="GROUP-ACCESS"){
    $sufix="GA";
    }else if($scope.d.rel=="GROUP-MENU"){
    $sufix="GM";
    }
    return $sufix;
}

$scope.set = function(id, flag, index, v) {
    tbl='tableDash_'+$scope.tableSufix();
    if (flag == 1) {
     flag = 0;
    } else {
     flag = 1;
    }
        if ($scope.d.key1 == null || $scope.d.key1 == '') {
        swal('', 'Sorry, ' + $scope.f.menuSelected[3] + ' ID empty.', 'error');
        return false;
        }
       
    $scope.d.key2 = id;
    $scope.d.flag = flag;
    SfService.post(SfService.getUrl("/set"), {
        h: $scope.d,
        f: $scope.f
    }, function(jdata) {
    $scope[tbl].data[index].flag = flag;
    });

}
   
    $scope.lookup = function(id, selector, obj) {
        switch (id) {
            case 'user':
                SfLookup("{{url('/users/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                 $("#" + selector).val(id).trigger('input');
                 $("#d_name").val(name).trigger('input');
                 $scope.getDash();
                });
            break;
             case 'group':
                SfLookup("{{url('/sy_group/lookup')}}", function(id, name, jsondata) {
                    console.log(jsondata);
                 $("#" + selector).val(id).trigger('input');
                $("#d_name").val(name).trigger('input');
                $scope.getDash();
                });
            break;
            default:
            swal('Sorry', 'Under construction', 'error');
            break;
        }
    }

    $scope.turn_access = function(rel,id) {
        SfService.post(SfService.getUrl("/turn_access"), {r:$scope.d,rel:rel,key2:id}, function(jdata) {
            getListUserGroup();
            $scope.$apply();
            tellme("turn access function",'success','');
        });
    }

}]);
</script>
@endsection