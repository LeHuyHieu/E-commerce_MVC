<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Insert Banner</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="mb-4 d-flex justify-content-between align-items-end">
                    <h3>Create Banner</h3>
                </div>
                <form action="index.php?action=banner&process=store" method="POST" enctype="multipart/form-data">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Title banner" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="event" class="form-label">Event</label>
                                        <input type="text" name="event" class="form-control" id="event" placeholder="Event">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <label for="startingAt" class="form-label">Staring at</label>
                                        <input type="number" name="starting_at" class="form-control" id="startingAt" placeholder="Starting at">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="background" class="form-label" >Background</label>
                                        <input type="file" name="background" onchange="preview()" class="form-control" id="background">
                                        <img src="assets/images/no_image.jpg" width="100px" id="showImage" class="img-fluid mt-3 rounded" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Create banner</button>
                    </div>
                </form>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<script>
    function preview() {
        showImage.src=URL.createObjectURL(event.target.files[0]);
    }
</script>