<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Shiftment</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Add Shiftment</h6>
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
                    <h4 class="mb-0">Create Shiftment Data</h4>
                    <span class="text-sm mb-0 text-end">Form to create a new data</span>
                </div>
            </div>
            <div class="d-flex pt-4" method="post">
                <div class="col-8">
                    <div class="card border-0 d-flex p-4 pt-0 mb-2 bg-gray-100">
                    <form class="pt-4" action="<?= site_url('admin/addShiftment'); ?>" method="post">
                    
                        <div class="row d-flex">
                            <div class="col-4">
                                <span>Planning</span></br>
                                <div class="input-group input-group-dynamic mb-4">
                                    <select class="selectpicker form-control" name="id_plan" data-style="btn btn-link" data-live-search="true">
                                        <option disabled selected>Select Planning</option>
                                        <?php if (!empty($planning)) : $i = 1; foreach ($planning as $value) : ?>
                                            <option value="<?= $value->id_plan; ?>"><?= $value->plan_name; ?></option> 
                                        <?php endforeach; endif; ?>
                                    </select>                      
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                            <div class="col-7">
                            <span>Date Process</span></br>
                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label"></label>
                                <input type="hidden" name="st_status" value="2">
                                <input type="hidden" name="ps_status" value="1">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            </div>
                        </div>
                        <div class="row d-flex">
                            <div class="col-4">
                                <span>Shitment</span></br>
                                <div class="input-group input-group-dynamic mb-4">
                                    <select class="selectpicker form-control" name="id_shift" data-style="btn btn-link" data-live-search="true">
                                        <option disabled selected>Select Shiftment</option>
                                        <?php if (!empty($shiftment)) : $i = 1; foreach ($shiftment as $value) : ?>
                                            <option value="<?= $value->id_shift; ?>"><?= $value->shift_name; ?></option> 
                                        <?php endforeach; endif; ?>
                                    </select>                      
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                            <div class="col-7">
                            <span>Shift Head</span></br>
                            <div class="input-group input-group-dynamic mb-4">
                                    <select class="selectpicker form-control" name="id_staff" data-style="btn btn-link" data-live-search="true">
                                        <option disabled selected>Select Staff</option>
                                        <?php if (!empty($staff)) : $i = 1; foreach ($staff as $value) : ?>
                                            <option value="<?= $value->id_staff; ?>"><?= $value->staff_name; ?></option> 
                                        <?php endforeach; endif; ?>
                                    </select>      
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="pr-2">
                        <span>Create and save this data?</span></br>
                    </div>
                    <div class="d-flex">
                        <div class="pt-2 pl-2">
                            <a class="btn btn-outline-dark btn-sm mb-0" href="<?= site_url('admin/plan_shift'); ?>">Back</a>
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