<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tableau de bord bibliothèse.UNZ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="StyleDash/images/favicon.ico" type="image/x-icon"> -->

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('StyleDash/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('MesStyles/style.css') }}">
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Tableau principal</label>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('campListe') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Campagne
                                d'inspection</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('RapportListe') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Tous mes
                                rapports</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">Importations</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('ChoixImportation', ['val' => 1]) }}">Import directions</a></li>
                            <li><a href="{{ route('ChoixImportation', ['val' => 2]) }}">Import enseignants</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src=" asset {{ 'images/logo btz.png' }}" alt="" class="logo">
                {{-- <img src="asset {{ 'StyleDash/images/logo-icon.png' }}" alt="" class="logo-thumb"> --}}
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        {{-- <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Se déconnecter</a></li>
            </ul>
        </div> --}}
    </header>
    <!-- [ Header ] end -->

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Main Content ] start -->

            @yield('contentMain')

            <!-- [ Main Content ] end -->
        </div>
    </div>

    <script>
        document.getElementById('retour').addEventListener('click', function() {
            window.history.back();
        });
    </script>
    <!-- Required Js -->
    <script src="{{ asset('StyleDash/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('StyleDash/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('StyleDash/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('boostrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('MesStyles/style.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('StyleDash/js/plugins/apexcharts.min.js') }}"></script>

    <!-- custom-chart js -->
    <script src="{{ asset('StyleDash/js/pages/dashboard-main.js') }}"></script>
</body>

</html>
