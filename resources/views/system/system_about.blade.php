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
                <a href="https://bitbucket.org/fahrudin_yewe/wisata/src/master/"
                    class="btn btn-warning btn-block btn-sm"><i class="fa fa-code-fork"></i> Clone from
                    Bitbucket</a>
            </div>
            <!-- begin profile-highlight -->
            <div class="profile-highlight">
                <h4><i class="fa fa-puzzle-piece"></i> Build with</h4>
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> Laravel 8</label>
                </div>
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> AngularJs</label>
                </div>
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> Color Admin</label>
                </div>
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> Sonar Theme</label>
                </div>
                <div class="checkbox m-b-5 m-t-0">
                    <label><i class="fa fa-terminal"></i> <a
                            href="https://github.com/kitloong/laravel-migrations-generator" target="_blank"> Kitloong
                            Migration Generator</a></label>
                </div>
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
                                    <h4>Laravered v.1.0
                                        <small>build quickly and magically</small></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="highlight">
                                <td class="field"><i class="fa fa-user"></i></td>
                                <td class=""><strong>Developed by</strong> </td>
                            </tr>
                            <tr>
                                <td class="field">Me</td>
                                <td><i class="fa fa-user fa-lg m-r-5"></i> Fahrudin Yuniwinanto</td>
                            </tr>
                            <tr>
                                <td class="field">Mobile</td>
                                <td><i class="fa fa-phone fa-lg m-r-5"></i> 089 636 xxx 456</td>
                            </tr>

                            <tr>
                                <td class="field">Email</td>
                                <td><i class="fa fa-globe fa-lg m-r-5"></i><a href="#"> fahrudinyewe@gmail.com</a></td>
                            </tr>
                            <tr class="">
                                <td class="field">Bitbucket</td>
                                <td><i class="fa fa-bitbucket fa-lg m-r-5"></i><a
                                        href="https://bitbucket.org/fahrudin_yewe/wisata/src/master/">
                                        https://bitbucket.org/fahrudin_yewe/wisata/src/master/</a>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="field">YouTube</td>
                                <td><i class="fa fa-youtube fa-lg m-r-5"></i><a
                                        href="https://youtube.com/peternakkode/">https://youtube.com/peternakkode/</a>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="field">LinkedIn</td>
                                <td><i class="fa fa-linkedin fa-lg m-r-5"></i><a
                                        href="www.linkedin.com/in/fahrudin-mgl">
                                        www.linkedin.com/in/fahrudin-mgl</a>
                                </td>
                            </tr>
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
                            <tr>
                                <td class="field"></td>
                                <td><strong>6 Mei 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Set dynamic autoincrement on Form Generator</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>13 April 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">CRUD Generator: setting structure</td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">CRUD Generator > Security Generator > Create Menu</td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">CRUD Generator > Security Generator > Create Access</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>8 April 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Security Access (User, Group, Access, Menu)</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>1 April 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Table lookup </td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>31 Maret 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>Include Upload Multiple Components on CRUD Generator
                                </td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>29 Maret 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>Log System</td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>Export Excel JQuery</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>22 Maret 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Dinamic Menu Application</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>26 Februari 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>Breeze Authentication (Login, Registration, 2 Steps Verification, Forgot Password)
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>Front Page (Sonar Theme)</td>
                            </tr>
                            <tr>
                                <td class="field"></td>
                                <td><strong>6 Februari 2021</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td>CRUD Generator</td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Multy DB Suport </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Parameter System </td>
                            </tr>
                            <tr>
                                <td class="field"><i class="fa fa-check"></i></td>
                                <td class="">Category </td>
                            </tr>

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