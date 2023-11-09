<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Warehousing</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Fnished Production</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>
    </nav>
</br>
    <div class="row pr-2">
        <div class="col-12">
            <div class="card my-2">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-dark border-radius-lg d-flex px-5 pt-4 pb-3">
                    <div class="col-6 d-flex align-items-center">
                    <i class="material-icons pr-3">schedule</i>
                      <h6 class="mb-0">Warehousing</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="table-data" class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Project</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Customer</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Last Date</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty Request</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total Finished</th>
                        </tr>
                    </thead>
                    <tbody class="pl-3">
                    <?php if (!empty($finished)) : $i = 1; foreach ($finished as $value) : ?>
                        <tr>
                        <td>
                        <div class="d-flex pl-3">
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                            </div>
                        </div>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->project_name; ?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->cust_name; ?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= date('d-m-Y', strtotime($value->fdate)); ?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->qty_request; ?> Kg</span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->total_finished; ?> Kg</span>
                        </td>
                        </tr>
                        <?php endforeach; endif; ?>

                    </tbody>
                    </table>
                </div>
                </div>

            </div>
        </div>
    </div>