@extends('layout.backend')
@section('content')
<div class="profile-container">
    <!-- begin profile-section -->
    <div class="profile-section">
        <!-- begin profile-left -->
        <div class="profile-left">
            <!-- begin profile-image -->
            <div class="profile-image">
                <img src="{{asset('')}}assets/vendor/laravered/laravered.jpeg" />
                <i class="fa fa-user hide"></i>
            </div>
            <!-- end profile-image -->
            <div class="m-b-10">
                <a href="{{App\Helpers\MeHelper::parsys('DEV_GITHUB')}}" class="btn btn-warning btn-block btn-sm"><i
                        class="fa fa-code-fork"></i> Clone from
                    Github</a>
            </div>
            <!-- begin profile-highlight -->
            <div class="profile-highlight">
                <h4><i class="fa fa-puzzle-piece"></i> Build with</h4>
                @foreach (App\Models\SyChangelog::where('group',1)->get() as $v)
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> {{$v->label}}</label>
                </div>
                @endforeach

            </div>
            <!-- end profile-highlight -->
        </div>
        <!-- end profile-left -->
        <!-- begin profile-right -->
        <div class="profile-right">
            <!-- begin profile-info -->
            <div class="profile-info">
                <!-- begin table -->
                <div class="table-responsive">
                    <table class="table table-profile">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <h4>{{App\Helpers\MeHelper::parsys('APP_NAME')}} version
                                        {{App\Helpers\MeHelper::parsys('VERSION')}}
                                        <small>{{App\Helpers\MeHelper::parsys('FW_DESC')}}</small></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="highlight">
                                <td class="field"><i class="fa fa-user"></i></td>
                                <td class=""><strong>Developed by</strong> </td>
                            </tr>
                            @foreach (App\Models\SyParsys::where('group','DEV')->get() as $v)
                            <tr>
                                <td class="field">{{Str::substr($v->name,4)}}</td>
                                @if ($v->note!="")
                                <td><a href="{{$v->note}}">{{$v->value}}</a></td>
                                @else
                                <td>{{$v->value}}</td>
                                @endif
                            </tr>
                            @endforeach

                            <tr class="highlight">
                                <td class="field"><i class="fa fa-cubes"></i></td>
                                <td><strong>Features & Change Logs</strong></td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>Cooming Soon</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td class="">Plant Access Management </td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td class="">Security Generator </td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td class="">Auto Backup DB</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td class="">Dynamic System About Data</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td class="">Sy Calendar</td>
                            </tr>
                            @foreach (App\Models\SyChangelog::where('group',2)->select('changed_at')->distinct()->get()
                            as $k =>$v)
                            <tr>
                                <td class="field"></td>
                                <td><strong>{{$v->changed_at}}</strong>
                                </td>
                            </tr>
                            @foreach (
                            App\Models\SyChangelog::where('changed_at',$v->changed_at)->orderBy('id','asc')->get()
                            as $k1 => $v1)
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">{{$v1->label}}</td>
                            </tr>
                            @endforeach
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- end table -->
            </div>
            <!-- end profile-info -->
        </div>
        <!-- end profile-right -->
    </div>
    <!-- end profile-section -->
    <!-- begin profile-section -->

    <!-- end profile-section -->
</div>
<!-- end profile-container -->
@endsection