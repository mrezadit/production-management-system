<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Planning</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Planning</h6>
            </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <h6 class="text-sm font-weight-bolder mb-0">Details Planning</h6>
            </div>
        </div>
    </nav>
</br>
    <!-- End Navbar -->
  <div class="container-fluid ">
    <div class="pb-4">
        <div class="row">
            <div class="col-10 d-flex align-items-center">
                <h4 class="mb-0">Planning Details.</h4>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-xl-6 mb-xl-0">
              <div class="card h-100 shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <div class="card-body position-relative z-index-1 p-3">
                        <div class="d-flex me-4">
                          <span class="pr-4 mb-0">Planning : </span>
                          <h5 class="mb-0">&nbsp;<?= $plan['plan_name']?></h5>
                        </div>
                        <div class="d-flex me-4 pt-4">
                          <span class="mb-0 pr-3">On Project :</span>
                          <h6 class="mb-0"><?= $plan['project_name']?></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-5 col-6">
                  <div class="card h-100">
                    <div class="card-body p-3 text-center">
                    <span class="text-xs m-0 pt-2">Quantity </br> Request</span>
                      <h5 class="mb-0 pt-1"><?= $plan['qty_request']?> Kg</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-6">
                  <div class="card h-100">
                  <div class="card-body p-1 text-center">
                      <span class="text-sm m-0 ">Entry Date :</span>
                      <h6 class=" mb-0 "><?= $plan['entry_date']?> </h6>
                    </div>
                    <div class="card-body p-1 text-center">
                      <span class="text-sm m-0 ">Finish Date :</span>
                      <h6 class=" mb-0 "><?= $plan['end_date']?> </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                  <div class="col-6 align-items-center">
                      <span class="text-lg mb-0"><b>Customer Information</b></span>
                  </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md mb-md-0 mb-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <span class="mb-3 text-sm">Customers : <b><?= $plan['cust_name']?>  </b></span>
                            <span class="mb-3 text-sm">Address : <b><?= $plan['address']?>  </b></span>
                        </div>
                        <div class="pl-3 d-flex flex-column">
                            <span class="mb-3 text-sm">Telephone : <b><?= $plan['telp']?>  </b></span>
                            <span class="mb-3 text-sm">Email : <b><?= $plan['email']?>  </b></span>
                        </div>
                        </li>
                    </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 align-items-center">
                    <span class="text-lg mb-0"><b>Shiftment on this Planning</b></span>
                </div>
            </div>
            <hr>
            <div class="card-header pb-0 pt-0 p-3">
                  <div class="row d-flex">
                      <div class="col-5  align-items-center">
                      <span class="mb-0">Production : </br><b><?= $plan['product_name']?></b></span>
                      </div>
                      <div class="col-3 align-items-center">
                      <span class="mb-0">Diameter : </br><b><?= $plan['diameter']?> mm</b></span>
                      </div>
                      <div class="col-3 align-items-center">
                      <span class="mb-0">Target : </br><b><?= $plan['qty_target']?> Kg/Shift</b></span>
                      </div>
                  </div>
            </div>
          </div>
            <div class="card-body p-3 pb-0">
            <div class="table-responsive p-0">
                    <table id="table-data" class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Plan</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Head</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Start Date</th>
                        </tr>
                    </thead>
                    <tbody class="pl-3">
                    <?php if (!empty($planshift)) : $i = 1; foreach ($planshift as $value) : ?>
                        <tr>
                        <td>
                        <div class="d-flex pl-3">
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                            </div>
                        </div>
                        </td>
                        <td class="pl-4">
                            <span class="text-sm font-weight-bold"><?= $value->shift_name?></span> </br>
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
        
      </div>
    </div>
  </div>
