<!DOCTYPE html>
<html lang="en">
<x-head>
</x-head>
<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
    <div class="wrapper">
        <x-navbar></x-navbar>
        <x-sidebar></x-sidebar>
        <div class="container mt-4">
            {{ $slot }}
        </div>
    </div>
    <x-script></x-script>

    {{-- Toast Success --}}
    @if(Session::has('success'))
    <script>
        toastr.option ={
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success("{{Session::get('success')}}",'Berhasil!',{timeOut:3000});
    </script>
    @endif

    {{-- Toast Error --}}
    @if(Session::has('error'))
    <script>
        toastr.option ={
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.warning("{{Session::get('error')}}",'Error!',{timeOut:3000});
    </script>
    @endif
</body>
</html>