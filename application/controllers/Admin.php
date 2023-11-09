<?php

// Production Management System by mrezadit
// See other systems at https://github.com/mrezadit
// If you have any questions, feel free to contact me at mrezadit@gmail.com

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CrudModel', 'crudModel');
        $this->load->library('session');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login/');
        }
    }

    public function index()
    {

        $data = [
            'finished' => $this->db->query('SELECT * FROM finished_report JOIN project JOIN customer
            WHERE finished_report.id_project=project.id_project AND project.id_cust=customer.id_cust')->result(),
            
            'sorting' => $this->db->query('SELECT * FROM sorting_report JOIN plan_shift JOIN planning JOIN staff
            WHERE sorting_report.id_planshift=plan_shift.id_planshift AND plan_shift.id_staff=staff.id_staff AND plan_shift.id_plan=planning.id_plan')->result(),

            'project' => $this->crudModel->getData('project')->num_rows(),
            'planning' => $this->crudModel->getData('planning')->num_rows(),
            'plan_shift' => $this->crudModel->getData('plan_shift')->num_rows(),
            'finished_report' => $this->crudModel->getData('finished_report')->num_rows(),

            'content' => 'admin/beranda',
            'navlink' => 'beranda',
        ];

        $this->load->view('admin/vbackend', $data);
    }

    public function customer()
    {
        if ($this->uri->segment(4) === 'view') 
        {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('customer', 'id_cust', $id)->row();

            $data = [
                'detail' => [
                    'id_cust' => $tampil->id_cust,
                    'cust_name' => $tampil->cust_name,
                    'address' => $tampil->address,
                    'telp' => $tampil->telp,
                    'email' => $tampil->email,
                ],
                'content' => 'admin/customer/UpdateCustomer',
                'navlink' => 'customer',
            ];

        } elseif ($this->uri->segment(3) === 'addcustomer') {

            $data = [
                'content' => 'admin/customer/addcustomer',
                'navlink' => 'customer',
            ];

        } elseif ($this->uri->segment(4) === 'delete') {

            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('customer', 'id_cust', $id)->row();

            $data = [
                'detail' => [
                    'id_cust' => $tampil->id_cust,
                    'cust_name' => $tampil->cust_name,
                    'address' => $tampil->address,
                    'telp' => $tampil->telp,
                    'email' => $tampil->email,
                ],
                'content' => 'admin/customer/deletecustomer',
                'navlink' => 'customer',
            ];

        } else {
            
            $data = [
                'customer' => $this->crudModel->getData('customer')->result(),
                'content' => 'admin/customer/customer',
                'navlink' => 'customer',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addCustomer()
    {
        $add = [
            'id_cust' => $this->crudModel->generateCode(1, 'id_cust', 'customer'),
            'cust_name' => trim($this->input->post('cust_name')),
            'address' => trim($this->input->post('address')),
            'telp' => trim($this->input->post('telp')),
            'email' => trim($this->input->post('email')),

        ];

        $this->crudModel->addData('customer', $add);

        redirect(site_url('Admin/customer'));
    }

    public function updateCustomer()
    {
        $id_cust = $this->input->post('id_cust');

        $update = [
            'cust_name' => trim($this->input->post('cust_name')),
            'address' => trim($this->input->post('address')),
            'telp' => trim($this->input->post('telp')),
            'email' => trim($this->input->post('email')),
        ];

        $this->crudModel->updateData('customer', 'id_cust', $id_cust, $update);

        redirect(site_url('Admin/customer'));
    }

    public function deleteCustomer()
    {
        $id_cust = $this->uri->segment(3);

        $this->crudModel->deleteData('customer', 'id_cust', $id_cust);

        redirect(site_url('Admin/customer'));
    }

    public function project()
    {
        if ($this->uri->segment(4) === 'view') {
            
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('project', 'id_project', $id)->row();

            $data = [
                'detail' => [
                    'id_project' => $tampil->id_project,
                    'project_name' => $tampil->project_name,
                    'id_cust' => $tampil->id_cust,
                    'id_product' => $tampil->id_product,
                    'qty_request' => $tampil->qty_request,
                    'diameter' => $tampil->diameter,
                    'entry_date' => $tampil->entry_date,
                ],

                'content' => 'admin/project/updateProject',
                'navlink' => 'project',
                'customer' => $this->db->query('SELECT id_cust, cust_name FROM customer')->result(),
                'product' => $this->db->query('SELECT * FROM product')->result(),
                ];

        } elseif ($this->uri->segment(3) === 'addproject') {

            $data = [
                'customer' => $this->db->query('SELECT id_cust, cust_name FROM customer')->result(),
                'product' => $this->db->query('SELECT * FROM product')->result(),
                'content' => 'admin/project/addproject',
                'navlink' => 'project',
            ];

        } elseif ($this->uri->segment(4) === 'delete') {

            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('project', 'id_project', $id)->row();

            $data = [
                'detail' => [
                    'id_project' => $tampil->id_project,
                    'project_name' => $tampil->project_name,
                    'id_cust' => $tampil->id_cust,
                    'id_product' => $tampil->id_product,
                    'qty_request' => $tampil->qty_request,
                    'diameter' => $tampil->diameter,
                    'entry_date' => $tampil->entry_date,
                ],

                'content' => 'admin/project/deleteProject',
                'navlink' => 'project',
                'customer' => $this->db->query('SELECT id_cust, cust_name FROM customer')->result(),
                'product' => $this->db->query('SELECT * FROM product')->result(),
                ];

        } else {

            $data = [
                'project' => $this->db->query('SELECT * FROM project JOIN customer JOIN product WHERE project.id_cust=customer.id_cust AND project.id_product=product.id_product')->result(),
                'customer' => $this->db->query('SELECT * FROM customer')->result(),
                'product' => $this->db->query('SELECT * FROM product')->result(),
                'content' => 'admin/project/project',
                'navlink' => 'project',
                ];
        }
        
        $this->load->view('admin/vbackend', $data);
    }

    public function addProject()
    {
        $add = [
            'id_project' => $this->crudModel->generateCode(1, 'id_project', 'project'),
            'project_name' => trim($this->input->post('project_name')),
            'entry_date' => trim($this->input->post('entry_date')),
            'id_cust' => trim($this->input->post('id_cust')),
            'id_product' => trim($this->input->post('id_product')),
            'diameter' => trim($this->input->post('diameter')),
            'qty_request' => trim($this->input->post('qty_request')),
            'pr_status' => trim($this->input->post('pr_status', 1)),
        ];

        $this->crudModel->addData('project', $add);

        redirect(site_url('Admin/project'));
    }

    public function updateProject()
    {
        $id_project = $this->input->post('id_project');

        $update = [
            'project_name' => trim($this->input->post('project_name')),
            'entry_date' => trim($this->input->post('entry_date')),
            'id_cust' => trim($this->input->post('id_cust')),
            'id_product' => trim($this->input->post('id_product')),
            'diameter' => trim($this->input->post('diameter')),
            'qty_request' => trim($this->input->post('qty_request')),
        ];

        $this->crudModel->updateData('project', 'id_project', $id_project, $update);

        redirect(site_url('Admin/project'));
    }

    public function deleteProject()
    {
        $id_project = $this->uri->segment(3);

        $this->crudModel->deleteData('project', 'id_project', $id_project);

        redirect(site_url('Admin/project'));
    }

    public function product()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('product', 'id_product', $id)->row();

            $data = [
                'detail' => [
                    'id_product' => $tampil->id_product,
                    'product_name' => $tampil->product_name,
                    'summary' => $tampil->summary,
                    'application' => $tampil->application,
                ],
                'content' => 'admin/UpdateProduct',
                'navlink' => 'product',
            ];
        } else if ($this->uri->segment(3) === 'addproduct') {

            $data = [
                'content' => 'admin/product/addproduct',
                'navlink' => 'product',
            ];

        } else {
            $data = [
                'product' => $this->crudModel->getData('product')->result(),
                'content' => 'admin/product/product',
                'navlink' => 'product',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addProduct()
    {
            $add = [
                'id_product' => $this->crudModel->generateCode(1, 'id_product', 'product'),
                'product_name' => trim($this->input->post('product_name')),
                'summary' => trim($this->input->post('summary')),
                'application' => trim($this->input->post('application')),

            ];

            $this->crudModel->addData('product', $add);

            redirect(site_url('Admin/product'));
    }

    public function planning()
    {
        if ($this->uri->segment(4) === 'update') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('planning', 'id_plan', $id)->row();

            $data = [
                'detail' => [
                    'id_plan' => $tampil->id_plan,
                    'plan_name' => $tampil->plan_name,
                    'id_project' => $tampil->id_project,
                    'qty_target' => $tampil->qty_target,
                    'end_date' => $tampil->end_date,
                ],

                'content' => 'admin/planning/UpdatePlanning',
                'navlink' => 'planning',
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'project' => $this->db->query('SELECT * FROM project')->result(),
                'customer' => $this->db->query('SELECT * FROM customer')->result(),
                ];

        } elseif ($this->uri->segment(3) === 'addplanning') {

            $data = [
                    'content' => 'admin/planning/addPlanning',
                    'navlink' => 'planning',
                    'planning' => $this->db->query('SELECT * FROM planning')->result(),
                    'project' => $this->db->query('SELECT * FROM project')->result(),
                ];

        } elseif ($this->uri->segment(4) === 'delete') {
            
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('planning', 'id_plan', $id)->row();

            $data = [
                'detail' => [
                    'id_plan' => $tampil->id_plan,
                    'plan_name' => $tampil->plan_name,
                    'id_project' => $tampil->id_project,
                    'qty_target' => $tampil->qty_target,
                    'end_date' => $tampil->end_date,
                ],

                'content' => 'admin/planning/deletePlanning',
                'navlink' => 'planning',
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'project' => $this->db->query('SELECT * FROM project')->result(),
                'customer' => $this->db->query('SELECT * FROM customer')->result(),
                ];

        } else {
            
            $data = [
                'planning' => $this->db->query('SELECT * FROM planning JOIN project WHERE planning.id_project=project.id_project')->result(),
                'project' => $this->db->query('SELECT * FROM project')->result(),
                'content' => 'admin/planning/planning',
                'navlink' => 'planning',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addPlanning()
    {
            $add = [
                'id_plan' => $this->crudModel->generateCode(1, 'id_plan', 'planning'),
                'plan_name' => trim($this->input->post('plan_name')),
                'id_project' => trim($this->input->post('id_project')),
                'qty_target' => trim($this->input->post('qty_target')),
                'end_date' => trim($this->input->post('end_date')),
                'pl_status' => trim($this->input->post('pl_status')),
            ];

            $this->crudModel->addData('planning', $add);

            $this->session->set_flashdata('flash', 'ditambah');

            redirect(site_url('Admin/planning'));
    }

    public function updatePlanning()
    {
        $id_plan = $this->input->post('id_plan');

        $update = [
            'plan_name' => trim($this->input->post('plan_name')),
            'id_project' => trim($this->input->post('id_project')),
            'qty_target' => trim($this->input->post('qty_target')),
            'end_date' => trim($this->input->post('end_date')),
            'pl_status' => trim($this->input->post('pl_status', 1)),
        ];

        $this->crudModel->updateData('planning', 'id_plan', $id_plan, $update);

        $this->session->set_flashdata('flash', 'diubah');

        redirect(site_url('Admin/planning'));
    }

    public function deletePlanning()
    {
        $id_plan = $this->uri->segment(3);

        $this->crudModel->deleteData('planning', 'id_plan', $id_plan);

        $this->session->set_flashdata('flash', 'dihapus');

        redirect(site_url('Admin/planning'));
    }

    public function plan_shift()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->db->query('SELECT * FROM planning JOIN project JOIN customer JOIN product WHERE id_plan = ' . $id. ' AND planning.id_project = project.id_project
            AND project.id_cust = customer.id_cust AND project.id_product = product.id_product')->row();

            $data = [
                'plan' => [
                    'id_plan' => $tampil->id_plan,
                    'plan_name' => $tampil->plan_name,
                    'project_name' => $tampil->project_name,
                    'qty_request' => $tampil->qty_request,
                    'qty_target' => $tampil->qty_target,
                    'end_date' => $tampil->end_date,
                    'entry_date' => $tampil->entry_date,
                    'cust_name' => $tampil->cust_name,
                    'address' => $tampil->address,
                    'telp' => $tampil->telp,
                    'email' => $tampil->email,
                    'product_name' => $tampil->product_name,
                    'diameter' => $tampil->diameter,
                ],

                'planshift' => $this->db->query('SELECT * FROM plan_shift JOIN shiftment JOIN staff WHERE id_plan = ' . $id. ' AND plan_shift.id_shift = shiftment.id_shift
                AND plan_shift.id_staff = staff.id_staff')->result(),

                'content' => 'admin/planning/DetailPlanning',
                'navlink' => 'planning',
            ];

        } elseif ($this->uri->segment(4) === 'delete') {
            
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('plan_shift', 'id_planshift', $id)->row();

            $data = [
                'detail' => [
                    'id_planshift' => $tampil->id_planshift,
                    'id_plan' => $tampil->id_plan,
                    'id_shift' => $tampil->id_shift,
                    'id_staff' => $tampil->id_staff,
                    'start_date' => $tampil->start_date,
                ],

                'content' => 'admin/shiftment/deleteShiftment',
                'navlink' => 'plan_shift',
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'shiftment' => $this->db->query('SELECT * FROM shiftment')->result(),
                'staff' => $this->db->query('SELECT * FROM staff')->result(),
                ];

        } elseif ($this->uri->segment(3) === 'addshiftment') {

            $data = [
                'planshift' => $this->db->query('SELECT * FROM plan_shift')->result(),
                'planning' => $this->db->query('SELECT * FROM planning WHERE pl_status = 1')->result(),
                'shiftment' => $this->db->query('SELECT * FROM shiftment')->result(),
                'staff' => $this->db->query('SELECT * FROM staff')->result(),

                'content' => 'admin/shiftment/addshiftment',
                'navlink' => 'plan_shift',
            ];

        } else {

            $table = 'plan_shift';

            $onjoin = [
                'planning' => $table.'.id_plan=planning.id_plan',
                'shiftment' => $table.'.id_shift=shiftment.id_shift',
                'staff' => $table.'.id_staff=staff.id_staff',
            ];

            $data = [
                'plan_shift' => $this->crudModel->getDataJoin($table, $onjoin),
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'shiftment' => $this->db->query('SELECT * FROM shiftment')->result(),
                'staff' => $this->db->query('SELECT * FROM staff')->result(),
                'content' => 'admin/shiftment/shiftment',
                'navlink' => 'plan_shift',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addShiftment()
    {
        $id_staff = $this->input->post('id_staff');

        $update = [
            'st_status' => $this->input->post('st_status'),
        ];

        $add = [
            'id_planshift' => $this->crudModel->generateCode(1, 'id_planshift', 'plan_shift'),
            'id_plan' => trim($this->input->post('id_plan')),
            'id_shift' => trim($this->input->post('id_shift')),
            'id_staff' => trim($this->input->post('id_staff')),
            'start_date' => trim($this->input->post('start_date')),
            'ps_status' => trim($this->input->post('ps_status')),

        ];

        $this->crudModel->updateData('staff', 'id_staff', $id_staff, $update);

        $this->crudModel->addData('plan_shift', $add);

        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('Admin/plan_shift'));
    }

    public function deleteShiftment()
    {
        $id_planshift = $this->uri->segment(3);

        $id_staff = $this->uri->segment(4);

        $update = [
            'st_status' => $this->input->post('st_status'),
        ];

        $this->crudModel->deleteData('plan_shift', 'id_planshift', $id_planshift);

        $this->crudModel->updateData('staff', 'id_staff', $id_staff, $update);

        redirect(site_url('Admin/plan_shift'));
    }

    public function staff()
    {
        if ($this->uri->segment(3) === 'addstaff') {

            $data = [
                'staff' => $this->db->query('SELECT * FROM staff')->result(),
                'content' => 'admin/staff/addstaff',
                'navlink' => 'staff',
                ];

        } elseif ($this->uri->segment(4) === 'update') {

            $id = $this->uri->segment(3);
            
            $tampil = $this->crudModel->getDataWhere('staff', 'id_staff', $id)->row();

            $data = [
                'detail' => [
                    'id_staff' => $tampil->id_staff,
                    'staff_name' => $tampil->staff_name,
                    'phone' => $tampil->phone,
                    'email' => $tampil->email,
                ],

                'content' => 'admin/staff/updatestaff',
                'navlink' => 'staff',
                ];

        } else {
            $data = [
                'staff' => $this->db->query('SELECT * FROM staff')->result(),
                'content' => 'admin/staff/staff',
                'navlink' => 'staff',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addStaff()
    {
        $add = [
            'id_staff' => $this->crudModel->generateCode(1, 'id_staff', 'staff'),
            'staff_name' => trim($this->input->post('staff_name')),
            'phone' => trim($this->input->post('phone')),
            'email' => trim($this->input->post('email')),
        ];

        $this->crudModel->addData('staff', $add);

        redirect(site_url('Admin/staff'));
    }

    public function updateStaff()
    {
        $id_staff = $this->input->post('id_staff');

        $update = [
            'staff_name' => trim($this->input->post('staff_name')),
            'staff_name' => trim($this->input->post('staff_name')),
            'phone' => trim($this->input->post('phone')),
            'email' => trim($this->input->post('email')),
        ];

        $this->crudModel->updateData('staff', 'id_staff', $id_staff, $update);

        redirect(site_url('Admin/staff'));
    }

    public function deleteStaff()
    {
        $id_staff = $this->uri->segment(3);

        $this->crudModel->deleteData('staff', 'id_staff', $id_staff);

        redirect(site_url('Admin/staff'));
    }

    public function Production()
    {
        if ($this->uri->segment(3) === 'addproduction') {

            $data = [
                'planshift' => $this->db->query('SELECT * FROM plan_shift JOIN staff WHERE plan_shift.id_staff=staff.id_staff AND staff.st_status=2')->result(),
                'planning' => $this->db->query('SELECT * FROM planning WHERE pl_status = 1')->result(),
                'shiftment' => $this->db->query('SELECT * FROM shiftment')->result(),
                'staff' => $this->db->query('SELECT * FROM staff')->result(),

                'content' => 'admin/production/addproduction',
                'navlink' => 'production',
            ];

        } else {
            $table = 'plan_shift';

            $onjoin = [
                'shiftment' => $table.'.id_shift=shiftment.id_shift',
                'staff' => $table.'.id_staff=staff.id_staff',
                'planning' => $table.'.id_plan=planning.id_plan',
                'project' => 'planning.id_project=project.id_project',
            ];

            $data = [
                'production' => $this->crudModel->getDataJoin($table, $onjoin),
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'shiftment' => $this->db->query('SELECT * FROM shiftment')->result(),
                'staff' => $this->db->query('SELECT * FROM staff')->result(),
                'project' => $this->db->query('SELECT * FROM project')->result(),
                'content' => 'admin/production/production',
                'navlink' => 'production',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function detail_production()
    {
        if ($this->uri->segment(4) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->db->query(
                'SELECT * FROM plan_shift JOIN planning JOIN shiftment JOIN staff JOIN project JOIN product
                WHERE id_planshift = ' . $id. ' AND plan_shift.id_plan = planning.id_plan AND plan_shift.id_shift = shiftment.id_shift
                AND plan_shift.id_staff = staff.id_staff AND planning.id_project = project.id_project
                AND project.id_product = product.id_product')->row();

            $data = [
                'detail' => [
                    'id_planshift' => $tampil->id_planshift,
                    'plan_name' => $tampil->plan_name,
                    'staff_name' => $tampil->staff_name,
                    'shift_name' => $tampil->shift_name,
                    'qty_target' => $tampil->qty_target,
                    'start_date' => $tampil->start_date,
                    'product_name' => $tampil->product_name,
                    'diameter' => $tampil->diameter,
                ],

                'p_machine' => $this->db->query('SELECT * FROM p_machine JOIN machine WHERE id_planshift = ' . $id . ' AND p_machine.id_machine = machine.id_machine')->result(),
                'p_material' => $this->db->query('SELECT * FROM p_material JOIN material WHERE id_planshift = ' . $id. ' AND p_material.id_material = material.id_material')->result(),
                'content' => 'admin/production/DetailProduction',
                'navlink' => 'production',
            ];

        } elseif ($this->uri->segment(4) === 'addsorting') {
            $id = $this->uri->segment(3);

            $tampil = $this->db->query(
                'SELECT * FROM plan_shift JOIN planning JOIN shiftment JOIN staff JOIN project JOIN product
                WHERE id_planshift = ' . $id. ' AND plan_shift.id_plan = planning.id_plan AND plan_shift.id_shift = shiftment.id_shift
                AND plan_shift.id_staff = staff.id_staff AND planning.id_project = project.id_project
                AND project.id_product = product.id_product')->row();

            $data = [
                'detail' => [
                    'id_planshift' => $tampil->id_planshift,
                    'plan_name' => $tampil->plan_name,
                    'staff_name' => $tampil->staff_name,
                    'shift_name' => $tampil->shift_name,
                    'qty_target' => $tampil->qty_target,
                    'start_date' => $tampil->start_date,
                    'product_name' => $tampil->product_name,
                    'diameter' => $tampil->diameter,
                ],

                'p_machine' => $this->db->query('SELECT * FROM p_machine JOIN machine WHERE id_planshift = ' . $id . ' AND p_machine.id_machine = machine.id_machine')->result(),
                'p_material' => $this->db->query('SELECT * FROM p_material JOIN material WHERE id_planshift = ' . $id. ' AND p_material.id_material = material.id_material')->result(),
                'content' => 'admin/production/AddSorting',
                'navlink' => 'production',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function machine()
    {
        if ($this->uri->segment(3) === 'addmachine') {
        
            $data = [
                'planshift' => $this->db->query('SELECT * FROM plan_shift JOIN staff WHERE plan_shift.id_staff=staff.id_staff AND ps_status = 1 AND staff.st_status=2')->result(),
                'machine' => $this->db->query('SELECT * FROM machine WHERE mc_status = 1')->result(),

                'content' => 'admin/machine/addmachine',
                'navlink' => 'machine',
            ];

        } elseif ($this->uri->segment(3) === 'addnewmachine') {
        
            $data = [
                'content' => 'admin/machine/addnewmachine',
                'navlink' => 'machine',
            ];

        } else {
            $data = [
                'p_machine' => $this->db->query('SELECT * FROM p_machine JOIN plan_shift JOIN machine JOIN staff WHERE p_machine.id_planshift = plan_shift.id_planshift AND p_machine.id_machine = machine.id_machine AND plan_shift.id_staff = staff.id_staff')->result(),
                'machines' => $this->db->query('SELECT * FROM machine')->result(),
                'content' => 'admin/machine/machine',
                'navlink' => 'machine',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addMachine()
    {
            $id_machine = $this->input->post('id_machine');

            $update = [
                'mc_status' => trim($this->input->post('mc_status')),
            ];

            $add = [
                'id_pmachine' => $this->crudModel->generateCode(1, 'id_pmachine', 'p_machine'),
                'id_planshift' => trim($this->input->post('id_planshift')),
                'id_machine' => trim($this->input->post('id_machine')),
                'mc_stats' => trim($this->input->post('mc_stats')),

            ];

            $this->crudModel->updateData('machine', 'id_machine', $id_machine, $update);

            $this->crudModel->addData('p_machine', $add);

            redirect(site_url('Admin/machine'));
    }

    public function addNewMachine()
    {
            $add = [
                'id_machine' => $this->crudModel->generateCode(1, 'id_machine', 'machine'),
                'machine_name' => trim($this->input->post('machine_name')),
                'capacity' => trim($this->input->post('capacity')),
                'mc_status' => trim($this->input->post('mc_status')),
            ];

            $this->crudModel->addData('machine', $add);

            redirect(site_url('Admin/machine'));
    }


    public function finishMachine()
    {
        $id_pmachine = $this->uri->segment(3);
        
        $id = $this->uri->segment(4);

        $this->db->query('UPDATE p_machine SET mc_stats = 1 WHERE id_machine = ' . $id . '');

        $this->db->query('UPDATE machine SET mc_status = 1 WHERE id_machine = ' . $id . '');

        redirect(site_url('Admin/production'));
    }

    public function material()
    {
        if ($this->uri->segment(3) === 'addmaterial') {
        
            $data = [
                'planshift' => $this->db->query('SELECT * FROM plan_shift JOIN staff WHERE plan_shift.id_staff=staff.id_staff AND ps_status = 1 AND staff.st_status=2')->result(),
                'material' => $this->db->query('SELECT * FROM material')->result(),

                'content' => 'admin/material/addmaterial',
                'navlink' => 'material',
            ];
        } elseif ($this->uri->segment(3) === 'addnewmaterial') {
        
            $data = [
                'content' => 'admin/material/addnewmaterial',
                'navlink' => 'material',
            ];

        } else {
            $data = [
                'material' => $this->db->query('SELECT * FROM p_material JOIN plan_shift JOIN material JOIN staff WHERE p_material.id_material = material.id_material AND p_material.id_planshift = plan_shift.id_planshift AND plan_shift.id_staff = staff.id_staff')->result(),
                'materials' => $this->db->query('SELECT * FROM material')->result(),
                'content' => 'admin/material/material',
                'navlink' => 'material',
            ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function addMaterial()
    {
        $add = [
            'id_pmaterial' => $this->crudModel->generateCode(1, 'id_pmaterial', 'p_material'),
            'id_planshift' => trim($this->input->post('id_planshift')),
            'id_material' => trim($this->input->post('id_material')),
            'used_stock' => trim($this->input->post('used_stock')),
        ];

        $stock = $this->crudModel->getDataWhere('material', 'id_material', $add['id_material'])->row();

        $update = [
            'stock' => $stock->stock - (int) $add['used_stock'],
        ];

        $this->crudModel->updateData('material', 'id_material', $add['id_material'], $update);

        $this->crudModel->addData('p_material', $add);

        redirect(site_url('admin/material'));
    }

    public function addNewMaterial()
    {
            $add = [
                'id_material' => $this->crudModel->generateCode(1, 'id_material', 'material'),
                'material_name' => trim($this->input->post('material_name')),
                'stock' => trim($this->input->post('stock')),
            ];

            $this->crudModel->addData('material', $add);

            redirect(site_url('Admin/material'));
    }

    public function deleteMaterial()
    {
        $id_pmaterial = $this->uri->segment(3);

        $id_material = $this->uri->segment(4);

        $used_stock = $this->crudModel->getDataWhere('p_material', 'id_pmaterial', $id_pmaterial)->row();

        $stock = $this->crudModel->getDataWhere('material', 'id_material', $id_material)->row();

        $update = [
            'stock' => $stock->stock + (int) $used_stock->used_stock,
        ];

        $this->crudModel->updateData('material', 'id_material', $id_material, $update);

        $this->crudModel->deleteData('p_material', 'id_pmaterial', $id_pmaterial);

        redirect(site_url('admin/material'));
    }

    public function sorting()
    {
        if ($this->uri->segment(3) === 'addsorting') {
        
                $data = [
                    'planshift' => $this->db->query('SELECT * FROM plan_shift JOIN staff JOIN planning JOIN project WHERE ps_status = 1 AND plan_shift.id_staff=staff.id_staff AND plan_shift.id_plan = planning.id_plan AND planning.id_project = project.id_project ')->result(),
                    'sorting_report' => $this->db->query('SELECT * FROM sorting_report')->result(),
                    'p_machine' => $this->db->query('SELECT * FROM p_machine')->result(),
    
                    'content' => 'admin/sorting/addsorting',
                    'navlink' => 'sorting',
                ];

        } else {
            $table = 'sorting_report';

            $onjoin = [
                'plan_shift' => $table.'.id_planshift=plan_shift.id_planshift',
                'planning' => 'plan_shift.id_plan=planning.id_plan',
                'staff' => 'plan_shift.id_staff=staff.id_staff',
            ];

            $data = [
                'sorting' => $this->crudModel->getDataJoin($table, $onjoin),
                'content' => 'admin/sorting/sorting',
                'navlink' => 'sorting',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function detail_sorting()
    {
        if ($this->uri->segment(4) === 'view') {

            $id = $this->uri->segment(3);

            $tampil = $this->db->query(
                'SELECT * FROM plan_shift JOIN planning JOIN shiftment JOIN staff JOIN project JOIN product
                WHERE id_planshift = ' . $id. ' AND plan_shift.id_plan = planning.id_plan AND plan_shift.id_shift = shiftment.id_shift
                AND plan_shift.id_staff = staff.id_staff AND planning.id_project = project.id_project
                AND project.id_product = product.id_product')->row();
            
            $tampil2 = $this->db->query('SELECT * FROM sorting_report WHERE id_planshift = ' . $id. '')->row();
            
                $data = [
                'detail' => [
                    'plan_name' => $tampil->plan_name,
                    'staff_name' => $tampil->staff_name,
                    'shift_name' => $tampil->shift_name,
                    'qty_target' => $tampil->qty_target,
                    'start_date' => $tampil->start_date,
                    'product_name' => $tampil->product_name,
                    'diameter' => $tampil->diameter,
                    'waste' => $tampil2->waste,
                    'finished' => $tampil2->finished,

                ],

                'p_machine' => $this->db->query('SELECT * FROM p_machine JOIN machine WHERE id_planshift = ' . $id . ' AND p_machine.id_machine = machine.id_machine')->result(),
                'p_material' => $this->db->query('SELECT * FROM p_material JOIN material WHERE id_planshift = ' . $id. ' AND p_material.id_material = material.id_material')->result(),
                'content' => 'admin/sorting/DetailSorting',
                'navlink' => 'sorting',
            ];

            $this->load->view('admin/vbackend', $data);

        } else {

            $id = $this->uri->segment(3);

            $tampil = $this->db->query(
                'SELECT * FROM plan_shift JOIN planning JOIN shiftment JOIN staff JOIN project JOIN product
                WHERE id_planshift = ' . $id. ' AND plan_shift.id_plan = planning.id_plan AND plan_shift.id_shift = shiftment.id_shift
                AND plan_shift.id_staff = staff.id_staff AND planning.id_project = project.id_project
                AND project.id_product = product.id_product')->row();
            
            $tampil2 = $this->db->query('SELECT * FROM sorting_report WHERE id_planshift = ' . $id. '')->row();
            
                $data = [
                'detail' => [
                    'plan_name' => $tampil->plan_name,
                    'staff_name' => $tampil->staff_name,
                    'shift_name' => $tampil->shift_name,
                    'qty_target' => $tampil->qty_target,
                    'start_date' => $tampil->start_date,
                    'product_name' => $tampil->product_name,
                    'diameter' => $tampil->diameter,
                    'waste' => $tampil2->waste,
                    'finished' => $tampil2->finished,

                ],

                'p_machine' => $this->db->query('SELECT * FROM p_machine JOIN machine WHERE id_planshift = ' . $id . ' AND p_machine.id_machine = machine.id_machine')->result(),
                'p_material' => $this->db->query('SELECT * FROM p_material JOIN material WHERE id_planshift = ' . $id. ' AND p_material.id_material = material.id_material')->result(),
                'content' => 'admin/sorting/sortingprint',
            ];

            $this->load->view('admin/vprint', $data);

        }

    }
    
    public function addSorting2()
    {
        $id_planshift = $this->input->post('id_planshift');
        //var_dump($id_planshift);

        $finished = $this->crudModel->getDataWhere('sorting_report', 'id_planshift', $id_planshift)->row();
        
        $id_project = $this->db->query('SELECT planning.id_project FROM plan_shift JOIN planning
        WHERE id_planshift ='.$id_planshift.' AND plan_shift.id_plan = planning.id_plan')->row();
        
        $finished_report = $this->db->query('SELECT * FROM finished_report WHERE id_project = '.$id_project->id_project.'')->row();

        $add = [
            'id_sorting' => $this->crudModel->generateCode(1, 'id_sorting', 'sorting_report'),
            'id_planshift' => trim($this->input->post('id_planshift')),
            'waste' => trim($this->input->post('waste')),
            'finished' => trim($this->input->post('finished')),
        ];

        if (!empty($finished_report->id_project)){

            $update_total = [
                'total_finished' => $add['finished'] + (int) $finished_report->total_finished,
            ];
    
            $this->crudModel->updateData('finished_report', 'id_project', $id_project->id_project, $update_total);
            
        } else {

        $add_finished = [
            'id_finished' => $this->crudModel->generateCode(1, 'id_finished', 'finished_report'),
            'id_project' => $id_project->id_project,
            'total_finished' => $add['finished']
        ];

        $this->crudModel->addData('finished_report', $add_finished);

        }
        
        $update = [
            'ps_status' => trim($this->input->post('ps_status')),
        ];

        $this->crudModel->addData('sorting_report', $add);
        $this->crudModel->updateData('plan_shift', 'id_planshift', $id_planshift, $update);
        $this->session->set_flashdata('flash', 'ditambah');

        redirect(site_url('admin/sorting'));
    }
    
    public function finished()
    {
        if ($this->uri->segment(3) === 'view') {
            $id = $this->uri->segment(3);

            $tampil = $this->crudModel->getDataWhere('w_reports', 'id_preport', $id)->row();

            $data = [
                'detail' => [
                    'id_wreport' => $tampil->id_wreport,
                    'w_name' => $tampil->w_name,
                    'id_preport' => $tampil->id_preport,
                    'id_plan' => $tampil->id_plan,
                    'id_project' => $tampil->id_project,
                    'finished' => $tampil->finished,
                ],
                'content' => 'admin/UpdateProduction',
                'navlink' => 'w_reports',
                'p_reports' => $this->db->query('SELECT * FROM production')->result(),
                'planning' => $this->db->query('SELECT * FROM planning')->result(),
                'project' => $this->db->query('SELECT id_project, qty_request FROM project')->result(),
            ];
        } else {
            $table = 'finished_report';

            $onjoin = [
                'project' => $table.'.id_project=project.id_project',
                'customer' => 'project.id_cust=customer.id_cust',
            ];

            $data = [
                'finished' => $this->crudModel->getDataJoin($table, $onjoin),
                'content' => 'admin/finished/finished',
                'navlink' => 'finished',
                ];
        }

        $this->load->view('admin/vbackend', $data);
    }

    public function detailplanning()
    {
        $data = [
            'content' => 'admin/planning/DetailPlanning',
            'navlink' => 'detailplanning',
        ];

        $this->load->view('admin/vbackend', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('user_id');
        redirect('login/');
    }
}
