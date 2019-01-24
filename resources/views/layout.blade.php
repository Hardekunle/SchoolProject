<!DOCTYPE html>
<html lang="en">
<head>
@include('structure.header')
@yield('style')
</head>
<body>
    @include('structure.navbar')
    <div class="parent-wrapper" id="outer-wrapper">
        @include('structure.sidemenu')       
        @yield('error')
        @include('messages.error')
        @yield('content')
    </div>
    @include('structure.script') 
    @yield('script')   
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0381'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='../../../../../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</html>