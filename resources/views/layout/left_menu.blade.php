<ul class="nav">
    <li class="nav-header">Application</li>

    <?php $dtMenu = Me::getMenu()?>
    {{-- @dd($dtMenu) --}}
    <?php foreach ($dtMenu as $k1 => $v1): ?>
    <?php if ($v1->rel_symenu->count() == 0): ?>
    <li><a href="{{url(@$v1->url==''?'#':@$v1->url)}}"><i class="{{@$v1->icon}}"></i> <span>{{@$v1->label}}</span>&nbsp;
            @if ($v1->note!="")
            <span class="label label-theme m-l-5">{{$v1->note}}</span>
            @endif
        </a></li>
    <?php else: ?>
    <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="{{$v1->icon==''?'fa fa-suitcase':$v1->icon}}"></i>
            <span>{{$v1->label}}</span>&nbsp;
            @if ($v1->note!="")
            <span class="label label-theme m-l-5">{{$v1->note}}</span>
            @endif
        </a>
        <ul class="sub-menu">
            <?php foreach ($v1->rel_symenu as $k2 => $v2): ?>
            <?php if ($v2->rel_symenu->count() == 0): ?>
            <li><a href="{{url(@$v2->url==''?'#':@$v2->url)}}">{{@$v2->label}}</a></li>
            <?php else: ?>
            <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>
                    <span>{{$v2->label}}</span></a>
                <ul class="sub-menu">

                    <?php foreach ($v2->rel_symenu as $k3 => $v3): ?>
                    <?php if ($v3->rel_symenu->count() == 0): ?>
                    <li><a href="{{url(@$v3->url==''?'#':@$v3->url)}}">{{@$v3->label}}</a></li>
                    <?php else: ?>
                    <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>
                            <span>{{$v3->label}}</span></a>
                        <ul class="sub-menu">

                            <?php foreach ($v3->rel_symenu as $k4 => $v4): ?>
                            <?php if ($v4->rel_symenu->count() == 0): ?>
                            <li><a href="{{url(@$v4->url==''?'#':@$v4->url)}}">{{@$v4->label}}</a></li>
                            <?php else: ?>
                            <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>
                                    <span>{{$v4->label}}</span></a>
                                <ul class="sub-menu">

                                    <?php foreach ($v4->rel_symenu as $k5 => $v5): ?>
                                    <?php if ($v5->rel_symenu->count() == 0): ?>
                                    <li><a href="{{url(@$v5->url==''?'#':@$v5->url)}}">{{@$v5->label}}</a></li>
                                    <?php else: ?>
                                    <li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>
                                            <span>{{$v5->label}}</span></a>
                                        <ul class="sub-menu">


                                        </ul>
                                    </li>
                                    <?php endif?>
                                    <?php endforeach?>

                                </ul>
                            </li>
                            <?php endif?>
                            <?php endforeach?>


                        </ul>
                    </li>
                    <?php endif?>
                    <?php endforeach?>


                </ul>
            </li>
            <?php endif?>
            <?php endforeach?>
        </ul>
    </li>
    <?php endif?>
    <?php endforeach?>

    {{-- <li class="has-sub">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-user"></i>
            <span>Pengguna</span>
        </a>
        <ul class="sub-menu">
            <li class=""><a href="{{url('users')}}">Pengguna</a></li>
    <li class=""><a href="{{url('sy_group')}}">Grup Pengguna</a></li>
    <li class=""><a href="{{url('sy_access')}}">Master Access</a></li>
    <li class=""><a href="{{url('sy_link')}}">Group Access</a></li>
</ul>
</li>
<li class="nav-header">Settings</li>
<li class="has-sub">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-gears"></i>
        <span>Pengaturan</span>
    </a>
    <ul class="sub-menu">
        <li class=""><a href="{{url('sy_category')}}">Kategori</a></li>
        <li class=""><a href="{{url('sy_parsys/dash')}}">Parsys</a></li>
        <li class=""><a href="{{url('sy_menu')}}">Menu</a></li>
    </ul>
</li>
<li class="has-sub">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-gear"></i>
        <span>System <span class="label label-theme m-l-5">NEW</span></span>
    </a>
    <ul class="sub-menu">
        <li class=""><a href="{{url('crud')}}">CRUD Generator</a></li>
        <li class=""><a href="{{url('db')}}">DB Config</a></li>
        <li class=""><a href="{{url('sy_log')}}">Log System</a></li>
        <li class=""><a href="{{url('sy_link/dash')}}">Security Access</a></li>
        <li class=""><a href="{{url('system/about')}}">About</a></li>
    </ul>
</li>
<li><a href="{{url('system/help')}}">
        <i class="fa fa-warning"></i>
        <span>Help</span>
    </a></li>
</li> --}}
<li><a href="{{url('logout')}}">
        <i class="fa fa-sign-out"></i>
        <span>Keluar</span>
    </a></li>
</li>

</li>
<!-- begin sidebar minify button -->
<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
            class="fa fa-angle-double-left"></i></a></li>
<!-- end sidebar minify button -->