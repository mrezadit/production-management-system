<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Staff</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Update Staff</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>
    </nav>
</br>
<div class="d-flex justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-7 align-items-center pl-4">
                    <h4 class="mb-0">Update Staff Data</h4>
                    <span class="text-sm mb-0 text-end">Form to create a new data</span>
                </div>
            </div>
            <div class="d-flex pt-4" method="post">
                <div class="col-8">
                    <div class="card border-0 d-flex p-4 pt-0 mb-2 bg-gray-100">
                    <form class="pt-4" action="<?= site_url('admin/updatestaff'); ?>" method="post">
                        <span>Staff Name</span></br>
                        <div class="input-group input-group-dynamic mb-4">
                            <label class="form-label"></label>
                            <input type="hidden" name="id_staff" value="<?= $detail['id_staff']; ?>">
                            <input type="text" name="staff_name" value="<?= $detail['staff_name']; ?>" class="form-control">                  
                        </div>
                        <div class="row d-flex">
                            <div class="col-4">
                                <span>Phone Number</span></br>
                                <div class="input-group input-group-dynamic mb-4">
                                    <label class="form-label"></label>
                                    <input type="hidden" name="pr_status" value="1">
                                    <input type="number" name="phone" value="<?= $detail['phone']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                            <div class="col-7">
                            <span>Email</span></br>
                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label"></label>
                                <input type="email" name="email" value="<?= $detail['email']; ?>" class="form-control">
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="pr-2">
                        <span>Update and save this data?</span></br>
                    </div>
                    <div class="d-flex">
                        <div class="pt-2 pl-2">
                            <a class="btn btn-outline-dark btn-sm mb-0" href="<?= site_url('admin/project'); ?>">Back</a>
                        </div>
                        <div class="pt-2 pl-2">
                            <button class="btn btn-dark btn-sm mb-0" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
<div>