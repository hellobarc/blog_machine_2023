@include('admin.templetes.head')
    <body class="hold-transition light-skin sidebar-mini theme-primary fixed">
        <div class="wrapper">
            <div id="loader"></div>

             <div id="app">
                 <app-component/>
            </div>

        <div class="control-sidebar-bg"></div>
        </div>
	@include('admin.templetes.footer-js')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
