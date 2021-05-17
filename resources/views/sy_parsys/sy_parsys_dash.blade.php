@extends('layout.backend')
@section('content')


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Parsys</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">System Parameter <small>set your application magicaly</small></h1>
<!-- end page-header -->

<!-- begin timeline -->
<ul class="timeline">
    {{-- TIMELINE 1 --}}
    <li>
        <div class="timeline-time">
            <span class="date">updated at @{{h.APP_NAME.updated_at|date:'dd/MM/yyyy'|date:'dd/MM/yyyy'}}</span>
            <span class="time">App Name</span>
        </div>
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-laptop"></i></a>
        </div>
        <div class="timeline-body">
            <div class="timeline-header">
                {{-- <span class="userimage"></span> --}}
                <span class="username"><a href="javascript:;"><i class="fa fa-terminal"></i> name: APP_NAME</a>
                    <small></small></span>
                <span class="pull-right text-muted">updated by
                    @{{h.APP_NAME.updated_by}}</span>
            </div>
            <div class="timeline-content">
                <div class="form-group">
                    <p class="small"></p>
                    <input type="text" class="form-control input-sm" ng-model="h.APP_NAME.value" />
                </div>
                <button class="btn btn-success btn-sm" ng-click="saveParsys('APP_NAME')">Simpan</button>
            </div>
            <div class=" timeline-footer">
                <i class="fa fa-warning fa-fw"></i>
                @{{h.APP_NAME.note}}
            </div>
        </div>
    </li>

    {{-- TIMELINE 2 --}}
    <li>
        <div class="timeline-time">
            <span class="date">updated at
                @{{h.APP_DESC.updated_at|date:'dd/MM/yyyy'}}</span>
            <span class="time">App Description</span>
        </div>
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-list-ul"></i></a>
        </div>
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="username"><i class="fa fa-terminal"></i> name: APP_DESC</span>
                <span class="pull-right text-muted">updated by @{{h.APP_DESC.updated_by}}</span>
            </div>
            <div class="timeline-content">
                <div class="timeline-content">
                    <div class="form-group">
                        <p class="small"></p>
                        <input type="text" class="form-control input-sm" ng-model="h.APP_DESC.value" />
                    </div>
                    <button class="btn btn-success btn-sm" ng-click="saveParsys()">Simpan</button>
                </div>
            </div>
            <div class="timeline-footer">
                <i class="fa fa-warning fa-fw"></i>
                @{{h.APP_DESC.note}}
            </div>
        </div>
    </li>
    {{-- TIMELINE 3 --}}
    <li>
        <div class="timeline-time">
            <span class="date">updated at
                @{{h.APP_DESC.updated_at|date:'dd/MM/yyyy'}}</span>
            <span class="time">META Application</span>
        </div>
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-bug"></i></a>
        </div>
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="username"><i class="fa fa-terminal"></i> name: META_DESC, META_AUTHOR, META_KEYWORDS</span>
                <span class="pull-right text-muted">updated by
                    @{{h.APP_DESC.updated_by}}</span>
            </div>
            <div class="timeline-content">
                <div class="timeline-content">
                    <div class="form-group">
                        <p class="small">name: META_DESC</p>
                        <input type="text" class="form-control input-sm" ng-model="h.META_DESC.value"
                            placeholder="deskripsi aplikasi" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: META_AUTHOR</p>
                        <input type="text" class="form-control input-sm" ng-model="h.META_AUTHOR.value"
                            placeholder="author" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: META_KEYWORDS</p>
                        <input type="text" class="form-control input-sm" ng-model="h.META_KEYWORDS.value"
                            placeholder="keyword ditulis dengan separator ','" />
                    </div>
                    <button class="btn btn-success btn-sm" ng-click="saveParsys()">Simpan</button>
                </div>
            </div>
            <div class="timeline-footer">
                <i class="fa fa-warning fa-fw"></i>
                @{{h.META_DESC.note}}
            </div>
        </div>
    </li>
    {{-- TIMELINE 4 --}}
    <li>
        <div class="timeline-time">
            <span class="date">updated at
                @{{h.VISIT_COUNTER.updated_at|date:'dd/MM/yyyy'}}</span>
            <span class="time">Visit Counter</span>
        </div>
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-tachometer"></i></a>
        </div>
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="username"><i class="fa fa-terminal"></i> name: VISIT_COUNTER</span>
                <span class="pull-right text-muted">updated by
                    @{{h.VISIT_COUNTER.updated_by}}</span>
            </div>
            <div class="timeline-content">
                <div class="timeline-content">
                    <div class="form-group">
                        <p class="small"></p>
                        <input type="text" class="form-control input-sm" ng-model="h.VISIT_COUNTER.value" />
                    </div>
                    <button class="btn btn-success btn-sm" ng-click="saveParsys()">Simpan</button>
                </div>
            </div>
            <div class="timeline-footer">
                <i class="fa fa-warning fa-fw"></i>
                @{{h.VISIT_COUNTER.note}}
            </div>
        </div>
    </li>
    <li>

        <!-- begin timeline-time -->
        <div class="timeline-time">
            <span class="date">24 February 2014</span>
            <span class="time">Motivasi</span>
        </div>
        <!-- end timeline-time -->
        <!-- begin timeline-icon -->
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-quote-right"></i></a>
        </div>
        <!-- end timeline-icon -->
        <!-- begin timeline-body -->
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="userimage"><img src="{{url('assets')}}/vendor/seantheme/img/user-6.jpg" alt="" /></span>
                <span class="username">@{{h.MOTTO.note}}</span>
                <span class="pull-right text-muted">1,282 Views</span>
            </div>
            <div class="timeline-content">
                <p class="lead">
                    <i class="fa fa-quote-left fa-fw pull-left"></i>
                    @{{h.MOTTO.value}}
                    <br><i class="fa fa-quote-right fa-fw pull-right"></i>
                </p>
            </div>
            <div class="timeline-footer">
                <a href="javascript:;" class="m-r-15"><i class="fa fa-thumbs-up fa-fw"></i> 142 Likes</a>
                <a href="javascript:;"><i class="fa fa-comments fa-fw"></i> 56 Comments</a>
            </div>
        </div>
        <!-- end timeline-body -->
    </li>
    <li>
        <div class="timeline-time">
            <span class="date">updated at
                @{{h.FB.updated_at|date:'dd/MM/yyyy'}}</span>
            <span class="time">Social Media</span>
        </div>
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="username"><i class="fa fa-terminal"></i> name: FB, WA, TWITTER, IG, YOUTUBE, EMAIL</span>
                <span class="pull-right text-muted">updated by
                    @{{h.FB.updated_by}}</span>
            </div>
            <div class="timeline-content">
                <div class="timeline-content">
                    <div class="form-group">
                        <p class="small">name: FB</p>
                        <input type="text" class="form-control input-sm" ng-model="h.FB.value"
                            placeholder="Link profil/halaman Facebook" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: WA</p>
                        <input type="text" class="form-control input-sm" ng-model="h.WA.value"
                            placeholder="nomor Whatsapp" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: TWITTER</p>
                        <input type="text" class="form-control input-sm" ng-model="h.TWITTER.value"
                            placeholder="link profil Twitter" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: TWITTER</p>
                        <input type="text" class="form-control input-sm" ng-model="h.IG.value"
                            placeholder="link profil Instagram" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: YOUTUBE</p>
                        <input type="text" class="form-control input-sm" ng-model="h.YOUTUBE.value"
                            placeholder="link Channel Youtube" />
                    </div>
                    <div class="form-group">
                        <p class="small">name: EMAIL</p>
                        <input type="text" class="form-control input-sm" ng-model="h.EMAIL.value"
                            placeholder="alamat E-mail" />
                    </div>
                    <button class="btn btn-success btn-sm" ng-click="saveParsys()">Simpan</button>
                </div>
            </div>
            <div class="timeline-footer">
                <i class="fa fa-warning fa-fw"></i>
                @{{h.FB.note}}
            </div>
        </div>
    </li>
    <li>
        <!-- begin timeline-icon -->
        <div class="timeline-icon">
            <a href="javascript:;"><i class="fa fa-gears"></i></a>
        </div>
        <!-- end timeline-icon -->
        <!-- begin timeline-body -->
        <div class="timeline-body">
            <a href="{{url('')}}/sy_parsys" class="btn btn-info"> Set your system parameter manually!</a>
        </div>
        <!-- begin timeline-body -->
    </li>
</ul>
<!-- end timeline -->

<script>
    app.controller('mainCtrl', ['$scope', '$http', 'NgTableParams', 'SfService', 'FileUploader', function($scope, $http,
    NgTableParams, SfService, FileUploader) {
    SfService.setUrl("{{url('sy_parsys')}}");
    $scope.h = {};

$scope.readParsys = function() {
    SfService.get(SfService.getUrl("/show_dash"), {}, function(jdata) {
    $scope.h = jdata.data.h;
    console.log(jdata);
    });
}

$scope.saveParsys = function() {
    SfService.post(SfService.getUrl("/store_dash"), {h:$scope.h}, function(jdata) {
        swal('Berhasil','Lakukan refresh halaman untuk menerapkan.','success');
        $scope.app_name=jdata.data;
    });
    }
        $scope.readParsys();
    }]);
</script>
@endsection