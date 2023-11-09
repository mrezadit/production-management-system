<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Production</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Production</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>
    </nav>
</br>
<div class="container-fluid py-4 pt-0">

    <div class="card-header p-0 w-75 position-fixed mt-n4 mx-2 z-index-2">
        <div class="shadow-dark border-radius-lg d-flex px-5 pt-4 pb-4">
            <div class="col-8 d-flex align-items-center">
            <i class="material-icons pr-3">settings_input_component</i>
                <h6 class="mb-0 pr-4 ">Production Process</h6>
            </div>           
        </div>
    </div>
    
</div>
<div class="container py-4 pl-5 pr-5">

    <div class="row">
        <div class="card">
            <div class="card-body pt-4 p-3">
            <div class="table-responsive p-0">
                <table id="table-data" class="table align-items-center justify-content-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Production</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Plan</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Shiftment</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Target</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Start Date</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody class="pl-3">
                <?php if (!empty($production)) : $i = 1; foreach (array_reverse($production) as $value) : ?>
                    <tr>
                    <td>
                    <div class="d-flex pl-3">
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                        </div>
                    </div>
                    </td>
                    <td class="pl-4">
                        <span class="text-sm font-weight-bold"><?= $value->staff_name; ?></span>
                    </td>
                    <td class="pl-4">
                        <span class="text-sm font-weight-bold"><?= $value->plan_name; ?></span>
                    </td>
                    <td class="pl-4">
                        <span class="text-sm font-weight-bold"><?= $value->shift_name; ?></span>
                    </td>
                    <td class="pl-4">
                        <span class="text-sm font-weight-bold"><?= $value->qty_target; ?> Kg</span>
                    </td>
                    <td class="pl-4">
                        <span class="text-sm font-weight-bold"><?= $value->start_date; ?></span>
                    </td>
                    <td class="pl-4"> 
                    <?php if ( $value->ps_status == 1) :?>
                    <a href="<?= site_url('leader/detail_production/'.$value->id_planshift.'/view'); ?>" rel="tooltip" title="detail"  class="badge bg-gradient-info">Process</a>
                    <?php elseif ( $value->ps_status == 0) : ?>
                    <span href="<?= site_url('leader/detail_production/'.$value->id_planshift.'/view'); ?>" rel="tooltip" title="detail"  class="badge bg-gradient-secondary">Done</span>
                    <?php endif ;?> 
                    </td>
                    </tr>
                    <?php endforeach; endif; ?>

                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>