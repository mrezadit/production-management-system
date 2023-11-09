<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Material</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Material</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">Production System</h6>
            </div>
        </div>
    </nav>
</br>
<div class="container-fluid pt-0 ">
        <div class="card-header p-0 w-75 position-fixed mt-n4 mx-2 z-index-2">
            <div class="shadow-dark border-radius-lg d-flex px-5 pt-4 pb-3">
                <div class="col-8 d-flex align-items-center">
                <i class="material-icons pr-3">view_in_ar</i>
                    <h6 class="mb-0 pr-4 ">Material Used</h6>
                </div>           
                <div class="col-4 text-end">
                    <a href="<?= site_url('admin/material/addnewmaterial'); ?>" class="btn badge-sm bg-gradient-secondary mb-0">Add Material</a>
                </div>
            </div>
        </div>
</div>
<div class="container py-4 pt-5">
    <div class="row">
        <div class="col-md-7 mt-4 pl-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Material History</h6>
              <span class="text-sm mb-0">History of material used on production</span>

            </div>
            <div class="card-body p-3">
                <div class="table-responsive p-0">
                    <table id="table-data" class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Material</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Out</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Production</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Date</th>
                        </tr>
                    </thead>
                    <tbody class="pl-3">
                    <?php if (!empty($material)) : $i = 1; foreach ($material as $value) : ?>
                        <tr>
                        <td>
                        <div class="d-flex pl-3">
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                            </div>
                        </div>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->material_name?></span> </br>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->used_stock?> Kg</span> </br>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->staff_name?></span> </br>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->start_date?></span> </br>
                        </td>
                        <?php  endforeach; endif;?>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
          </div>
        </div>
        <div class="col-md-5 mt-4 pr-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-7 pl-4 align-items-center">
                    <h6 class="mb-0">Material Status</h6>
                        <span class="text-sm mb-0">Material for this Production</span>
                    </div>
                </div>
                    </div>
            <div class="card-body pt-4">
                <div class="table-responsive p-0">
                <table id="table-data" class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 pl-0">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Material</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Stock</th>
                        </tr>
                    </thead>
                    <tbody class="pl-3">
                    <?php if (!empty($materials)) : $i = 1; foreach ($materials as $value) : ?>
                        <tr>
                        <td>
                        <div class="d-flex">
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                            </div>
                        </div>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->material_name?></span>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->stock?> Kg</span>
                        </td>
                        </tr>
                        <?php  endforeach; endif;?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>