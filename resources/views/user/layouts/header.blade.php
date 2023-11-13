<style>
    
    .navitem:hover{
        background-color:#41cfff;
    }
</style>

<div style="background-color:deepskyblue;" class="znav-container znav-fixed border-bottom color-10" id="znav-container" >
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md " style="padding:0px;" style="vertical-align: middle;">
            <button class="navbar-toggler navbar-toggler-right color-black navitem" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger hamburger--emphatic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </button>
            <a style="" class="navbar-brand overflow-hidden" href="{{route('home')}}">id4u</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li><a class="color-3 navitem" href="{{route('home')}}">Home</a></li>
                    <li><a class="color-3 navitem" href="{{route('admin.login')}}">Admin Login</a></li>
                    </ul>
            </div>
        </nav>
    </div>
    <!-- /.container-->
</div>
<!-- /.znav-container-->
