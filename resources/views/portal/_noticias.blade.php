<section id="noticias" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="seccion-encabezado">Noticias</h2>
            </div>
        </div>
        <div class="row">
            <!-- Slider -->
            @include('portal._noticias._slider', ['noticiasSlider'  => $noticiasSlider])
            <!-- /.Slider -->

            <!-- Sidebar -->
            @include('portal._noticias._sidebar', ['noticiasSidebar'  => $noticiasSidebar])
            <!-- /.Sidebar -->
        </div>
    </div>
</section>